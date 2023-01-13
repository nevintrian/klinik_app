<?php

class Ibu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('m_ibu');
        $this->load->model('m_posyandu');
        $this->load->model('m_imunisasi_ibu');
        $this->load->model('m_bidan');
        $this->load->library('pagination');
        $this->load->library('upload');
        $this->load->library('cetak_pdf');
    }

    public function index()
    {
        $this->load->view('partials/v_sidebar');
        $config['total_rows'] = $this->m_ibu->total_rows();
        if ($this->session->userdata('level') == 'kader') {
            $ibu = $this->m_ibu->get_limit_data_kader();
        } else if($this->session->userdata('level') == 'bidan'){
            $ibu = $this->m_ibu->get_limit_data_bidan();
        }else {
            $ibu = $this->m_ibu->get_limit_data();
        }
        $this->pagination->initialize($config);
        
        
        $posyandu = $this->m_posyandu->get_limit_data_asc();
        
        if ($this->session->userdata('level') == 'bidan') {
           $posyandu = $this->m_bidan->get_posyandu_by_bidan($this->session->userdata('id'));
        }
        $imunisasi = $this->m_imunisasi_ibu->get_limit_data();
        $data = array(
            'ibu_data' => $ibu,
            'total_rows' => $config['total_rows'],
            'posyandu_data' => $posyandu,
            'imunisasi_ibu_data' => $imunisasi
        );

        $this->load->view('v_ibu', $data);
        $this->load->view('partials/v_footer');
    }
    
    public function detail($nik)
    {
        $this->load->view('partials/v_sidebar');
        $config['total_rows'] = $this->m_ibu->total_rows();
        if ($this->session->userdata('level') == 'kader') {
            $ibu = $this->m_ibu->get_limit_data_kader_detail($nik);
        } else if($this->session->userdata('level') == 'bidan'){
            $ibu = $this->m_ibu->get_limit_data_bidan_detail($nik);
        }else {
            $ibu = $this->m_ibu->get_limit_data_detail($nik);
        }
        $this->pagination->initialize($config);
        
        
        $posyandu = $this->m_posyandu->get_limit_data_asc();
        
        if ($this->session->userdata('level') == 'bidan') {
           $posyandu = $this->m_bidan->get_posyandu_by_bidan($this->session->userdata('id'));
        }
        $imunisasi = $this->m_imunisasi_ibu->get_limit_data();
        $data = array(
            'ibu_row' => $this->m_ibu->get_by_nik($nik),
            'ibu_data' => $ibu,
            'total_rows' => $config['total_rows'],
            'posyandu_data' => $posyandu,
            'imunisasi_ibu_data' => $imunisasi
        );

        $this->load->view('v_ibu_detail', $data);
        $this->load->view('partials/v_footer');
    }

    public function posyandu($id)
    {
        $this->load->view('partials/v_sidebar');

        $config['total_rows'] = $this->m_ibu->total_rows();
        $this->pagination->initialize($config);
        $ibu = $this->m_ibu->get_limit_data_posyandu($id);
        $posyandu = $this->m_posyandu->get_limit_data_asc();
        
        if ($this->session->userdata('level') == 'bidan') {
           $posyandu = $this->m_bidan->get_posyandu_by_bidan($this->session->userdata('id'));
        }
        
        $imunisasi = $this->m_imunisasi_ibu->get_limit_data();
        $data = array(
            'ibu_data' => $ibu,
            'total_rows' => $config['total_rows'],
            'posyandu_data' => $posyandu,
            'imunisasi_ibu_data' => $imunisasi
        );

        $this->load->view('v_ibu', $data);
        $this->load->view('partials/v_footer');
    }
    
    public function imunisasi($id){
        $this->load->view('partials/v_sidebar');

        $config['total_rows'] = $this->m_ibu->total_rows();
        $this->pagination->initialize($config);
        $ibu = $this->m_ibu->get_limit_data_imunisasi($id);
        $posyandu = $this->m_posyandu->get_limit_data_asc();
        
        if ($this->session->userdata('level') == 'bidan') {
           $posyandu = $this->m_bidan->get_posyandu_by_bidan($this->session->userdata('id'));
        }
        
        $imunisasi = $this->m_imunisasi_ibu->get_limit_data();
        $data = array(
            'ibu_data' => $ibu,
            'total_rows' => $config['total_rows'],
            'posyandu_data' => $posyandu,
            'imunisasi_ibu_data' => $imunisasi
        );

        $this->load->view('v_ibu', $data);
        $this->load->view('partials/v_footer');
    }

    public function save()
    {
        $data = array(
            'nik' => $this->input->post('nik'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nama_suami' => $this->input->post('nama_suami'),
            'alamat' => $this->input->post('alamat'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'tanggal_daftar' => $this->input->post('tanggal_daftar'),
            'usia_ibu' => $this->input->post('usia_ibu'),
            'umur_kehamilan' => $this->input->post('umur_kehamilan'),
            'usia_anak_terakhir' => $this->input->post('usia_anak_terakhir'),
            'sistol' => $this->input->post('sistol'),
            'diastol' => $this->input->post('diastol'),
            // 'diastol_miring' => $this->input->post('diastol_miring'),
            // 'diastol_terlentang' => $this->input->post('diastol_terlentang'),
            'berat_badan' => $this->input->post('berat_badan'),
            'tinggi_badan' => $this->input->post('tinggi_badan'),
            'keluhan' => $this->input->post('keluhan'),
            'terapi' => $this->input->post('terapi'),
            'nama_pemeriksa' => $this->input->post('nama_pemeriksa'),
            'telepon' => $this->input->post('telepon'),
            'posyandu_id' => $this->input->post('posyandu_id'),
            'imunisasi_ibu_id' => $this->input->post('imunisasi_ibu_id'),
        );
        $this->m_ibu->insert($data);
        redirect(site_url('ibu'));
    }
   
    public function update()
    {
        $data = array(
            'nik' => $this->input->post('nik'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nama_suami' => $this->input->post('nama_suami'),
            'alamat' => $this->input->post('alamat'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            // 'tanggal_daftar' => $this->input->post('tanggal_daftar'),
            // 'usia_ibu' => $this->input->post('usia_ibu'),
            // 'umur_kehamilan' => $this->input->post('umur_kehamilan'),
            // 'usia_anak_terakhir' => $this->input->post('usia_anak_terakhir'),
            // 'sistol' => $this->input->post('sistol'),
            // 'diastol' => $this->input->post('diastol'),
            // 'diastol_miring' => $this->input->post('diastol_miring'),
            // 'diastol_terlentang' => $this->input->post('diastol_terlentang'),
            // 'berat_badan' => $this->input->post('berat_badan'),
            // 'tinggi_badan' => $this->input->post('tinggi_badan'),
            // 'keluhan' => $this->input->post('keluhan'),
            // 'terapi' => $this->input->post('terapi'),
            // 'nama_pemeriksa' => $this->input->post('nama_pemeriksa'),
            'telepon' => $this->input->post('telepon'),
            'posyandu_id' => $this->input->post('posyandu_id'),
            // 'imunisasi_ibu_id' => $this->input->post('imunisasi_ibu_id'),
        );
        // $this->m_ibu->update($this->input->post('id'), $data);
        $nik = $this->m_ibu->get_by_id($this->input->post('id'))->nik;
        $this->m_ibu->update_by_nik($nik, $data);
        redirect(site_url('ibu'));
    }
    
    public function update_detail()
    {
        $data = array(
            'tanggal_daftar' => $this->input->post('tanggal_daftar'),
            'usia_ibu' => $this->input->post('usia_ibu'),
            'umur_kehamilan' => $this->input->post('umur_kehamilan'),
            'usia_anak_terakhir' => $this->input->post('usia_anak_terakhir'),
            'sistol' => $this->input->post('sistol'),
            'diastol' => $this->input->post('diastol'),
            'diastol_miring' => $this->input->post('diastol_miring'),
            'diastol_terlentang' => $this->input->post('diastol_terlentang'),
            'berat_badan' => $this->input->post('berat_badan'),
            'tinggi_badan' => $this->input->post('tinggi_badan'),
            'keluhan' => $this->input->post('keluhan'),
            'terapi' => $this->input->post('terapi'),
            'nama_pemeriksa' => $this->input->post('nama_pemeriksa'),
            'imunisasi_ibu_id' => $this->input->post('imunisasi_ibu_id'),
        );
        $this->m_ibu->update($this->input->post('id'), $data);
        redirect(site_url('ibu'));
    }

    public function delete()
    {
        // $this->m_ibu->delete($this->input->post('id'));
        $nik = $this->m_ibu->get_by_id($this->input->post('id'))->nik;
        $this->m_ibu->delete_by_nik($nik);
        redirect(site_url('ibu'));
    }
    
    public function delete_detail()
    {
        $this->m_ibu->delete($this->input->post('id'));
        redirect(site_url('ibu'));
    }

    public function cek_data_ibu()
    {
        $id = $this->input->post('id');
        $cek = $this->db->query("SELECT * FROM ibu WHERE id='$id'")->row();
        $data = array(
            'nik' => $cek->nik,
            'nama_ibu' => $cek->nama_ibu,
            'nama_suami' => $cek->nama_suami,
            'alamat' => $cek->alamat,
            'rt' => $cek->rt,
            'rw' => $cek->rw,
            'telepon' => $cek->telepon,
            'posyandu_id' => $cek->posyandu_id,
            'imunisasi_ibu_id' => $cek->imunisasi_ibu_id,
        );

        echo json_encode($data);
    }


    public function cetak_pdf($id)
    {
        
        $dates = $this->input->get('filter', TRUE);
        if($dates != null){
            $date = explode("-", $dates);
        }
        
        $imunisasi_id = $this->input->get('filter_imunisasi');
      
   
        $image1 = "https://sipadu.srirejeki.net/assets/kop.png";
        
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell( 0, 0, $pdf->Image($image1 ?? '', $pdf->GetX() +60 ?? '', $pdf->GetY()-7 ?? '', 150) ?? '', 0, 1, 'C', false );
        if (is_numeric($id)) {
            $nama = $this->db->query("SELECT nama from posyandu where id = $id")->row()->nama;
            $pdf->Cell(0, 10, "POSYANDU $nama", 0, 1, 'C');
        } else {
            $pdf->Cell(0, 10, "SEMUA POSYANDU", 0, 1, 'C');
        }
        
        $pdf->Cell(10, 7, '', 0, 1);
         if($imunisasi_id != 0){
             $nama = $this->db->query("SELECT nama from imunisasi_ibu where id = $imunisasi_id")->row()->nama;
             $nama = strtoupper($nama);
             if($nama == "TIDAK ADA"){
                 $nama = "";
             }
             $pdf->Cell(0, 12, "DATA REGISTRASI IBU HAMIL $nama", 0, 1, 'C');
        }else{
            $pdf->Cell(0, 12, "DATA REGISTRASI IBU HAMIL", 0, 1, 'C');
        }
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(22, 6, 'NIK', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Nama Ibu', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Nama Suami', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(7, 6, 'RT', 1, 0, 'C');
        $pdf->Cell(7, 6, 'RW', 1, 0, 'C');
        // $pdf->Cell(20, 6, 'Tanggal Daftar', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Usia', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Umur Kehamilan', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Usia Anak Terakhir', 1, 0, 'C');
        $pdf->Cell(15, 6, 'Sistol', 1, 0, 'C');
        $pdf->Cell(15, 6, 'Diastol', 1, 0, 'C');
        //$pdf->Cell(45, 6, 'Diastol Miring', 1, 0, 'C');
        // $pdf->Cell(20, 6, 'Diastol Terlentang', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Berat', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Tinggi', 1, 0, 'C');
        // $pdf->Cell(20, 6, 'Keluhan', 1, 0, 'C');
        // $pdf->Cell(20, 6, 'Terapi', 1, 0, 'C');
        $pdf->Cell(17, 6, 'Pemeriksa', 1, 0, 'C');
        $pdf->Cell(17, 6, 'Telepon', 1, 0, 'C');
        $pdf->Cell(17, 6, 'Imunisasi', 1, 0, 'C');
        $pdf->Cell(23, 6, 'Posyandu', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 6);

        if (is_numeric($id)) {
            if($dates != null){
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama FROM ibu join posyandu on posyandu.id = ibu.posyandu_id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where posyandu.id = $id and MONTH(tanggal_daftar) = $date[1] and YEAR(tanggal_daftar) = $date[0] and imunisasi_ibu.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama FROM ibu join posyandu on posyandu.id = ibu.posyandu_id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where posyandu.id = $id and MONTH(tanggal_daftar) = $date[1] and YEAR(tanggal_daftar) = $date[0]")->result();
                }
            }else{
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama FROM ibu join posyandu on posyandu.id = ibu.posyandu_id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where posyandu.id = $id and imunisasi_ibu.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama FROM ibu join posyandu on posyandu.id = ibu.posyandu_id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where posyandu.id = $id")->result();
                }
            }
        } else {
            if($dates != null){
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama FROM ibu join posyandu on posyandu.id = ibu.posyandu_id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id and MONTH(tanggal_daftar) = $date[1] and YEAR(tanggal_daftar) = $date[0] and imunisasi_ibu.id = $imunisasi_id")->result();
                }else{    
                    $barang = $this->db->query("SELECT ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama FROM ibu join posyandu on posyandu.id = ibu.posyandu_id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id and MONTH(tanggal_daftar) = $date[1] and YEAR(tanggal_daftar) = $date[0]")->result();
                }
            }else{
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama FROM ibu join posyandu on posyandu.id = ibu.posyandu_id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id and imunisasi_ibu.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama FROM ibu join posyandu on posyandu.id = ibu.posyandu_id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id")->result();
                }
            }
            
           
        }
        
        if(is_numeric($id) && $this->session->userdata('level') == 'bidan'){
            if($dates != null){
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama FROM ibu join posyandu on posyandu.id = ibu.posyandu_id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where posyandu.id = $id and MONTH(tanggal_daftar) = $date[1] and YEAR(tanggal_daftar) = $date[0] and imunisasi_ibu.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama FROM ibu join posyandu on posyandu.id = ibu.posyandu_id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where posyandu.id = $id and MONTH(tanggal_daftar) = $date[1] and YEAR(tanggal_daftar) = $date[0]")->result();
                }
            }else{
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama FROM ibu join posyandu on posyandu.id = ibu.posyandu_id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where posyandu.id = $id and imunisasi_ibu.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama FROM ibu join posyandu on posyandu.id = ibu.posyandu_id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where posyandu.id = $id")->result();
                }
            }
        }else if ($this->session->userdata('level') == 'bidan') {
            $bidan_id =  $this->session->userdata('id');
            if($dates != null){
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT ibu .*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama from bidan join bidan_posyandu on bidan.id = bidan_posyandu.bidan_id join posyandu on posyandu.id = bidan_posyandu.posyandu_id join ibu on ibu.posyandu_id = posyandu.id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where bidan.id = $bidan_id and MONTH(tanggal_daftar) = $date[1] and YEAR(tanggal_daftar) = $date[0] and imunisasi_ibu.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT ibu .*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama from bidan join bidan_posyandu on bidan.id = bidan_posyandu.bidan_id join posyandu on posyandu.id = bidan_posyandu.posyandu_id join ibu on ibu.posyandu_id = posyandu.id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where bidan.id = $bidan_id and MONTH(tanggal_daftar) = $date[1] and YEAR(tanggal_daftar) = $date[0]")->result();
                }
            }else{
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT ibu .*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama from bidan join bidan_posyandu on bidan.id = bidan_posyandu.bidan_id join posyandu on posyandu.id = bidan_posyandu.posyandu_id join ibu on ibu.posyandu_id = posyandu.id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where bidan.id = $bidan_id and imunisasi_ibu.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT ibu .*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama from bidan join bidan_posyandu on bidan.id = bidan_posyandu.bidan_id join posyandu on posyandu.id = bidan_posyandu.posyandu_id join ibu on ibu.posyandu_id = posyandu.id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where bidan.id = $bidan_id")->result();
                }
            }
        }
        
        if(is_numeric($id) && $this->session->userdata('level') == 'kader'){
            if($dates != null){
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama FROM ibu join posyandu on posyandu.id = ibu.posyandu_id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where posyandu.id = $id and MONTH(tanggal_daftar) = $date[1] and YEAR(tanggal_daftar) = $date[0] and imunisasi_ibu.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama FROM ibu join posyandu on posyandu.id = ibu.posyandu_id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where posyandu.id = $id and MONTH(tanggal_daftar) = $date[1] and YEAR(tanggal_daftar) = $date[0]")->result();
                }
            }else{
                if($imunisasi_id != 0){
                }else{
                    $barang = $this->db->query("SELECT ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama FROM ibu join posyandu on posyandu.id = ibu.posyandu_id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where posyandu.id = $id")->result();
                }
            }
        }else if ($this->session->userdata('level') == 'kader') {
            $posyandu_id =  $this->session->userdata('posyandu_id');
            if($dates != null){
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT ibu .*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama from kader join posyandu on posyandu.id = kader.posyandu_id join ibu on ibu.posyandu_id = posyandu.id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where posyandu.id = $posyandu_id and MONTH(tanggal_daftar) = $date[1] and YEAR(tanggal_daftar) = $date[0] and imunisasi_ibu.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT ibu .*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama from kader join posyandu on posyandu.id = kader.posyandu_id join ibu on ibu.posyandu_id = posyandu.id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where posyandu.id = $posyandu_id and MONTH(tanggal_daftar) = $date[1] and YEAR(tanggal_daftar) = $date[0]")->result();
                }
            }else{
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT ibu .*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama from kader join posyandu on posyandu.id = kader.posyandu_id join ibu on ibu.posyandu_id = posyandu.id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where posyandu.id = $posyandu_id and imunisasi_ibu.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT ibu .*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama from kader join posyandu on posyandu.id = kader.posyandu_id join ibu on ibu.posyandu_id = posyandu.id join imunisasi_ibu on imunisasi_ibu.id = ibu.imunisasi_ibu_id where posyandu.id = $posyandu_id")->result();
                }
            }
        }
        
        $no = 1;
        foreach ($barang as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(22, 6, $data->nik ?? '', 1, 0);
            $pdf->Cell(20, 6, $data->nama_ibu ?? '', 1, 0);
            $pdf->Cell(20, 6, $data->nama_suami ?? '', 1, 0);
            $pdf->Cell(20, 6, $data->alamat ?? '', 1, 0);
            $pdf->Cell(7, 6, $data->rt ?? '', 1, 0);
            $pdf->Cell(7, 6, $data->rw ?? '', 1, 0);
            // $pdf->Cell(20, 6, $data->tanggal_daftar ?? '', 1, 0);
            $pdf->Cell(10, 6, $data->usia_ibu ?? '', 1, 0);
            $pdf->Cell(20, 6, $data->umur_kehamilan ?? '', 1, 0);
            $pdf->Cell(20, 6, $data->usia_anak_terakhir ?? '', 1, 0);
            $pdf->Cell(15, 6, $data->sistol ?? '', 1, 0);
            $pdf->Cell(15, 6, $data->diastol ?? '', 1, 0);
            //$pdf->Cell(45, 6, $data->diastol_miring ?? '', 1, 0);
            // $pdf->Cell(20, 6, $data->diastol_terlentang ?? '', 1, 0);
            $pdf->Cell(10, 6, $data->berat_badan . ' kg' ?? '', 1, 0);
            $pdf->Cell(10, 6, $data->tinggi_badan . ' cm' ?? '', 1, 0);
            // $pdf->Cell(20, 6, $data->keluhan ?? '', 1, 0);
            // $pdf->Cell(20, 6, $data->terapi ?? '', 1, 0);
            $pdf->Cell(17, 6, $data->nama_pemeriksa ?? '', 1, 0);
            $pdf->Cell(17, 6, $data->telepon ?? '', 1, 0);
            $pdf->Cell(17, 6, $data->imunisasi_ibu_nama ?? '', 1, 0);
            $pdf->Cell(23, 6, $data->posyandu_nama ?? '', 1, 1);
            $no++;
        }
        
        if ($this->session->userdata('level') == 'bidan') {
            $pdf->Cell(0, 20, "Mengetahui, Bidan Desa", 0, true, 'R');
            $pdf->Cell(0, 20, $this->session->userdata('nama'), 0, true, 'R');
        }

        $pdf->Output();
    }
    
}
