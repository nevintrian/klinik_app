<?php

class Pasien_pemeriksaan_input extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_pasien_pemeriksaan_input');
		$this->load->model('m_pasien_pemeriksaan');
		$this->load->model('m_pasien_resep');
		$this->load->model('m_pasien_kunjungan');
		$this->load->model('m_pasien_pembayaran');
		$this->load->model('m_obat');
		$this->load->model('m_tindakan');
		$this->load->model('m_diagnosis');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{
		$this->load->view('partials/v_sidebar');
		$config['total_rows'] = $this->m_pasien_pemeriksaan_input->total_rows();
		$id = $this->input->get('id');
		$pasien_data = $this->m_pasien_pemeriksaan_input->get_limit_data_pasien_row($id);
		$obat_data = $this->m_obat->get_limit_data();
		$diagnosis_data = $this->m_diagnosis->get_limit_data();
		$tindakan_data = $this->m_tindakan->get_limit_data();

		$pemeriksaan = $this->db->query("SELECT * FROM pasien_pemeriksaan where pasien_kunjungan_id = $id")->row();
		$resep = $this->db->query("SELECT obat.*, pasien_resep.id as pasien_resep_id, pasien_resep.jumlah as jumlah, pasien_resep.keterangan as keterangan, obat_kategori.nama as obat_kategori_nama, obat_satuan.nama as obat_satuan_nama FROM pasien_resep join obat on obat.id = pasien_resep.obat_id join obat_satuan on obat_satuan.id = obat.obat_satuan_id join obat_kategori on obat_kategori.id = obat.obat_kategori_id where pasien_kunjungan_id = $id")->result();
		$diagnosis = $this->db->query("SELECT diagnosis.nama as nama from pasien_pemeriksaan_diagnosis join pasien_pemeriksaan on pasien_pemeriksaan.id = pasien_pemeriksaan_diagnosis.pasien_pemeriksaan_id join diagnosis on diagnosis.id = pasien_pemeriksaan_diagnosis.diagnosis_id where pasien_pemeriksaan.pasien_kunjungan_id = $id")->result();
		$tindakan = $this->db->query("SELECT tindakan.nama as nama from pasien_pemeriksaan_tindakan join pasien_pemeriksaan on pasien_pemeriksaan.id = pasien_pemeriksaan_tindakan.pasien_pemeriksaan_id join tindakan on tindakan.id = pasien_pemeriksaan_tindakan.tindakan_id where pasien_pemeriksaan.pasien_kunjungan_id = $id")->result();
		// echo '<pre>';
		// var_dump($tindakan);
		// echo '<pre>';
		// die();
		$this->pagination->initialize($config);
		$data = array(
			'pasien' => $pasien_data,
			'obat_data' => $obat_data,
			'diagnosis_data' => $diagnosis_data,
			'tindakan_data' => $tindakan_data,
			'pemeriksaan' => $pemeriksaan,
			'diagnosis' => $diagnosis,
			'tindakan' => $tindakan,
			'resep' => $resep,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_pasien_pemeriksaan_input', $data);
		$this->load->view('partials/v_footer');
	}

	public function save()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		$this->m_pasien_pemeriksaan_input->insert($data);
		redirect(site_url('pasien_pemeriksaan_input'));
	}

	public function save_resep()
	{
		$id = $this->input->post('pasien_kunjungan_id');
		$data = array(
			'obat_id' => $this->input->post('obat_id'),
			'jumlah' => $this->input->post('jumlah'),
			'keterangan' => $this->input->post('keterangan_obat'),
			'pasien_kunjungan_id' => $id
		);

		$this->m_pasien_resep->insert($data);
		redirect(site_url("pasien_pemeriksaan_input?id=$id"));
	}

	public function save_pemeriksaan()
	{
		$id = $this->input->post('pasien_kunjungan_id');
		$this->m_pasien_pemeriksaan->delete_by_pasien_kunjungan_id($id);
		$diagnosis = $this->input->post('diagnosis');
		$tindakan = $this->input->post('tindakan');

		$data = array(
			'suhu' => $this->input->post('suhu'),
			'td' => $this->input->post('td'),
			'ra' => $this->input->post('ra'),
			'rpd' => $this->input->post('rpd'),
			'keterangan' => $this->input->post('keterangan_pemeriksaan'),
			'pasien_kunjungan_id' => $id,
		);

		$this->m_pasien_pemeriksaan->insert($data);

		$insert_id = $this->db->insert_id();

		$this->m_pasien_pemeriksaan->insert_diagnosis($diagnosis, $insert_id);
		$this->m_pasien_pemeriksaan->insert_tindakan($tindakan, $insert_id);

		redirect(site_url("pasien_pemeriksaan_input?id=$id"));
	}

	public function save_all()
	{
		$total_harga = 0;
		$id = $this->input->get('id');
		$data = array(
			'status' => 2
		);

		$cek_pasien = $this->db->query("SELECT * from pasien join pasien_kunjungan on pasien.id = pasien_kunjungan.pasien_id where pasien_kunjungan.id = $id")->row();
		if ($cek_pasien->akses_bayar != 'BPJS') {
			$pemeriksaan = $this->db->query("SELECT tindakan.tarif as tarif FROM pasien_pemeriksaan_tindakan join tindakan on tindakan.id = pasien_pemeriksaan_tindakan.tindakan_id join pasien_pemeriksaan on pasien_pemeriksaan.id = pasien_pemeriksaan_tindakan.pasien_pemeriksaan_id where pasien_pemeriksaan.pasien_kunjungan_id = $id")->result();
			$resep = $this->db->query("SELECT obat.harga_jual as harga_jual, pasien_resep.jumlah as jumlah FROM pasien_resep join obat on pasien_resep.obat_id = obat.id where pasien_resep.pasien_kunjungan_id = $id")->result();

			foreach ($pemeriksaan as $p) {
				$total_harga += $p->tarif;
			}

			foreach ($resep as $r) {
				$total_harga += ($r->harga_jual * $r->jumlah);
			}
		}
		$data2 = [
			'total_harga' => $total_harga,
			'pasien_kunjungan_id' => $id
		];
		$this->m_pasien_pembayaran->insert($data2);
		$this->m_pasien_kunjungan->update($id, $data);
		redirect(site_url("pasien_pemeriksaan"));
	}

	public function delete_resep()
	{
		$id = $this->input->get('id');
		$pasien_resep_id = $this->input->get('pasien_resep_id');
		$this->m_pasien_resep->delete($pasien_resep_id);
		redirect(site_url("pasien_pemeriksaan_input?id=$id"));
	}

	public function get_rekam_medik()
	{
		$id = $this->input->post('pasien_kunjungan_id');
		$id_pasien = $this->db->query("SELECT pasien.id as id from pasien_kunjungan join pasien on pasien.id = pasien_kunjungan.pasien_id where pasien_kunjungan.id = $id")->row()->id;

		$pasien = $this->db->query("SELECT user.nama as dokter_nama, pasien_kunjungan.tanggal as pasien_kunjungan_tanggal, poli.nama as poli_nama from pasien join pasien_kunjungan on pasien.id = pasien_kunjungan.pasien_id join pasien_pemeriksaan on pasien_pemeriksaan.pasien_kunjungan_id = pasien_kunjungan.id join dokter on dokter.id = pasien_kunjungan.dokter_id join poli on dokter.poli_id = poli.id join user on user.id = dokter.user_id where pasien.id = $id_pasien")->result();


		echo json_encode($pasien);
	}
}
