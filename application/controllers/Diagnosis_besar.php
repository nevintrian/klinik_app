<?php

class Diagnosis_besar extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_diagnosis_besar');
		$this->load->model('m_user');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{
		$date_range = $this->input->get('daterange');
		if ($date_range != null) {
			$date = explode(' - ', $date_range);
			$date_start = date("Y-m-d", strtotime($date[0]));
			$date_end = date("Y-m-d", strtotime($date[1]));
		} else {
			$date_start = 0;
			$date_end = 0;
		}

		$this->load->view('partials/v_sidebar');
		$config['total_rows'] = $this->m_diagnosis_besar->total_rows();
		$diagnosis_besar = $this->m_diagnosis_besar->get_limit_data($date_start, $date_end);
		$this->pagination->initialize($config);
		$data = array(
			'diagnosis_besar_data' => $diagnosis_besar,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_diagnosis_besar', $data);
		$this->load->view('partials/v_footer');
	}

	public function save()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		$this->m_diagnosis_besar->insert($data);
		redirect(site_url('diagnosis_besar'));
	}

	public function update()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		$this->m_diagnosis_besar->update($this->input->post('id'), $data);
		redirect(site_url('diagnosis_besar'));
	}

	public function delete()
	{
		$this->m_diagnosis_besar->delete($this->input->post('id'));
		redirect(site_url('diagnosis_besar'));
	}

	public function cetak_pdf()
	{
		$this->load->library('pdfgenerator');
		$file_pdf = 'Laporan 10 Besar Diagnosis';
		$paper = 'A4';
		$orientation = "landscape";

		$date_range = $this->input->get('daterange');
		if ($date_range != null) {
			$date = explode(' - ', $date_range);
			$date_start = date("Y-m-d", strtotime($date[0]));
			$date_end = date("Y-m-d", strtotime($date[1]));
		} else {
			$date_start = 0;
			$date_end = 0;
		}

		$diagnosis_besar = $this->m_diagnosis_besar->get_limit_data($date_start, $date_end);
		$kepala_klinik = $this->m_user->get_kepala_klinik()->nama;
		$data = array(
			'diagnosis_besar_data' => $diagnosis_besar,
			'title' => 'Laporan 10 Besar Diagnosis',
			'kepala_klinik' => $kepala_klinik
		);

		$html = $this->load->view('pdf/v_diagnosis_besar_pdf', $data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function cetak_excel()
	{
		$date_range = $this->input->get('daterange');
		if ($date_range != null) {
			$date = explode(' - ', $date_range);
			$date_start = date("Y-m-d", strtotime($date[0]));
			$date_end = date("Y-m-d", strtotime($date[1]));
		} else {
			$date_start = 0;
			$date_end = 0;
		}

		$diagnosis_besar = $this->m_diagnosis_besar->get_limit_data($date_start, $date_end);
		$data = array(
			'diagnosis_besar_data' => $diagnosis_besar,
			'title' => 'Laporan 10 Besar Diagnosis',
		);

		$this->load->view('excel/v_diagnosis_besar_excel', $data);
	}
}
