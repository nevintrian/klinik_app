<?php

class Pasien extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_pasien');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{
		$this->load->view('partials/v_sidebar');
		$config['total_rows'] = $this->m_pasien->total_rows();
		$pasien = $this->m_pasien->get_limit_data();
		$this->pagination->initialize($config);
		$data = array(
			'pasien_data' => $pasien,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_pasien', $data);
		$this->load->view('partials/v_footer');
	}

	public function save()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		$this->m_pasien->insert($data);
		redirect(site_url('pasien'));
	}

	public function update()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		$this->m_pasien->update($this->input->post('id'), $data);
		redirect(site_url('pasien'));
	}

	public function delete()
	{
		$this->m_pasien->delete($this->input->post('id'));
		redirect(site_url('pasien'));
	}

	public function cetak_pdf()
	{
		$this->load->library('pdfgenerator');
		$file_pdf = 'Laporan Kunjungan Pasien';
		$paper = 'A4';
		$orientation = "portrait";
		$id = $this->input->get('id');
		$pasien = $this->m_pasien->get_by_id($id);
		$data = array(
			'pasien' => $pasien,
			'title' => 'Laporan Pasien',
		);

		$html = $this->load->view('pdf/v_pasien_cetak_pdf', $data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}
}
