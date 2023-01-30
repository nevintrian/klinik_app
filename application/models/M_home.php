<?php

class M_home extends CI_Model
{
	public $table = 'pasien_kunjungan';
	public $id = 'pasien_kunjungan.id';
	public $order = 'DESC';

	public function total_rows()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function get_antrian_pasien_sekarang($poli)
	{
		$this->db->select('pasien_kunjungan.*, poli.nama as poli_nama, poli.status as poli_status');
		$this->db->join('dokter', 'dokter.id = pasien_kunjungan.dokter_id');
		$this->db->join('poli', 'dokter.poli_id = poli.id');
		$this->db->where('pasien_kunjungan.tanggal', date('Y-m-d'));
		$this->db->where('poli.id', $poli);
		$this->db->where("pasien_kunjungan.status", 0);
		$this->db->order_by('pasien_kunjungan.no_antrian', 'asc');
		return $this->db->get($this->table)->row();
	}

	function get_antrian_pasien_total($poli)
	{
		$this->db->select('pasien_kunjungan.*, poli.nama as poli_nama, poli.status as poli_status');
		$this->db->join('dokter', 'dokter.id = pasien_kunjungan.dokter_id');
		$this->db->join('poli', 'dokter.poli_id = poli.id');
		$this->db->where('pasien_kunjungan.tanggal', date('Y-m-d'));
		$this->db->where('poli.id', $poli);
		$this->db->where("pasien_kunjungan.status", 0);
		$this->db->order_by('pasien_kunjungan.no_antrian', $this->order);
		return $this->db->get($this->table)->row();
	}

	function get_poli($poli)
	{
		$this->db->select('poli.id as poli_id, poli.nama as poli_nama, poli.status as poli_status');
		$this->db->where('poli.id', $poli);
		return $this->db->get('poli')->row();
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
