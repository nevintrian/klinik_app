

<?php

class Home_pasien_cetak_detail extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_pasien');
		$this->load->model('m_home');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{

		$no_rm = $this->input->post('no_rm');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$data = $this->m_pasien->get_by_no_rm($no_rm, $tanggal_lahir);
		if ($data == null) {
			echo "<script>
				alert('Data tidak ditemukan atau tanggal lahir tidak sesuai');
				window.location.href='home_pasien_cetak';
				</script>";
		} else {
			$data = array(
				'pasien' => $data,
			);
			$this->load->view('partials/v_home_header');
			$this->load->view('v_home_pasien_cetak_detail', $data);
			$this->load->view('partials/v_home_footer');
		}
	}

	public function cetak_pdf()
	{
		$this->load->library('pdfgenerator');
		$file_pdf = 'Laporan Kunjungan Pasien';
		$paper = 'A4';
		$orientation = "portrait";


		$no_rm = $this->input->get('no_rm');
		$tanggal_lahir = $this->input->get('tanggal_lahir');
		$data = $this->m_pasien->get_by_no_rm($no_rm, $tanggal_lahir);

		if ($data == null) {
			echo "<script>
				alert('Data tidak ditemukan atau tanggal lahir tidak sesuai');
				window.location.href='home_pasien_cetak';
				</script>";
		} else {
			$data = array(
				'pasien' => $data,
			);
			$html = $this->load->view('pdf/v_pasien_cetak_detail_pdf', $data, true);
			$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
		}
	}
}
