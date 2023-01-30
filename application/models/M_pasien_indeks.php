<?php

class M_pasien_indeks extends CI_Model
{
	public $table = 'pasien';
	public $id = 'id';
	public $order = 'DESC';

	public function total_rows()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function get_limit_data($date_start = 0, $date_end = 0)
	{
		$this->db->order_by($this->id, $this->order);
		if ($date_start != 0 && $date_end != 0) {
			$this->db->where('pasien.tanggal >=', $date_start);
			$this->db->where('pasien.tanggal <=', $date_end);
		}
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
