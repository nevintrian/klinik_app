<?php

class M_pasien_daftar extends CI_Model
{
	public $table = 'pasien';
	public $id = 'id';
	public $order = 'DESC';

	public function total_rows()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function total_rows_this_month()
	{
		$this->db->from($this->table);
		$this->db->join('pasien_kunjungan', 'pasien_kunjungan.pasien_id = pasien.id');
		$this->db->where('MONTH(tanggal)', date('m'));
		return $this->db->count_all_results();
	}

	public function total_rows_today()
	{
		$this->db->from($this->table);
		$this->db->join('pasien_kunjungan', 'pasien_kunjungan.pasien_id = pasien.id');
		$this->db->where('tanggal', date('Y-m-d'));
		return $this->db->count_all_results();
	}

	public function total_rows_antri()
	{
		$this->db->from($this->table);
		$this->db->join('pasien_kunjungan', 'pasien_kunjungan.pasien_id = pasien.id');
		$this->db->where('pasien_kunjungan.status', 0);
		return $this->db->count_all_results();
	}

	public function total_rows_pasien_bpjs()
	{
		$this->db->from($this->table);
		$this->db->join('pasien_kunjungan', 'pasien_kunjungan.pasien_id = pasien.id');
		$this->db->where('pasien_kunjungan.akses_bayar', 'BPJS');
		return $this->db->count_all_results();
	}

	public function total_rows_pasien_sosial()
	{
		$this->db->from($this->table);
		$this->db->join('pasien_kunjungan', 'pasien_kunjungan.pasien_id = pasien.id');
		$this->db->where('pasien_kunjungan.akses_bayar', 'Sosial');
		return $this->db->count_all_results();
	}

	public function total_rows_pasien_umum()
	{
		$this->db->from($this->table);
		$this->db->join('pasien_kunjungan', 'pasien_kunjungan.pasien_id = pasien.id');
		$this->db->where('pasien_kunjungan.akses_bayar', 'Umum');
		return $this->db->count_all_results();
	}

	function get_limit_data()
	{
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	function get_limit_pasien_row()
	{
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->row();
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
