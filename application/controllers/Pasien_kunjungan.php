<?php

class Pasien_kunjungan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_pasien_kunjungan');
		$this->load->model('m_dokter');
		$this->load->model('m_pasien');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{
		$this->load->view('partials/v_sidebar');
		$config['total_rows'] = $this->m_pasien_kunjungan->total_rows();
		$pasien_kunjungan_onsite = $this->m_pasien_kunjungan->get_limit_data_onsite();
		$pasien_kunjungan_online = $this->m_pasien_kunjungan->get_limit_data_online();
		$dokter = $this->m_dokter->get_limit_data();
		$pasien = $this->m_pasien->get_limit_data();
		$this->pagination->initialize($config);
		$data = array(
			'dokter_data' => $dokter,
			'pasien_data' => $pasien,
			'pasien_kunjungan_onsite_data' => $pasien_kunjungan_onsite,
			'pasien_kunjungan_online_data' => $pasien_kunjungan_online,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_pasien_kunjungan', $data);
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
			'keluhan' => $this->input->post('keluhan'),
			'akses_bayar' => $this->input->post('akses_bayar'),
			'pasien_id' => $this->input->post('pasien_id'),
			'dokter_id' => $this->input->post('dokter_id'),
		);

		$this->m_pasien_kunjungan->insert($data);
		redirect(site_url('pasien_kunjungan'));
	}

	public function update()
	{
		$dokter_id = $this->input->post('dokter_id');
		$date = date('Y-m-d');
		$data = $this->db->query("SELECT no_antrian FROM pasien_kunjungan where pasien_kunjungan.dokter_id = $dokter_id and pasien_kunjungan.tanggal = '$date' order by pasien_kunjungan.id desc")->row();
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
			'keluhan' => $this->input->post('keluhan'),
			'akses_bayar' => $this->input->post('akses_bayar'),
			'pasien_id' => $this->input->post('pasien_id'),
			'dokter_id' => $this->input->post('dokter_id'),
			'status' => $this->input->post('status'),
		);
		$this->m_pasien_kunjungan->update($this->input->post('id'), $data);
		redirect(site_url('pasien_kunjungan'));
	}

	public function delete()
	{
		$this->m_pasien_kunjungan->delete($this->input->post('id'));
		redirect(site_url('pasien_kunjungan'));
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
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 7, 'DATA KATEGORI OBAT', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(8, 6, 'No', 1, 0, 'C');
		$pdf->Cell(185, 6, 'Nama', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10);
		$barang = $this->db->query("SELECT * FROM pasien_kunjungan")->result();
		$no = 1;
		foreach ($barang as $data) {
			$pdf->Cell(8, 6, $no, 1, 0);
			$pdf->Cell(185, 6, $data->nama, 1, 1);
			$no++;
		}

		$pdf->Output();
	}
}
