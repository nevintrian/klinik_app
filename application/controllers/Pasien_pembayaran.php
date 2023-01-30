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
		$id = $this->input->get('pasien_kunjungan_id');
		$data = array(
			'status' => 4,
		);
		$this->m_pasien_kunjungan->update($id, $data);
		redirect(site_url('pasien_pembayaran'));
	}
}
