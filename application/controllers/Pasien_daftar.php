<?php

class Pasien_daftar extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_pasien_daftar');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{
		$this->load->view('partials/v_sidebar');
		$config['total_rows'] = $this->m_pasien_daftar->total_rows();
		$pasien_daftar = $this->m_pasien_daftar->get_limit_data();
		$this->pagination->initialize($config);
		$data = array(
			'pasien_daftar_data' => $pasien_daftar,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_pasien_daftar', $data);
		$this->load->view('partials/v_footer');
	}

	public function save()
	{
		$no_rm = $this->m_pasien_daftar->get_limit_pasien_row()->no_rm;
		$no_rm++;
		$data = array(
			'no_rm' => $no_rm,
			'no_identitas' => $this->input->post('no_identitas'),
			'nama' => $this->input->post('nama'),
			'jk' => $this->input->post('jk'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'gol_darah' => $this->input->post('gol_darah'),
			'alamat' => $this->input->post('alamat'),
			'telepon' => $this->input->post('telepon'),
			'suku' => $this->input->post('suku'),
			'pendidikan' => $this->input->post('pendidikan'),
			'status' => $this->input->post('status'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'no_bpjs' => $this->input->post('no_bpjs') ?? '-',
		);
		$this->m_pasien_daftar->insert($data);
		redirect(site_url('pasien_daftar'));
	}

	public function update()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
		);
		$this->m_pasien_daftar->update($this->input->post('id'), $data);
		redirect(site_url('pasien_daftar'));
	}

	public function delete()
	{
		$this->m_pasien_daftar->delete($this->input->post('id'));
		redirect(site_url('pasien_daftar'));
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
		$barang = $this->db->query("SELECT * FROM pasien_daftar")->result();
		$no = 1;
		foreach ($barang as $data) {
			$pdf->Cell(8, 6, $no, 1, 0);
			$pdf->Cell(185, 6, $data->nama, 1, 1);
			$no++;
		}

		$pdf->Output();
	}
}
