<?php

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_poli');
		$this->load->model('m_home');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{

		$poli_all = $this->m_poli->get_limit_data();
		$data_antrian = [];
		foreach ($poli_all as $poli) {
			$data_antrian[$poli->nama]['sekarang'] = $this->m_home->get_antrian_pasien_sekarang($poli->id) ?? $this->m_home->get_poli($poli->id);
			$data_antrian[$poli->nama]['total'] = $this->m_home->get_antrian_pasien_total($poli->id) ?? $this->m_home->get_poli($poli->id);
		}

		// echo '<pre>';
		// var_dump($data_antrian);
		// echo '</pre>';
		// die();
		$data = array(
			'pasien_antrian_data' => $data_antrian,
		);


		$this->load->view('partials/v_home_header');
		$this->load->view('v_home', $data);
		$this->load->view('partials/v_home_footer');
	}
}
