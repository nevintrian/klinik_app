<?php

class Imunisasi_balita extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('m_imunisasi_balita');
        $this->load->library('pagination');
        $this->load->library('upload');
        $this->load->library('cetak_pdf');
    }

    public function index()
    {
        $this->load->view('partials/v_sidebar');
        $config['total_rows'] = $this->m_imunisasi_balita->total_rows();
        $imunisasi_balita = $this->m_imunisasi_balita->get_limit_data();
        $this->pagination->initialize($config);
        $data = array(
            'imunisasi_balita_data' => $imunisasi_balita,
            'total_rows' => $config['total_rows'],
        );

        $this->load->view('v_imunisasi_balita', $data);
        $this->load->view('partials/v_footer');
    }

    public function save()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
        );
        $this->m_imunisasi_balita->insert($data);
        redirect(site_url('imunisasi_balita'));
    }

    public function update()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
        );
        $this->m_imunisasi_balita->update($this->input->post('id'), $data);
        redirect(site_url('imunisasi_balita'));
    }

    public function delete()
    {
        $this->m_imunisasi_balita->delete($this->input->post('id'));
        redirect(site_url('imunisasi_balita'));
    }

    public function cetak_pdf()
    {
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'DATA IMUNISASI BALITA', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(100, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(170, 6, 'Deskripsi', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $barang = $this->db->query("SELECT * FROM imunisasi_balita")->result();
        $no = 1;
        foreach ($barang as $data) {
            $text = substr($data->deskripsi ?? '', 0, 90) . '...';
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(100, 6, $data->nama, 1, 0);
            $pdf->Cell(170, 6, $text ?? '', 1, 1);
            $no++;
        }

        $pdf->Output();
    }
}