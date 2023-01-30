<?php

class Dokter_indeks extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_dokter_indeks');
		$this->load->model('m_dokter');
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

		$dokter_id = $this->input->get('dokter_id') ?? 0;

		$this->load->view('partials/v_sidebar');
		$config['total_rows'] = $this->m_dokter_indeks->total_rows();
		$dokter_indeks = $this->m_dokter_indeks->get_limit_data($dokter_id, $date_start, $date_end);
		$dokter = $this->m_dokter->get_limit_data();
		$this->pagination->initialize($config);

		if ($this->session->userdata('jabatan') == 'Dokter') {
			$id = $this->session->userdata('id');
			$dokter = $this->db->query("SELECT id FROM dokter where user_id = $id")->row();
		}

		$data = array(
			'dokter_indeks_data' => $dokter_indeks,
			'dokter_data' => $dokter,
			'total_rows' => $config['total_rows'],
		);

		if ($this->session->userdata('jabatan') == 'Dokter') {
			$data['dokter_id'] = $dokter->id;
		}

		$this->load->view('v_dokter_indeks', $data);
		$this->load->view('partials/v_footer');
	}

	public function save()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		$this->m_dokter_indeks->insert($data);
		redirect(site_url('dokter_indeks'));
	}

	public function update()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		$this->m_dokter_indeks->update($this->input->post('id'), $data);
		redirect(site_url('dokter_indeks'));
	}

	public function delete()
	{
		$this->m_dokter_indeks->delete($this->input->post('id'));
		redirect(site_url('dokter_indeks'));
	}

	public function cetak_pdf()
	{
		$this->load->library('pdfgenerator');
		$file_pdf = 'Laporan Dokter';
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

		$dokter_id = $this->input->get('dokter_id') ?? 0;
		$dokter_indeks = $this->m_dokter_indeks->get_limit_data($dokter_id, $date_start, $date_end);
		$kepala_klinik = $this->m_user->get_kepala_klinik()->nama;
		$data = array(
			'dokter_indeks_data' => $dokter_indeks,
			'title' => 'Laporan Dokter',
			'kepala_klinik' => $kepala_klinik
		);

		$html = $this->load->view('pdf/v_dokter_indeks_pdf', $data, true);
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

		$dokter_id = $this->input->get('dokter_id') ?? 0;
		$dokter_indeks = $this->m_dokter_indeks->get_limit_data($dokter_id, $date_start, $date_end);
		$data = array(
			'dokter_indeks_data' => $dokter_indeks,
			'title' => 'Laporan Dokter',
		);

		$this->load->view('excel/v_dokter_indeks_excel', $data);
	}
}
