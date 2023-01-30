<?php

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_obat_kategori');
		$this->load->model('m_obat_satuan');
		$this->load->model('m_obat');
		$this->load->model('m_pasien');
		$this->load->model('m_diagnosis_besar');
		$this->load->model('m_pasien_resep');
		$this->load->library('pagination');
		$this->load->library('upload');
	}
	public function index()
	{

		if (
			$this->session->userdata('jabatan') == 'Petugas Pendaftaran' ||
			$this->session->userdata('jabatan') == 'Kepala Klinik'
		) {
			$pasien = $this->m_pasien->total_rows();
			$pasien_this_month = $this->m_pasien->total_rows_this_month();
			$pasien_today = $this->m_pasien->total_rows_today();
			$pasien_antri = $this->m_pasien->total_rows_antri();
			$pasien_umum = $this->m_pasien->total_rows_pasien_umum();
			$pasien_bpjs = $this->m_pasien->total_rows_pasien_bpjs();
			$pasien_sosial = $this->m_pasien->total_rows_pasien_sosial();
			$diagonosis_data = $this->m_diagnosis_besar->get_limit_data_dashboard();
			$data = array(
				'pasien' => $pasien,
				'pasien_this_month' => $pasien_this_month,
				'pasien_today' => $pasien_today,
				'pasien_antri' => $pasien_antri,
				'diagnosis_data' => $diagonosis_data,
				'pasien_umum' => $pasien_umum,
				'pasien_bpjs' => $pasien_bpjs,
				'pasien_sosial' => $pasien_sosial,
			);
		}

		if ($this->session->userdata('jabatan') == 'Apoteker') {
			$obat = $this->m_obat->total_rows();
			$pasien_resep_menunggu = $this->m_pasien_resep->total_rows_menunggu();
			$pasien_resep_selesai = $this->m_pasien_resep->total_rows_selesai();

			$data = array(
				'obat' => $obat,
				'pasien_resep_menunggu' => $pasien_resep_menunggu,
				'pasien_resep_selesai' => $pasien_resep_selesai,
			);
		}

		if ($this->session->userdata('jabatan') == 'Dokter') {
			$id = $this->session->userdata('id');
			$dokter = $this->db->query("SELECT id FROM dokter where user_id = $id")->row();
			$total = $this->db->query("SELECT count(id) as count FROM pasien_kunjungan where dokter_id = $dokter->id and status=1")->row();

			$data = array(
				'total_pasien' => $total->count,
			);
		}



		$this->load->view('partials/v_sidebar');
		$this->load->view('v_dashboard', $data);
		$this->load->view('partials/v_footer');
	}
}
