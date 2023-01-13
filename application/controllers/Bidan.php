<?php

class Bidan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('m_bidan');
        $this->load->model('m_posyandu');
        $this->load->library('pagination');
        $this->load->library('upload');
        $this->load->library('cetak_pdf');
    }

    public function index()
    {
        $this->load->view('partials/v_sidebar');
        $config['total_rows'] = $this->m_bidan->total_rows();
        $bidan = $this->m_bidan->get_limit_data();
        $posyandu = $this->m_posyandu->get_limit_data_asc();
        $this->pagination->initialize($config);
        $data = array(
            'bidan_data' => $bidan,
            'posyandu_data' => $posyandu,
            'total_rows' => $config['total_rows'],
        );

        $this->load->view('v_bidan', $data);
        $this->load->view('partials/v_footer');
    }
    
    
    function get_posyandu_by_bidan(){
		$bidan_id=$this->input->post('id');
    	$data=$this->m_bidan->get_posyandu_by_bidan($bidan_id);
    	foreach ($data as $result) {
    		$value[] = (float) $result->posyandu_id;
    	}
    	echo json_encode($value);
	}
	
	 function get_posyandu_data_by_bidan(){
		$bidan_id=$this->input->post('id');
    	$data=$this->m_bidan->get_posyandu_by_bidan($bidan_id);
    	foreach ($data as $result) {
    		$value[] = (string) $result->posyandu_nama;
    	}
    	echo json_encode($value);
	}

    public function save()
    {
        $data = array(
            'no_kta' => $this->input->post('no_kta'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            'password' => md5($this->input->post('password')),
        );
        $this->m_bidan->insert($data);
        
        $insert_id = $this->db->insert_id();
        $posyandu_data = $this->input->post('posyandu');
        $this->m_bidan->insert_posyandu($posyandu_data, $insert_id);
        
        redirect(site_url('bidan'));
    }

    public function update()
    {
        $data = array(
            'no_kta' => $this->input->post('no_kta'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
        );
        if ($this->input->post('password')) {
            $data['password'] = md5($this->input->post('password'));
        }

        $id = $this->input->post('id');
        $this->m_bidan->update($id, $data);
        $this->m_bidan->delete_bidan_posyandu($id);
        $posyandu_data = $this->input->post('posyandu');
        $this->m_bidan->insert_posyandu($posyandu_data, $id);
        redirect(site_url('bidan'));
    }

    public function delete()
    {
        $this->m_bidan->delete($this->input->post('id'));
        redirect(site_url('bidan'));
    }

    public function cetak_pdf()
    {
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'DATA BIDAN', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(30, 6, 'No KTA', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Email', 1, 0, 'C');
        $pdf->Cell(60, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(110, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Telepon', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $barang = $this->db->query("SELECT * FROM bidan")->result();
        $no = 1;
        foreach ($barang as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(30, 6, $data->no_kta, 1, 0);
            $pdf->Cell(40, 6, $data->email, 1, 0);
            $pdf->Cell(60, 6, $data->nama, 1, 0);
            $pdf->Cell(110, 6, $data->alamat, 1, 0);
            $pdf->Cell(30, 6, $data->telepon, 1, 1);
            $no++;
        }


        $pdf->Output();
    }
}
