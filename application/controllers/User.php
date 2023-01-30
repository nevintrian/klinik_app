<?php

class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('m_user');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cetak_pdf');
	}

	public function index()
	{
		$this->load->view('partials/v_sidebar');
		$config['total_rows'] = $this->m_user->total_rows();
		$user = $this->m_user->get_limit_data();
		$this->pagination->initialize($config);
		$data = array(
			'user_data' => $user,
			'total_rows' => $config['total_rows'],
		);

		$this->load->view('v_user', $data);
		$this->load->view('partials/v_footer');
	}

	public function save()
	{
		$data = array(
			'no_identitas' => $this->input->post('no_identitas'),
			'nama' => $this->input->post('nama'),
			'jk' => $this->input->post('jk'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'gol_darah' => $this->input->post('gol_darah'),
			'alamat' => $this->input->post('alamat'),
			'telepon' => $this->input->post('telepon'),
			'pendidikan' => $this->input->post('pendidikan'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'jabatan' => $this->input->post('jabatan'),
		);
		$this->m_user->insert($data);
		redirect(site_url('user'));
	}

	public function update()
	{

		if ($this->input->post('password') != null) {
			$data = array(
				'no_identitas' => $this->input->post('no_identitas'),
				'nama' => $this->input->post('nama'),
				'jk' => $this->input->post('jk'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'agama' => $this->input->post('agama'),
				'gol_darah' => $this->input->post('gol_darah'),
				'alamat' => $this->input->post('alamat'),
				'telepon' => $this->input->post('telepon'),
				'pendidikan' => $this->input->post('pendidikan'),
				'email' => $this->input->post('email'),
				'jabatan' => $this->input->post('jabatan'),
				'password' => md5($this->input->post('password')),
			);
		} else {
			$data = array(
				'no_identitas' => $this->input->post('no_identitas'),
				'nama' => $this->input->post('nama'),
				'jk' => $this->input->post('jk'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'agama' => $this->input->post('agama'),
				'gol_darah' => $this->input->post('gol_darah'),
				'alamat' => $this->input->post('alamat'),
				'telepon' => $this->input->post('telepon'),
				'pendidikan' => $this->input->post('pendidikan'),
				'email' => $this->input->post('email'),
				'jabatan' => $this->input->post('jabatan'),
			);
		}

		$this->m_user->update($this->input->post('id'), $data);
		redirect(site_url('user'));
	}

	public function delete()
	{
		$this->m_user->delete($this->input->post('id'));
		redirect(site_url('user'));
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
		$barang = $this->db->query("SELECT * FROM user")->result();
		$no = 1;
		foreach ($barang as $data) {
			$pdf->Cell(8, 6, $no, 1, 0);
			$pdf->Cell(185, 6, $data->nama, 1, 1);
			$no++;
		}

		$pdf->Output();
	}
}
