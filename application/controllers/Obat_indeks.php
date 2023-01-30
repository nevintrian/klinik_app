<?php

class Obat_indeks extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_obat_indeks');
		$this->load->model('m_obat');
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

		$obat_id = $this->input->get('obat_id') ?? 0;

		$obat_indeks = $this->m_obat_indeks->get_limit_data($obat_id, $date_start, $date_end);
		$obat_indeks_umum = $this->m_obat_indeks->get_limit_data_umum($obat_id, $date_start, $date_end);
		$obat_indeks_bpjs = $this->m_obat_indeks->get_limit_data_bpjs($obat_id, $date_start, $date_end);
		$obat_indeks_sosial = $this->m_obat_indeks->get_limit_data_sosial($obat_id, $date_start, $date_end);

		$obat = $this->m_obat->get_limit_data();
		$config['total_rows'] = $this->m_obat_indeks->total_rows();
		$this->pagination->initialize($config);
		$this->load->view('partials/v_sidebar');
		$data = array(
			'obat_data' => $obat,
			'obat_indeks_data' => $obat_indeks,
			'obat_indeks_umum_data' => $obat_indeks_umum,
			'obat_indeks_bpjs_data' => $obat_indeks_bpjs,
			'obat_indeks_sosial_data' => $obat_indeks_sosial,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_obat_indeks', $data);
		$this->load->view('partials/v_footer');
	}

	public function get_data_obat()
	{
		$pasien_kunjungan_id = $this->input->post('pasien_kunjungan_id');
		$data = $this->db->query("SELECT pasien_resep.*, obat.*, obat_satuan.nama as obat_satuan_nama, obat_kategori.nama as obat_kategori_nama FROM pasien_resep join obat on obat.id = pasien_resep.obat_id join obat_satuan on obat_satuan.id = obat.obat_satuan_id join obat_kategori on obat_kategori.id = obat.obat_kategori_id WHERE pasien_kunjungan_id='$pasien_kunjungan_id'")->result();
		echo json_encode($data);
	}

	public function save()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		$this->m_obat_indeks->insert($data);
		redirect(site_url('obat_indeks'));
	}

	public function update()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		$this->m_obat_indeks->update($this->input->post('id'), $data);
		redirect(site_url('obat_indeks'));
	}

	public function delete()
	{
		$this->m_obat_indeks->delete($this->input->post('id'));
		redirect(site_url('obat_indeks'));
	}

	public function cetak_pdf()
	{
		$this->load->library('pdfgenerator');
		$file_pdf = 'Laporan Obat';
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

		$obat_id = $this->input->get('obat_id') ?? 0;

		$akses_bayar = $this->input->get('akses_bayar');
		if ($akses_bayar == 'Umum') {
			$obat_indeks = $this->m_obat_indeks->get_limit_data_umum($obat_id, $date_start, $date_end);
		} else if ($akses_bayar == 'Sosial') {
			$obat_indeks = $this->m_obat_indeks->get_limit_data_sosial($obat_id, $date_start, $date_end);
		} else if ($akses_bayar == 'BPJS') {
			$obat_indeks = $this->m_obat_indeks->get_limit_data_bpjs($obat_id, $date_start, $date_end);
		} else {
			$obat_indeks = $this->m_obat_indeks->get_limit_data($obat_id, $date_start, $date_end);
		}

		$kepala_klinik = $this->m_user->get_kepala_klinik()->nama;
		$data = array(
			'obat_indeks_data' => $obat_indeks,
			'title' => 'Laporan Obat',
			'kepala_klinik' => $kepala_klinik
		);

		$html = $this->load->view('pdf/v_obat_indeks_pdf', $data, true);
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

		$obat_id = $this->input->get('obat_id') ?? 0;

		$akses_bayar = $this->input->get('akses_bayar');
		if ($akses_bayar == 'Umum') {
			$obat_indeks = $this->m_obat_indeks->get_limit_data_umum($obat_id, $date_start, $date_end);
		} else if ($akses_bayar == 'Sosial') {
			$obat_indeks = $this->m_obat_indeks->get_limit_data_sosial($obat_id, $date_start, $date_end);
		} else if ($akses_bayar == 'BPJS') {
			$obat_indeks = $this->m_obat_indeks->get_limit_data_bpjs($obat_id, $date_start, $date_end);
		} else {
			$obat_indeks = $this->m_obat_indeks->get_limit_data($obat_id, $date_start, $date_end);
		}

		$obat_indeks = $this->m_obat_indeks->get_limit_data($date_start, $date_end);
		$data = array(
			'obat_indeks_data' => $obat_indeks,
			'title' => 'Laporan Obat',
		);

		$this->load->view('excel/v_obat_indeks_excel', $data);
	}
}
