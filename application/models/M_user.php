<?php

class M_user extends CI_Model
{
	public $table = 'user';
	public $id = 'id';
	public $order = 'DESC';

	public function total_rows()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function get_kepala_klinik()
	{
		$this->db->where('jabatan', 'Kepala Klinik');
		return $this->db->get($this->table)->row();
	}

	function get_limit_data()
	{
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	function get_limit_data_dokter()
	{
		$this->db->order_by($this->id, $this->order);
		$this->db->where('jabatan', 'Dokter');
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
