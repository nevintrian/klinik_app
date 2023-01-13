<?php

class M_ibu extends CI_Model
{
    public $table = 'ibu';
    public $id = 'ibu.id';
    public $order = 'DESC';

    public function total_rows()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function total_rows_kader()
    {
        $this->db->from($this->table);
        $this->db->where('posyandu_id',  $this->session->userdata('posyandu_id'));
        return $this->db->count_all_results();
    }

    function get_limit_data()
    {
        $this->db->select('ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama, posyandu.alamat as posyandu_alamat');
        $this->db->join('posyandu', 'ibu.posyandu_id = posyandu.id');
        $this->db->join('imunisasi_ibu', 'imunisasi_ibu.id = ibu.imunisasi_ibu_id');
        $this->db->order_by('tanggal_daftar', $this->order);
        $this->db->group_by('ibu.nik');
        return $this->db->get($this->table)->result();
    }
    
    function get_limit_data_detail($nik)
    {
        $this->db->select('ibu.*, posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama, posyandu.alamat as posyandu_alamat');
        $this->db->join('posyandu', 'ibu.posyandu_id = posyandu.id');
        $this->db->join('imunisasi_ibu', 'imunisasi_ibu.id = ibu.imunisasi_ibu_id');
        $this->db->where('ibu.nik',  $nik);
        $this->db->order_by('tanggal_daftar', $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_kader()
    {
        $this->db->select('ibu.* , posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama, posyandu.alamat as posyandu_alamat');
        $this->db->join('posyandu', 'ibu.posyandu_id = posyandu.id');
        $this->db->join('imunisasi_ibu', 'imunisasi_ibu.id = ibu.imunisasi_ibu_id');
        $this->db->where('posyandu.id',  $this->session->userdata('posyandu_id'));
        $this->db->order_by('tanggal_daftar', $this->order);
        $this->db->group_by('ibu.nik');
        return $this->db->get($this->table)->result();
    }
    
    function get_limit_data_kader_detail($nik)
    {
        $this->db->select('ibu.* , posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama, posyandu.alamat as posyandu_alamat');
        $this->db->join('posyandu', 'ibu.posyandu_id = posyandu.id');
        $this->db->join('imunisasi_ibu', 'imunisasi_ibu.id = ibu.imunisasi_ibu_id');
        $this->db->where('posyandu.id',  $this->session->userdata('posyandu_id'));
        $this->db->where('ibu.nik',  $nik);
        $this->db->order_by('tanggal_daftar', $this->order);
        return $this->db->get($this->table)->result();
    }
    
    function get_limit_data_bidan()
    {
        $this->db->select('ibu.* , posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama, posyandu.alamat as posyandu_alamat');
        $this->db->join('bidan_posyandu', 'bidan.id = bidan_posyandu.bidan_id');
        $this->db->join('posyandu', 'bidan_posyandu.posyandu_id = posyandu.id');
        $this->db->join('ibu', 'ibu.posyandu_id = posyandu.id');
        $this->db->join('imunisasi_ibu', 'imunisasi_ibu.id = ibu.imunisasi_ibu_id');
        $this->db->where('bidan.id',  $this->session->userdata('id'));
        $this->db->order_by('tanggal_daftar', $this->order);
        $this->db->group_by('ibu.nik');
        return $this->db->get("bidan")->result();
    }
    
    function get_limit_data_bidan_detail($nik)
    {
        $this->db->select('ibu.* , posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama, posyandu.alamat as posyandu_alamat');
        $this->db->join('bidan_posyandu', 'bidan.id = bidan_posyandu.bidan_id');
        $this->db->join('posyandu', 'bidan_posyandu.posyandu_id = posyandu.id');
        $this->db->join('ibu', 'ibu.posyandu_id = posyandu.id');
        $this->db->join('imunisasi_ibu', 'imunisasi_ibu.id = ibu.imunisasi_ibu_id');
        $this->db->where('bidan.id',  $this->session->userdata('id'));
        $this->db->where('ibu.nik',  $nik);
        $this->db->order_by('tanggal_daftar', $this->order);
        return $this->db->get("bidan")->result();
    }


    function get_limit_data_posyandu($id)
    {
        $this->db->select('ibu.* , posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama, posyandu.alamat as posyandu_alamat');
        $this->db->join('posyandu', 'ibu.posyandu_id = posyandu.id');
        $this->db->join('imunisasi_ibu', 'imunisasi_ibu.id = ibu.imunisasi_ibu_id');
        $this->db->where('posyandu.id',  $id);
        $this->db->order_by('tanggal_daftar', $this->order);
        $this->db->group_by('ibu.nik');
        return $this->db->get($this->table)->result();
    }
    
    function get_limit_data_imunisasi($id)
    {
        $this->db->select('ibu.* , posyandu.nama as posyandu_nama, imunisasi_ibu.nama as imunisasi_ibu_nama, posyandu.alamat as posyandu_alamat');
        $this->db->join('posyandu', 'ibu.posyandu_id = posyandu.id');
        $this->db->join('imunisasi_ibu', 'imunisasi_ibu.id = ibu.imunisasi_ibu_id');
        $this->db->where('imunisasi_ibu.id',  $id);
        $this->db->order_by('tanggal_daftar', $this->order);
        $this->db->group_by('ibu.nik');
        return $this->db->get($this->table)->result();
    }


    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
    
    function update_by_nik($nik, $data)
    {
        $this->db->where('nik', $nik);
        $this->db->update($this->table, $data);
    }

    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    
    function delete_by_nik($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->delete($this->table);
    }

    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    function get_by_nik($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->get($this->table)->row();
    }
}
