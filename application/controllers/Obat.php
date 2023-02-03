<?php

class Obat extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_obat');
		$this->load->model('m_obat_kategori');
		$this->load->model('m_obat_satuan');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{
		$this->load->view('partials/v_sidebar');
		$config['total_rows'] = $this->m_obat->total_rows();
		$obat = $this->m_obat->get_limit_data();
		$obat_kategori = $this->m_obat_kategori->get_limit_data();
		$obat_satuan = $this->m_obat_satuan->get_limit_data();
		$this->pagination->initialize($config);
		$data = array(
			'obat_kategori_data' => $obat_kategori,
			'obat_satuan_data' => $obat_satuan,
			'obat_data' => $obat,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_obat', $data);
		$this->load->view('partials/v_footer');
	}

	public function save()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			// 'stok' => $this->input->post('stok'),
			'harga_beli' => $this->input->post('harga_beli'),
			'harga_jual' => $this->input->post('harga_jual'),
			'kadaluarsa' => $this->input->post('kadaluarsa'),
			'obat_kategori_id' => $this->input->post('obat_kategori_id'),
			'obat_satuan_id' => $this->input->post('obat_satuan_id'),
		);
		$this->m_obat->insert($data);
		redirect(site_url('obat'));
	}

	public function update()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			// 'stok' => $this->input->post('stok'),
			'harga_beli' => $this->input->post('harga_beli'),
			'harga_jual' => $this->input->post('harga_jual'),
			'kadaluarsa' => $this->input->post('kadaluarsa'),
			'obat_kategori_id' => $this->input->post('obat_kategori_id'),
			'obat_satuan_id' => $this->input->post('obat_satuan_id'),
		);
		$this->m_obat->update($this->input->post('id'), $data);
		redirect(site_url('obat'));
	}

	public function delete()
	{
		$this->m_obat->delete($this->input->post('id'));
		redirect(site_url('obat'));
	}

	public function cetak_pdf()
	{
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 7, 'DATA OBAT', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(8, 6, 'No', 1, 0, 'C');
		$pdf->Cell(185, 6, 'Nama', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10);
		$barang = $this->db->query("SELECT * FROM obat")->result();
		$no = 1;
		foreach ($barang as $data) {
			$pdf->Cell(8, 6, $no, 1, 0);
			$pdf->Cell(185, 6, $data->nama, 1, 1);
			$no++;
		}

		$pdf->Output();
	}
}
