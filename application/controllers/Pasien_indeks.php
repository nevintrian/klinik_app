<?php

class Pasien_indeks extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_pasien_indeks');
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
		$config['total_rows'] = $this->m_pasien_indeks->total_rows();
		$pasien_indeks = $this->m_pasien_indeks->get_limit_data($date_start, $date_end);
		$this->pagination->initialize($config);
		$data = array(
			'pasien_indeks_data' => $pasien_indeks,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_pasien_indeks', $data);
		$this->load->view('partials/v_footer');
	}

	public function save()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		$this->m_pasien_indeks->insert($data);
		redirect(site_url('pasien_indeks'));
	}

	public function update()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		$this->m_pasien_indeks->update($this->input->post('id'), $data);
		redirect(site_url('pasien_indeks'));
	}

	public function delete()
	{
		$this->m_pasien_indeks->delete($this->input->post('id'));
		redirect(site_url('pasien_indeks'));
	}

	public function cetak_pdf()
	{
		$this->load->library('pdfgenerator');
		$file_pdf = 'Laporan Pasien';
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

		$pasien_indeks = $this->m_pasien_indeks->get_limit_data($date_start, $date_end);
		$kepala_klinik = $this->m_user->get_kepala_klinik()->nama;
		$data = array(
			'pasien_indeks_data' => $pasien_indeks,
			'title' => 'Laporan Pasien',
			'kepala_klinik' => $kepala_klinik
		);

		$html = $this->load->view('pdf/v_pasien_indeks_pdf', $data, true);
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

		$pasien_indeks = $this->m_pasien_indeks->get_limit_data($date_start, $date_end);
		$data = array(
			'pasien_indeks_data' => $pasien_indeks,
			'title' => 'Laporan Pasien',
		);

		$this->load->view('excel/v_pasien_indeks_excel', $data);
	}
}
