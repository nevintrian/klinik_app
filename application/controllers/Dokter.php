<?php

class Dokter extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_dokter');
		$this->load->model('m_poli');
		$this->load->model('m_user');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{
		$this->load->view('partials/v_sidebar');
		$config['total_rows'] = $this->m_dokter->total_rows();
		$dokter = $this->m_dokter->get_limit_data();
		$poli = $this->m_poli->get_limit_data();
		$user = $this->m_user->get_limit_data_dokter();
		$this->pagination->initialize($config);
		$data = array(
			'dokter_data' => $dokter,
			'poli_data' => $poli,
			'user_data' => $user,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_dokter', $data);
		$this->load->view('partials/v_footer');
	}

	public function save()
	{
		$data = array(
			'user_id' => $this->input->post('user_id'),
			'poli_id' => $this->input->post('poli_id'),
			'hari_praktek' => join(", ", $this->input->post('hari_praktek')),
			'jam_praktek' => $this->input->post('jam_praktek'),
		);
		$this->m_dokter->insert($data);
		redirect(site_url('dokter'));
	}

	public function update()
	{
		$data = array(
			'user_id' => $this->input->post('user_id'),
			'poli_id' => $this->input->post('poli_id'),
			'hari_praktek' => join(", ", $this->input->post('hari_praktek')),
			'jam_praktek' => $this->input->post('jam_praktek'),
		);
		$this->m_dokter->update($this->input->post('id'), $data);
		redirect(site_url('dokter'));
	}

	public function delete()
	{
		$this->m_dokter->delete($this->input->post('id'));
		redirect(site_url('dokter'));
	}

	public function cetak_pdf()
	{
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 7, 'DATA SATUAN OBAT', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(8, 6, 'No', 1, 0, 'C');
		$pdf->Cell(185, 6, 'Nama', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10);
		$barang = $this->db->query("SELECT * FROM dokter")->result();
		$no = 1;
		foreach ($barang as $data) {
			$pdf->Cell(8, 6, $no, 1, 0);
			$pdf->Cell(185, 6, $data->nama, 1, 1);
			$no++;
		}

		$pdf->Output();
	}
}
