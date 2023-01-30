<?php

class Pasien_pembayaran_indeks extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_pasien_pembayaran_indeks');
		$this->load->model('m_user');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{
		$tahun = $this->input->get('tahun');
		if ($tahun == null) {
			$tahun = 0;
		}

		$this->load->view('partials/v_sidebar');
		$config['total_rows'] = $this->m_pasien_pembayaran_indeks->total_rows();
		$pasien_pembayaran_indeks_umum = $this->m_pasien_pembayaran_indeks->get_limit_data_umum($tahun);
		$pasien_pembayaran_indeks_sosial = $this->m_pasien_pembayaran_indeks->get_limit_data_sosial($tahun);
		$this->pagination->initialize($config);
		$data = array(
			'pasien_pembayaran_indeks_umum_data' => $pasien_pembayaran_indeks_umum,
			'pasien_pembayaran_indeks_sosial_data' => $pasien_pembayaran_indeks_sosial,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_pasien_pembayaran_indeks', $data);
		$this->load->view('partials/v_footer');
	}

	public function save()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		$this->m_pasien_pembayaran_indeks->insert($data);
		redirect(site_url('pasien_pembayaran_indeks'));
	}

	public function update()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		$this->m_pasien_pembayaran_indeks->update($this->input->post('id'), $data);
		redirect(site_url('pasien_pembayaran_indeks'));
	}

	public function delete()
	{
		$this->m_pasien_pembayaran_indeks->delete($this->input->post('id'));
		redirect(site_url('pasien_pembayaran_indeks'));
	}

	public function cetak_pdf()
	{
		$this->load->library('pdfgenerator');
		$file_pdf = 'Laporan Keuangan';
		$paper = 'A4';
		$orientation = "landscape";


		$tahun = $this->input->get('tahun');
		if ($tahun == null) {
			$tahun = 0;
		}


		$akses_bayar = $this->input->get('akses_bayar');
		if ($akses_bayar == 'umum') {
			$pasien_pembayaran_indeks = $this->m_pasien_pembayaran_indeks->get_limit_data_umum($tahun);
		} else if ($akses_bayar == 'sosial') {
			$pasien_pembayaran_indeks = $this->m_pasien_pembayaran_indeks->get_limit_data_sosial($tahun);
		} else {
			$pasien_pembayaran_indeks = $this->m_pasien_pembayaran_indeks->get_limit_data_umum($tahun);
		}

		$kepala_klinik = $this->m_user->get_kepala_klinik()->nama;
		$data = array(
			'pasien_pembayaran_indeks_data' => $pasien_pembayaran_indeks,
			'title' => 'Laporan Keuangan',
			'kepala_klinik' => $kepala_klinik
		);

		$html = $this->load->view('pdf/v_pasien_pembayaran_indeks_pdf', $data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function cetak_excel()
	{
		$tahun = $this->input->get('tahun');
		if ($tahun == null) {
			$tahun = 0;
		}


		$akses_bayar = $this->input->get('akses_bayar');
		if ($akses_bayar == 'umum') {
			$pasien_pembayaran_indeks = $this->m_pasien_pembayaran_indeks->get_limit_data_umum($tahun);
		} else if ($akses_bayar == 'sosial') {
			$pasien_pembayaran_indeks = $this->m_pasien_pembayaran_indeks->get_limit_data_sosial($tahun);
		} else {
			$pasien_pembayaran_indeks = $this->m_pasien_pembayaran_indeks->get_limit_data_umum($tahun);
		}

		$data = array(
			'pasien_pembayaran_indeks_data' => $pasien_pembayaran_indeks,
			'title' => 'Laporan Keuangan',
		);

		$this->load->view('excel/v_pasien_pembayaran_indeks_excel', $data);
	}
}
