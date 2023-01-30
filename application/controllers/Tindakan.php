<?php

class Tindakan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_tindakan');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{
		$this->load->view('partials/v_sidebar');
		$config['total_rows'] = $this->m_tindakan->total_rows();
		$tindakan = $this->m_tindakan->get_limit_data();
		$this->pagination->initialize($config);
		$data = array(
			'tindakan_data' => $tindakan,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_tindakan', $data);
		$this->load->view('partials/v_footer');
	}

	public function save()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'tarif' => $this->input->post('tarif'),
		);
		$this->m_tindakan->insert($data);
		redirect(site_url('tindakan'));
	}

	public function update()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'tarif' => $this->input->post('tarif'),
		);
		$this->m_tindakan->update($this->input->post('id'), $data);
		redirect(site_url('tindakan'));
	}

	public function delete()
	{
		$this->m_tindakan->delete($this->input->post('id'));
		redirect(site_url('tindakan'));
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
		$barang = $this->db->query("SELECT * FROM tindakan")->result();
		$no = 1;
		foreach ($barang as $data) {
			$pdf->Cell(8, 6, $no, 1, 0);
			$pdf->Cell(185, 6, $data->nama, 1, 1);
			$no++;
		}

		$pdf->Output();
	}
}
