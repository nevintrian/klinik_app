<?php

class Penyuluhan_ibu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('m_penyuluhan_ibu');
        $this->load->library('pagination');
        $this->load->library('upload');
        $this->load->library('cetak_pdf');
    }

    public function index()
    {
        $this->load->view('partials/v_sidebar');
        $config['total_rows'] = $this->m_penyuluhan_ibu->total_rows();
        $penyuluhan_ibu = $this->m_penyuluhan_ibu->get_limit_data();
        $this->pagination->initialize($config);
        $data = array(
            'penyuluhan_ibu_data' => $penyuluhan_ibu,
            'total_rows' => $config['total_rows'],
        );

        $this->load->view('v_penyuluhan_ibu', $data);
        $this->load->view('partials/v_footer');
    }

    public function save()
    {
       
        $data = array(
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
        );
        
        if (!empty($_FILES["file"])) {
            $name = "file_" . time();
            $config['upload_path'] = './assets/file';
            $config["allowed_types"] ="*";
            $config['file_name'] = $name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            if (!$this->upload->do_upload('file'))
            {
                var_dump($this->upload->display_errors());
                die();
            }
            else
            {
                $upload = $this->upload->data();
                $data['file'] = $upload['file_name'];
            }
        }
        
        $this->m_penyuluhan_ibu->insert($data);
        redirect(site_url('penyuluhan_ibu'));
    }

    public function update()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
        );
        
        if (!empty($_FILES["file"])) {
            $name = "file_" . time();
            $config['upload_path'] = './assets/file';
            $config["allowed_types"] ="*";
            $config['file_name'] = $name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            if (!$this->upload->do_upload('file'))
            {
                var_dump($this->upload->display_errors());
                die();
            }
            else
            {
                $upload = $this->upload->data();
                $data['file'] = $upload['file_name'];
            }
        }
        
        $this->m_penyuluhan_ibu->update($this->input->post('id'), $data);
        redirect(site_url('penyuluhan_ibu'));
    }

    public function delete()
    {
        $this->m_penyuluhan_ibu->delete($this->input->post('id'));
        redirect(site_url('penyuluhan_ibu'));
    }

    public function cetak_pdf()
    {
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'DATA PENYULUHAN IBU', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(100, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(170, 6, 'Deskripsi', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $barang = $this->db->query("SELECT * FROM penyuluhan_ibu")->result();
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
