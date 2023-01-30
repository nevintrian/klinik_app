<?php

class M_obat extends CI_Model
{
	public $table = 'obat';
	public $id = 'id';
	public $order = 'DESC';

	public function total_rows()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function get_limit_data()
	{
		$this->db->select('obat.* , obat_kategori.nama as obat_kategori_nama, obat_satuan.nama as obat_satuan_nama');
		$this->db->join('obat_kategori', 'obat_kategori.id = obat.obat_kategori_id');
		$this->db->join('obat_satuan', 'obat_satuan.id = obat.obat_satuan_id');
		$this->db->order_by($this->id, $this->order);
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
