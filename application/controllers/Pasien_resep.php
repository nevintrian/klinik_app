<?php

class Pasien_resep extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_pasien_resep');
		$this->load->model('m_pasien_kunjungan');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{
		$this->load->view('partials/v_sidebar');
		$config['total_rows'] = $this->m_pasien_resep->total_rows();
		$pasien_resep_menunggu = $this->m_pasien_resep->get_limit_data_menunggu();
		$pasien_resep_selesai = $this->m_pasien_resep->get_limit_data_selesai();
		$this->pagination->initialize($config);
		$data = array(
			'pasien_resep_menunggu_data' => $pasien_resep_menunggu,
			'pasien_resep_selesai_data' => $pasien_resep_selesai,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_pasien_resep', $data);
		$this->load->view('partials/v_footer');
	}

	public function update()
	{
		$id = $this->input->post('pasien_kunjungan_id');
		$data = array(
			'status' => 3,
		);
		$this->m_pasien_kunjungan->update($id, $data);
		redirect(site_url('pasien_resep'));
	}
}
