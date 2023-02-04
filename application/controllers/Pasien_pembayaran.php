<?php

class Pasien_pembayaran extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_pasien_pembayaran');
		$this->load->model('m_pasien_kunjungan');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{
		$this->load->view('partials/v_sidebar');
		$config['total_rows'] = $this->m_pasien_pembayaran->total_rows();
		$pasien_pembayaran = $this->m_pasien_pembayaran->get_limit_data();
		$this->pagination->initialize($config);
		$data = array(
			'pasien_pembayaran_data' => $pasien_pembayaran,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_pasien_pembayaran', $data);
		$this->load->view('partials/v_footer');
	}

	public function konfirmasi()
	{
		$id = $this->input->post('pasien_kunjungan_id');
		$pasien_bayar = $this->input->post('pasien_sosial_bayar');
		$pasien_pembayaran_id = $this->input->post('pasien_pembayaran_id');
		$this->m_pasien_pembayaran->update($pasien_pembayaran_id, ['total_harga' => $pasien_bayar]);
		$data = array(
			'status' => 4,
		);
		$this->m_pasien_kunjungan->update($id, $data);
		redirect(site_url('pasien_pembayaran'));
	}

	public function get_data_konfirmasi()
	{
		$pasien_kunjungan_id = $this->input->post('pasien_kunjungan_id');
		$resep = $this->db->query("SELECT pasien_resep.*, obat.*, obat_satuan.nama as obat_satuan_nama, obat_kategori.nama as obat_kategori_nama FROM pasien_resep join obat on obat.id = pasien_resep.obat_id join obat_satuan on obat_satuan.id = obat.obat_satuan_id join obat_kategori on obat_kategori.id = obat.obat_kategori_id WHERE pasien_kunjungan_id='$pasien_kunjungan_id'")->result();
		$tindakan = $this->db->query("SELECT tindakan.* from pasien_pemeriksaan_tindakan join pasien_pemeriksaan on pasien_pemeriksaan.id = pasien_pemeriksaan_tindakan.pasien_pemeriksaan_id join tindakan on tindakan.id = pasien_pemeriksaan_tindakan.tindakan_id where pasien_pemeriksaan.pasien_kunjungan_id = $pasien_kunjungan_id")->result();
		$data = [
			'resep' => $resep,
			'tindakan' => $tindakan
		];
		echo json_encode($data);
	}
}
