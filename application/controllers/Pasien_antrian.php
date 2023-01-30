<?php

class Pasien_antrian extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_pasien_antrian');
		$this->load->model('m_poli');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{
		$poli_all = $this->m_poli->get_limit_data();
		$data_antrian = [];
		foreach ($poli_all as $poli) {
			$data_antrian[$poli->nama]['antrian'] =
				$this->m_pasien_antrian->get_limit_data_poli($poli->id);
			$data_antrian[$poli->nama]['selesai'] =
				$this->m_pasien_antrian->get_limit_data_poli_selesai($poli->id);
		}

		$this->load->view('partials/v_sidebar');
		$config['total_rows'] = $this->m_pasien_antrian->total_rows();
		$this->pagination->initialize($config);
		$data = array(
			'pasien_antrian_data' => $data_antrian,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_pasien_antrian', $data);
		$this->load->view('partials/v_footer');
	}

	public function hadir()
	{
		$id = $this->input->get('pasien_kunjungan_id');
		$data = array(
			'status' => 1,
		);
		$this->m_pasien_antrian->update($id, $data);
		redirect(site_url('pasien_antrian'));
	}

	public function tidak_hadir()
	{
		$id = $this->input->get('pasien_kunjungan_id');
		$data = array(
			'status' => 4,
		);
		$this->m_pasien_antrian->update($id, $data);
		redirect(site_url('pasien_antrian'));
	}
}
