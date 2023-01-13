<?php

class Balita extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('m_balita');
        $this->load->model('m_posyandu');
        $this->load->model('m_bidan');
        $this->load->model('m_imunisasi_balita');
        $this->load->library('pagination');
        $this->load->library('upload');
        $this->load->library('cetak_pdf');
    }

    public function index()
    {
        $this->load->view('partials/v_sidebar');

        $config['total_rows'] = $this->m_balita->total_rows();
        $this->pagination->initialize($config);
        if ($this->session->userdata('level') == 'kader') {
            $balita = $this->m_balita->get_limit_data_kader();
        }else if($this->session->userdata('level') == 'bidan'){
            $balita = $this->m_balita->get_limit_data_bidan();
        }else {
            $balita = $this->m_balita->get_limit_data();
        }
        $posyandu = $this->m_posyandu->get_limit_data_asc();
         
        if ($this->session->userdata('level') == 'bidan') {
           $posyandu = $this->m_bidan->get_posyandu_by_bidan($this->session->userdata('id'));
        }
        
        $imunisasi = $this->m_imunisasi_balita->get_limit_data();
        $data = array(
            'balita_data' => $balita,
            'total_rows' => $config['total_rows'],
            'posyandu_data' => $posyandu,
            'imunisasi_balita_data' => $imunisasi
        );

        $this->load->view('v_balita', $data);
        $this->load->view('partials/v_footer');
    }
    
    public function detail($nik)
    {
        $this->load->view('partials/v_sidebar');

        $config['total_rows'] = $this->m_balita->total_rows();
        $this->pagination->initialize($config);
        if ($this->session->userdata('level') == 'kader') {
            $balita = $this->m_balita->get_limit_data_kader_detail($nik);
        }else if($this->session->userdata('level') == 'bidan'){
            $balita = $this->m_balita->get_limit_data_bidan_detail($nik);
        }else {
            $balita = $this->m_balita->get_limit_data_detail($nik);
        }
        $posyandu = $this->m_posyandu->get_limit_data_asc();
         
        if ($this->session->userdata('level') == 'bidan') {
           $posyandu = $this->m_bidan->get_posyandu_by_bidan($this->session->userdata('id'));
        }
        
        $imunisasi = $this->m_imunisasi_balita->get_limit_data();
        $data = array(
            'balita_row' => $this->m_balita->get_by_nik($nik),
            'balita_data' => $balita,
            'total_rows' => $config['total_rows'],
            'posyandu_data' => $posyandu,
            'imunisasi_balita_data' => $imunisasi
        );

        $this->load->view('v_balita_detail', $data);
        $this->load->view('partials/v_footer');
    }

    public function posyandu($id)
    {
        $this->load->view('partials/v_sidebar');

        $config['total_rows'] = $this->m_balita->total_rows();
        $this->pagination->initialize($config);
        $balita = $this->m_balita->get_limit_data_posyandu($id);
        $posyandu = $this->m_posyandu->get_limit_data_asc();
        
        if ($this->session->userdata('level') == 'bidan') {
           $posyandu = $this->m_bidan->get_posyandu_by_bidan($this->session->userdata('id'));
        }
        
        $imunisasi = $this->m_imunisasi_balita->get_limit_data();
        $data = array(
            'balita_data' => $balita,
            'total_rows' => $config['total_rows'],
            'posyandu_data' => $posyandu,
            'imunisasi_balita_data' => $imunisasi
        );

        $this->load->view('v_balita', $data);
        $this->load->view('partials/v_footer');
    }
    
    public function imunisasi($id)
    {
        $this->load->view('partials/v_sidebar');

        $config['total_rows'] = $this->m_balita->total_rows();
        $this->pagination->initialize($config);
        $balita = $this->m_balita->get_limit_data_imunisasi($id);
        $posyandu = $this->m_posyandu->get_limit_data_asc();
        
        if ($this->session->userdata('level') == 'bidan') {
           $posyandu = $this->m_bidan->get_posyandu_by_bidan($this->session->userdata('id'));
        }
        
        $imunisasi = $this->m_imunisasi_balita->get_limit_data();
        $data = array(
            'balita_data' => $balita,
            'total_rows' => $config['total_rows'],
            'posyandu_data' => $posyandu,
            'imunisasi_balita_data' => $imunisasi
        );

        $this->load->view('v_balita', $data);
        $this->load->view('partials/v_footer');
    }

    public function save()
    {
        $data = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'tanggal_ukur' => $this->input->post('tanggal_ukur'),
            'umur' => $this->input->post('umur'),
            'tinggi_badan' => $this->input->post('tinggi_badan'),
            'cara_ukur' => $this->input->post('cara_ukur'),
            'berat_badan' => $this->input->post('berat_badan'),
            'lingkar_kepala' => $this->input->post('lingkar_kepala'),
            'vitamin_a' => $this->input->post('vitamin_a'),
            'obat_cacing' => $this->input->post('obat_cacing'),
            'orangtua' => $this->input->post('orangtua'),
            'telepon' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'posyandu_id' => $this->input->post('posyandu_id'),
            'imunisasi_balita_id' => $this->input->post('imunisasi_balita_id'),
        );
        $this->m_balita->insert($data);
        redirect(site_url('balita'));
    }

    public function update()
    {
        $data = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            // 'tanggal_ukur' => $this->input->post('tanggal_ukur'),
            // 'umur' => $this->input->post('umur'),
            // 'tinggi_badan' => $this->input->post('tinggi_badan'),
            // 'cara_ukur' => $this->input->post('cara_ukur'),
            // 'berat_badan' => $this->input->post('berat_badan'),
            // 'lingkar_kepala' => $this->input->post('lingkar_kepala'),
            // 'vitamin_a' => $this->input->post('vitamin_a'),
            // 'obat_cacing' => $this->input->post('obat_cacing'),
            'orangtua' => $this->input->post('orangtua'),
            'telepon' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'posyandu_id' => $this->input->post('posyandu_id'),
            // 'imunisasi_balita_id' => $this->input->post('imunisasi_balita_id'),
        );

        // $this->m_balita->update($this->input->post('id'), $data);
        $nik = $this->m_balita->get_by_id($this->input->post('id'))->nik;
        $this->m_balita->update_by_nik($nik, $data);
        redirect(site_url('balita'));
    }
    
    public function update_detail()
    {
        $data = array(
            // 'nik' => $this->input->post('nik'),
            // 'nama' => $this->input->post('nama'),
            // 'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            // 'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'tanggal_ukur' => $this->input->post('tanggal_ukur'),
            'umur' => $this->input->post('umur'),
            'tinggi_badan' => $this->input->post('tinggi_badan'),
            'cara_ukur' => $this->input->post('cara_ukur'),
            'berat_badan' => $this->input->post('berat_badan'),
            'lingkar_kepala' => $this->input->post('lingkar_kepala'),
            'vitamin_a' => $this->input->post('vitamin_a'),
            'obat_cacing' => $this->input->post('obat_cacing'),
            // 'orangtua' => $this->input->post('orangtua'),
            // 'telepon' => $this->input->post('telepon'),
            // 'alamat' => $this->input->post('alamat'),
            // 'rt' => $this->input->post('rt'),
            // 'rw' => $this->input->post('rw'),
            // 'posyandu_id' => $this->input->post('posyandu_id'),
            'imunisasi_balita_id' => $this->input->post('imunisasi_balita_id'),
        );

        $this->m_balita->update($this->input->post('id'), $data);
        redirect(site_url('balita'));
    }

    public function delete()
    {
        // $this->m_balita->delete($this->input->post('id'));
        $nik = $this->m_balita->get_by_id($this->input->post('id'))->nik;
        $this->m_balita->delete_by_nik($nik);
        redirect(site_url('balita'));
    }
    
    
    public function delete_detail()
    {
        $this->m_balita->delete($this->input->post('id'));
        redirect(site_url('balita'));
    }

    public function cek_data_balita()
    {
        $id = $this->input->post('id');
        $cek = $this->db->query("SELECT * FROM balita WHERE id='$id'")->row();
        $data = array(
            'nik' => $cek->nik,
            'nama' => $cek->nama,
            'umur' => $cek->umur,
            'jenis_kelamin' => $cek->jenis_kelamin,
            'tanggal_lahir' => $cek->tanggal_lahir,
            'orangtua' => $cek->orangtua,
            'telepon' => $cek->telepon,
            'alamat' => $cek->alamat,
            'rt' => $cek->rt,
            'rw' => $cek->rw,
            'posyandu_id' => $cek->posyandu_id,
            'imunisasi_balita_id' => $cek->imunisasi_balita_id,
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
             $nama = $this->db->query("SELECT nama from imunisasi_balita where id = $imunisasi_id")->row()->nama;
             $nama = strtoupper($nama);
             if($nama == "TIDAK ADA"){
                 $nama = "";
             }
             $pdf->Cell(0, 12, "DATA REGISTRASI BALITA $nama", 0, 1, 'C');
        }else{
            $pdf->Cell(0, 12, "DATA REGISTRASI BALITA", 0, 1, 'C');
        }
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(5, 6, 'No', 1, 0, 'C');
        $pdf->Cell(22, 6, 'NIK', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(5, 6, 'JK', 1, 0, 'C');
        $pdf->Cell(16, 6, 'Tanggal Lahir', 1, 0, 'C');
        // $pdf->Cell(17, 6, 'Tanggal Ukur', 1, 0, 'C');
        $pdf->Cell(12, 6, 'Umur', 1, 0, 'C');
        $pdf->Cell(12, 6, 'Tinggi', 1, 0, 'C');
        $pdf->Cell(12, 6, 'Cara Ukur', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Berat', 1, 0, 'C');
        $pdf->Cell(10, 6, 'L Kepala', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Vit A', 1, 0, 'C');
        $pdf->Cell(15, 6, 'Obat Cacing', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Orangtua', 1, 0, 'C');
        $pdf->Cell(17, 6, 'Telepon', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(7, 6, 'RT', 1, 0, 'C');
        $pdf->Cell(7, 6, 'RW', 1, 0, 'C');
        $pdf->Cell(25, 6, 'Imunisasi', 1, 0, 'C');
        $pdf->Cell(25, 6, 'Posyandu', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 6);
        if (is_numeric($id)) {
            if($dates != null){
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama FROM balita join posyandu on posyandu.id = balita.posyandu_id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where posyandu.id = $id and MONTH(tanggal_ukur) = $date[1] and YEAR(tanggal_ukur) = $date[0] and imunisasi_balita.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama FROM balita join posyandu on posyandu.id = balita.posyandu_id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where posyandu.id = $id and MONTH(tanggal_ukur) = $date[1] and YEAR(tanggal_ukur) = $date[0]")->result();
                }
            }else{
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama FROM balita join posyandu on posyandu.id = balita.posyandu_id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where posyandu.id = $id and imunisasi_balita.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama FROM balita join posyandu on posyandu.id = balita.posyandu_id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where posyandu.id = $id")->result();
                }
            }
        } else {
            if($dates != null){
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama FROM balita join posyandu on posyandu.id = balita.posyandu_id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id and MONTH(tanggal_ukur) = $date[1] and YEAR(tanggal_ukur) = $date[0] and imunisasi_balita.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama FROM balita join posyandu on posyandu.id = balita.posyandu_id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id and MONTH(tanggal_ukur) = $date[1] and YEAR(tanggal_ukur) = $date[0]")->result();
                }
            }else{
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama FROM balita join posyandu on posyandu.id = balita.posyandu_id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id and imunisasi_balita.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama FROM balita join posyandu on posyandu.id = balita.posyandu_id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id")->result();
                }
            }
        }
        
        if(is_numeric($id) && $this->session->userdata('level') == 'bidan'){
            if($dates != null){
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama FROM balita join posyandu on posyandu.id = balita.posyandu_id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where posyandu.id = $id and MONTH(tanggal_ukur) = $date[1] and YEAR(tanggal_ukur) = $date[0] and imunisasi_balita.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama FROM balita join posyandu on posyandu.id = balita.posyandu_id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where posyandu.id = $id and MONTH(tanggal_ukur) = $date[1] and YEAR(tanggal_ukur) = $date[0]")->result();
                }
            }else{
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama FROM balita join posyandu on posyandu.id = balita.posyandu_id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where posyandu.id = $id and imunisasi_balita.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama FROM balita join posyandu on posyandu.id = balita.posyandu_id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where posyandu.id = $id")->result();
                }
            }
        }else if ($this->session->userdata('level') == 'bidan') {
            $bidan_id =  $this->session->userdata('id');
            if($dates != null){
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama from bidan join bidan_posyandu on bidan.id = bidan_posyandu.bidan_id join posyandu on posyandu.id = bidan_posyandu.posyandu_id join balita on balita.posyandu_id = posyandu.id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where bidan.id = $bidan_id and MONTH(tanggal_ukur) = $date[1] and YEAR(tanggal_ukur) = $date[0] and imunisasi_balita.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama from bidan join bidan_posyandu on bidan.id = bidan_posyandu.bidan_id join posyandu on posyandu.id = bidan_posyandu.posyandu_id join balita on balita.posyandu_id = posyandu.id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where bidan.id = $bidan_id and MONTH(tanggal_ukur) = $date[1] and YEAR(tanggal_ukur) = $date[0]")->result();
                }
            }else{
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama from bidan join bidan_posyandu on bidan.id = bidan_posyandu.bidan_id join posyandu on posyandu.id = bidan_posyandu.posyandu_id join balita on balita.posyandu_id = posyandu.id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where bidan.id = $bidan_id and imunisasi_balita.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama from bidan join bidan_posyandu on bidan.id = bidan_posyandu.bidan_id join posyandu on posyandu.id = bidan_posyandu.posyandu_id join balita on balita.posyandu_id = posyandu.id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where bidan.id = $bidan_id")->result();
                }
            }
        }
        
        if(is_numeric($id) && $this->session->userdata('level') == 'kader'){
            if($dates != null){
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama FROM balita join posyandu on posyandu.id = balita.posyandu_id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where posyandu.id = $id and MONTH(tanggal_ukur) = $date[1] and YEAR(tanggal_ukur) = $date[0] and imunisasi_balita.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama FROM balita join posyandu on posyandu.id = balita.posyandu_id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where posyandu.id = $id and MONTH(tanggal_ukur) = $date[1] and YEAR(tanggal_ukur) = $date[0]")->result();
                }
            }else{
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama FROM balita join posyandu on posyandu.id = balita.posyandu_id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where posyandu.id = $id and imunisas_balita.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama FROM balita join posyandu on posyandu.id = balita.posyandu_id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where posyandu.id = $id")->result();
                }
            }
        }else if ($this->session->userdata('level') == 'kader') {
            $posyandu_id =  $this->session->userdata('posyandu_id');
            if($dates != null){
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama from kader join posyandu on posyandu.id = kader.posyandu_id join balita on balita.posyandu_id = posyandu.id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where posyandu.id = $posyandu_id and MONTH(tanggal_ukur) = $date[1] and YEAR(tanggal_ukur) = $date[0] and imunisasi_balita.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama from kader join posyandu on posyandu.id = kader.posyandu_id join balita on balita.posyandu_id = posyandu.id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where posyandu.id = $posyandu_id and MONTH(tanggal_ukur) = $date[1] and YEAR(tanggal_ukur) = $date[0]")->result();
                }
            }else{
                if($imunisasi_id != 0){
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama from kader join posyandu on posyandu.id = kader.posyandu_id join balita on balita.posyandu_id = posyandu.id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where posyandu.id = $posyandu_id and imunisasi_balita.id = $imunisasi_id")->result();
                }else{
                    $barang = $this->db->query("SELECT balita.*, posyandu.nama as posyandu_nama, imunisasi_balita.nama as imunisasi_balita_nama from kader join posyandu on posyandu.id = kader.posyandu_id join balita on balita.posyandu_id = posyandu.id join imunisasi_balita on imunisasi_balita.id = balita.imunisasi_balita_id where posyandu.id = $posyandu_id")->result();
                }
            }
        }
        $no = 1;
        foreach ($barang as $data) {
            $pdf->Cell(5, 6, $no, 1, 0);
            $pdf->Cell(22, 6, $data->nik, 1, 0);
            $pdf->Cell(30, 6, $data->nama, 1, 0);
            $pdf->Cell(5, 6, $data->jenis_kelamin == "Perempuan" ? 'P' : 'L', 1, 0);
            $pdf->Cell(16, 6, $data->tanggal_lahir, 1, 0);
            // $pdf->Cell(17, 6, $data->tanggal_ukur, 1, 0);
            $pdf->Cell(12, 6, $data->umur . ' bulan', 1, 0);
            $pdf->Cell(12, 6, $data->tinggi_badan . ' cm', 1, 0);
            $pdf->Cell(12, 6, $data->cara_ukur, 1, 0);
            $pdf->Cell(10, 6, $data->berat_badan . ' cm', 1, 0);
            $pdf->Cell(10, 6, $data->lingkar_kepala . ' cm', 1, 0);
            $pdf->Cell(10, 6, $data->vitamin_a == 1 ? 'Sudah' : 'Belum', 1, 0);
            $pdf->Cell(15, 6, $data->obat_cacing == 1 ? 'Sudah' : 'Belum', 1, 0);
            $pdf->Cell(20, 6, $data->orangtua, 1, 0);
            $pdf->Cell(17, 6, $data->telepon, 1, 0);
            $pdf->Cell(20, 6, $data->alamat, 1, 0);
            $pdf->Cell(7, 6, $data->rt, 1, 0);
            $pdf->Cell(7, 6, $data->rw, 1, 0);
            $pdf->Cell(25, 6, $data->imunisasi_balita_nama, 1, 0);
            $pdf->Cell(25, 6, $data->posyandu_nama, 1, 1);
            $no++;
        }
        
        if ($this->session->userdata('level') == 'bidan') {
            $pdf->Cell(0, 20, "Mengetahui, Bidan Desa", 0, true, 'R');
            $pdf->Cell(0, 20, $this->session->userdata('nama'), 0, true, 'R');
        }

        $pdf->Output();
    }
}
