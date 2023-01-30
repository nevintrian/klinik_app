<?php

class Pasien_kunjungan_indeks extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_pasien_kunjungan_indeks');
		$this->load->model('m_dokter');
		$this->load->model('m_pasien');
		$this->load->model('m_user');
		$this->load->model('m_poli');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{
		$date_range = $this->input->get('daterange');
		$poli_id = $this->input->get('poli_id') ?? 0;
		$akses_bayar = $this->input->get('akses_bayar') ?? 0;
		$daftar = $this->input->get('daftar') ?? 0;
		if ($date_range != null) {
			$date = explode(' - ', $date_range);
			$date_start = date("Y-m-d", strtotime($date[0]));
			$date_end = date("Y-m-d", strtotime($date[1]));
		} else {
			$date_start = 0;
			$date_end = 0;
		}


		$this->load->view('partials/v_sidebar');
		$config['total_rows'] = $this->m_pasien_kunjungan_indeks->total_rows();
		$pasien_kunjungan_indeks = $this->m_pasien_kunjungan_indeks->get_limit_data($date_start, $date_end, $poli_id, $akses_bayar, $daftar);
		$dokter = $this->m_dokter->get_limit_data();
		$pasien = $this->m_pasien->get_limit_data();
		$poli = $this->m_poli->get_limit_data();
		$this->pagination->initialize($config);
		$data = array(
			'dokter_data' => $dokter,
			'poli_data' => $poli,
			'pasien_data' => $pasien,
			'pasien_kunjungan_indeks_data' => $pasien_kunjungan_indeks,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_pasien_kunjungan_indeks', $data);
		$this->load->view('partials/v_footer');
	}

	public function save()
	{
		$dokter_id = $this->input->post('dokter_id');
		$date = date('Y-m-d');
		$data = $this->db->query("SELECT no_antrian FROM pasien_kunjungan where pasien_kunjungan.dokter_id = $dokter_id and pasien_kunjungan.tanggal = '$date' order by pasien_kunjungan.id desc")->row();

		if ($data != null) {
			$huruf = $data->no_antrian[0];
			$angka = "";
			for ($i = 0; $i < strlen($data->no_antrian); $i++) {
				if ($i != 0) {
					$angka .= $data->no_antrian[$i];
				}
			}
			$angka++;
			$no_antrian = $huruf . $angka;
		} else {
			$poli_query = $this->db->query("SELECT * FROM dokter join poli on poli.id = dokter.poli_id where dokter.id = $dokter_id")->row();
			$no_antrian = $poli_query->nama[0] . '1';
		}

		$data = array(
			'no_antrian' => $no_antrian,
			'daftar' => 'onsite',
			'akses_bayar' => $this->input->post('akses_bayar'),
			'pasien_id' => $this->input->post('pasien_id'),
			'dokter_id' => $this->input->post('dokter_id'),
		);

		$this->m_pasien_kunjungan_indeks->insert($data);
		redirect(site_url('pasien_kunjungan_indeks'));
	}

	public function update()
	{
		$dokter_id = $this->input->post('dokter_id');
		$date = date('Y-m-d');
		$data = $this->db->query("SELECT no_antrian FROM pasien_kunjungan_indeks where pasien_kunjungan_indeks.dokter_id = $dokter_id and pasien_kunjungan.tanggal = '$date' order by pasien_kunjungan_indeks.id desc")->row();
		if ($data->no_antrian != $this->input->post('no_antrian')) {
			if ($data != null) {
				$huruf = $data->no_antrian[0];
				$angka = "";
				for ($i = 0; $i < strlen($data->no_antrian); $i++) {
					if ($i != 0) {
						$angka .= $data->no_antrian[$i];
					}
				}
				$angka++;
				$no_antrian = $huruf . $angka;
			} else {
				$poli_query = $this->db->query("SELECT * FROM dokter join poli on poli.id = dokter.poli_id where dokter.id = $dokter_id")->row();
				$no_antrian = $poli_query->nama[0] . '1';
			}
		} else {
			$no_antrian = $this->input->post('no_antrian');
		}

		$data = array(
			'no_antrian' => $no_antrian,
			'akses_bayar' => $this->input->post('akses_bayar'),
			'pasien_id' => $this->input->post('pasien_id'),
			'dokter_id' => $this->input->post('dokter_id'),
			'status' => $this->input->post('status'),
		);
		$this->m_pasien_kunjungan_indeks->update($this->input->post('id'), $data);
		redirect(site_url('pasien_kunjungan_indeks'));
	}

	public function delete()
	{
		$this->m_pasien_kunjungan_indeks->delete($this->input->post('id'));
		redirect(site_url('pasien_kunjungan_indeks'));
	}

	public function cek_data_pasien()
	{
		$id = $this->input->post('id');
		$cek = $this->db->query("SELECT * FROM pasien WHERE id='$id'")->row();
		$data = array(
			'nama' => $cek->nama,
		);

		echo json_encode($data);
	}

	public function cek_data_dokter()
	{
		$id = $this->input->post('id');
		$cek = $this->db->query("SELECT dokter.*, poli.nama as poli_nama FROM dokter join poli on poli.id = dokter.poli_id WHERE dokter.id='$id'")->row();
		$data = array(
			'jam_praktek' => $cek->jam_praktek,
			'poli_nama' => $cek->poli_nama,
		);

		echo json_encode($data);
	}

	public function cetak_pdf()
	{
		$this->load->library('pdfgenerator');
		$file_pdf = 'Laporan Kunjungan Pasien';
		$paper = 'A4';
		$orientation = "landscape";

		$date_range = $this->input->get('daterange');
		$poli_id = $this->input->get('poli_id') ?? 0;
		$akses_bayar = $this->input->get('akses_bayar') ?? 0;
		$daftar = $this->input->get('daftar') ?? 0;
		if ($date_range != null) {
			$date = explode(' - ', $date_range);
			$date_start = date("Y-m-d", strtotime($date[0]));
			$date_end = date("Y-m-d", strtotime($date[1]));
		} else {
			$date_start = 0;
			$date_end = 0;
		}

		$pasien_kunjungan_indeks = $this->m_pasien_kunjungan_indeks->get_limit_data($date_start, $date_end, $poli_id, $akses_bayar, $daftar);
		$kepala_klinik = $this->m_user->get_kepala_klinik()->nama;
		$data = array(
			'pasien_kunjungan_indeks_data' => $pasien_kunjungan_indeks,
			'title' => 'Laporan Pasien',
			'kepala_klinik' => $kepala_klinik
		);

		$html = $this->load->view('pdf/v_pasien_kunjungan_indeks_pdf', $data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function cetak_excel()
	{
		$date_range = $this->input->get('daterange');
		$poli_id = $this->input->get('poli_id') ?? 0;
		$akses_bayar = $this->input->get('akses_bayar') ?? 0;
		$daftar = $this->input->get('daftar') ?? 0;
		if ($date_range != null) {
			$date = explode(' - ', $date_range);
			$date_start = date("Y-m-d", strtotime($date[0]));
			$date_end = date("Y-m-d", strtotime($date[1]));
		} else {
			$date_start = 0;
			$date_end = 0;
		}

		$pasien_kunjungan_indeks = $this->m_pasien_kunjungan_indeks->get_limit_data($date_start, $date_end, $poli_id, $akses_bayar, $daftar);
		$data = array(
			'pasien_kunjungan_indeks_data' => $pasien_kunjungan_indeks,
			'title' => 'Laporan Kunjungan Pasien',
		);

		$this->load->view('excel/v_pasien_kunjungan_indeks_excel', $data);
	}
}
