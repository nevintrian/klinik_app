<?php

class M_bidan extends CI_Model
{
    public $table = 'bidan';
    public $id = 'id';
    public $order = 'DESC';

    public function total_rows()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_limit_data()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    
    
	function get_posyandu_by_bidan($id){
		$this->db->select('posyandu_id, posyandu.nama as posyandu_nama, posyandu_id as id, posyandu.nama as nama');
		$this->db->from('posyandu');
		$this->db->join('bidan_posyandu', 'posyandu.id=bidan_posyandu.posyandu_id');
		$this->db->join('bidan', 'bidan_posyandu.bidan_id=bidan.id');
		$this->db->where('bidan.id', $id);
		return $this->db->get()->result();
	}
	
	function delete_bidan_posyandu($id){
	    $this->db->where('bidan_id', $id);
        $this->db->delete('bidan_posyandu');
	}

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    
    function insert_posyandu($posyandu_data, $id)
    {
        foreach($posyandu_data as $posyandu){
            $data = [
                'bidan_id' => $id,
                'posyandu_id' => $posyandu
            ];
           $this->db->insert('bidan_posyandu', $data);
        }
    }

    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
}
