<?php

class Pasien_detail extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_pasien_detail');
		$this->load->model('m_pasien_kunjungan');
		$this->load->model('m_pasien_pemeriksaan_input');
		$this->load->model('m_pasien_pemeriksaan');
		$this->load->model('m_pasien_resep');
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
		$id = $this->input->get('id');

		$this->load->view('partials/v_sidebar');
		$config['total_rows'] = $this->m_pasien_detail->total_rows();
		$pasien = $this->m_pasien_detail->get_limit_data_pasien($id);
		$pasien_kunjungan = $this->m_pasien_detail->get_limit_data_pasien_kunjungan($id);
		$this->pagination->initialize($config);
		$data = array(
			'pasien' => $pasien,
			'pasien_kunjungan_data' => $pasien_kunjungan,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_pasien_detail', $data);
		$this->load->view('partials/v_footer');
	}

	public function save()
	{
		$data = array(
			'no_identitas' => $this->input->post('no_identitas'),
			'nama' => $this->input->post('nama'),
			'jk' => $this->input->post('jk'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'gol_darah' => $this->input->post('gol_darah'),
			'alamat' => $this->input->post('alamat'),
			'telepon' => $this->input->post('telepon'),
			'suku' => $this->input->post('suku'),
			'pendidikan' => $this->input->post('pendidikan'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'no_bpjs' => $this->input->post('no_bpjs') ?? '-',
			'blokir' => $this->input->post('blokir'),
		);
		$id = $this->input->post('id');
		$this->m_pasien_detail->update($id, $data);
		redirect(site_url("pasien_detail?id=$id"));
	}

	public function update()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		$this->m_pasien_detail->update($this->input->post('id'), $data);
		redirect(site_url('pasien_detail'));
	}

	public function delete()
	{
		$this->m_pasien_detail->delete($this->input->post('id'));
		redirect(site_url('pasien_detail'));
	}

	public function get_data_pasien()
	{
		$id = $this->input->post('pasien_kunjungan_id');
		$pasien = $this->m_pasien_kunjungan->get_limit_data_id($id);
		$pemeriksaan = $this->db->query("SELECT * FROM pasien_pemeriksaan where pasien_kunjungan_id = $id")->row();
		$resep = $this->db->query("SELECT obat.*, pasien_resep.jumlah as jumlah, pasien_resep.keterangan as keterangan, obat_kategori.nama as obat_kategori_nama, obat_satuan.nama as obat_satuan_nama FROM pasien_resep join obat on obat.id = pasien_resep.obat_id join obat_satuan on obat_satuan.id = obat.obat_satuan_id join obat_kategori on obat_kategori.id = obat.obat_kategori_id where pasien_kunjungan_id = $id")->result();
		$diagnosis = $this->db->query("SELECT * from pasien_pemeriksaan_diagnosis join pasien_pemeriksaan on pasien_pemeriksaan.id = pasien_pemeriksaan_diagnosis.pasien_pemeriksaan_id join diagnosis on diagnosis.id = pasien_pemeriksaan_diagnosis.diagnosis_id where pasien_pemeriksaan.pasien_kunjungan_id = $id")->result();
		$tindakan = $this->db->query("SELECT * from pasien_pemeriksaan_tindakan join pasien_pemeriksaan on pasien_pemeriksaan.id = pasien_pemeriksaan_tindakan.pasien_pemeriksaan_id join tindakan on tindakan.id = pasien_pemeriksaan_tindakan.tindakan_id where pasien_pemeriksaan.pasien_kunjungan_id = $id")->result();
		$data = [
			'pasien' => $pasien,
			'pemeriksaan' => $pemeriksaan,
			'diagnosis' => $diagnosis,
			'tindakan' => $tindakan,
			'resep' => $resep
		];

		echo json_encode($data);
	}

	public function get_rekam_medik()
	{
		$id_pasien = $this->input->post('pasien_id');
		$pasien = $this->db->query("SELECT user.nama as dokter_nama, pasien_kunjungan.tanggal as pasien_kunjungan_tanggal, pasien_kunjungan.id as pasien_kunjungan_id, poli.nama as poli_nama from pasien join pasien_kunjungan on pasien.id = pasien_kunjungan.pasien_id join pasien_pemeriksaan on pasien_pemeriksaan.pasien_kunjungan_id = pasien_kunjungan.id join dokter on dokter.id = pasien_kunjungan.dokter_id join poli on dokter.poli_id = poli.id join user on user.id = dokter.user_id where pasien.id = $id_pasien")->result();

		$data = [];

		foreach ($pasien as $p) {
			$id = $p->pasien_kunjungan_id;
			$pasien_data = $this->m_pasien_pemeriksaan_input->get_limit_data_pasien_row_cetak($id);
			$obat_data = $this->m_obat->get_limit_data();

			$pemeriksaan = $this->db->query("SELECT * FROM pasien_pemeriksaan where pasien_kunjungan_id = $id")->row();
			$resep = $this->db->query("SELECT obat.*, pasien_resep.id as pasien_resep_id, pasien_resep.jumlah as jumlah, pasien_resep.keterangan as keterangan, obat_kategori.nama as obat_kategori_nama, obat_satuan.nama as obat_satuan_nama FROM pasien_resep join obat on obat.id = pasien_resep.obat_id join obat_satuan on obat_satuan.id = obat.obat_satuan_id join obat_kategori on obat_kategori.id = obat.obat_kategori_id where pasien_kunjungan_id = $id")->result();
			$diagnosis = $this->db->query("SELECT diagnosis.nama as nama from pasien_pemeriksaan_diagnosis join pasien_pemeriksaan on pasien_pemeriksaan.id = pasien_pemeriksaan_diagnosis.pasien_pemeriksaan_id join diagnosis on diagnosis.id = pasien_pemeriksaan_diagnosis.diagnosis_id where pasien_pemeriksaan.pasien_kunjungan_id = $id")->result();
			$tindakan = $this->db->query("SELECT tindakan.nama as nama from pasien_pemeriksaan_tindakan join pasien_pemeriksaan on pasien_pemeriksaan.id = pasien_pemeriksaan_tindakan.pasien_pemeriksaan_id join tindakan on tindakan.id = pasien_pemeriksaan_tindakan.tindakan_id where pasien_pemeriksaan.pasien_kunjungan_id = $id")->result();

			array_push($data, [
				'pasien' => $pasien_data,
				'obat_data' => $obat_data,
				'pemeriksaan' => $pemeriksaan,
				'diagnosis' => $diagnosis,
				'tindakan' => $tindakan,
				'resep' => $resep,
			]);
		}

		echo json_encode($data);
	}

	public function cetak_pdf()
	{
		$this->load->library('pdfgenerator');
		$file_pdf = 'Rekam Medis Pasien';
		$paper = 'A4';
		$orientation = "portrait";

		$id = $this->input->get('id');
		$pasien_data = $this->m_pasien_pemeriksaan_input->get_limit_data_pasien_row_cetak($id);
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
		$data = array(
			'pasien' => $pasien_data,
			'obat_data' => $obat_data,
			'diagnosis_data' => $diagnosis_data,
			'tindakan_data' => $tindakan_data,
			'pemeriksaan' => $pemeriksaan,
			'diagnosis' => $diagnosis,
			'tindakan' => $tindakan,
			'resep' => $resep,
		);

		$html = $this->load->view('pdf/v_rekam_medis_pdf', $data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}
}
