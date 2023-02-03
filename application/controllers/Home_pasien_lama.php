<?php

class Home_pasien_lama extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_dokter');
		$this->load->model('m_home');
		$this->load->model('m_pasien');
		$this->load->model('m_pasien_kunjungan');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{
		$dokter = $this->m_dokter->get_limit_data_dokter();
		$data = array(
			'dokter_data' => $dokter,
		);

		$this->load->view('partials/v_home_header');
		$this->load->view('v_home_pasien_lama', $data);
		$this->load->view('partials/v_home_footer');
	}

	public function get_data_pasien()
	{
		$no_rm = $this->input->post('no_rm');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$data = $this->m_pasien->get_by_no_rm($no_rm, $tanggal_lahir);
		echo json_encode($data);
	}

	public function save()
	{
		$dokter_id = $this->input->post('dokter_id');
		$pasien_id = $this->input->post('pasien_id');
		$no_rm = $this->input->post('no_rm');
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

		$data1 = array(
			'no_antrian' => $no_antrian,
			'daftar' => 'online',
			'keluhan' => $this->input->post('keluhan'),
			'akses_bayar' => $this->input->post('akses_bayar'),
			'pasien_id' => $pasien_id,
			'dokter_id' => $this->input->post('dokter_id'),
		);
		$this->m_pasien_kunjungan->insert($data1);


		$data = $this->m_pasien->get_by_no_rm($no_rm, $this->input->post('tanggal_lahir'));
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
}
