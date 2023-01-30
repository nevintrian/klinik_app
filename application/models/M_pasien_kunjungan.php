<?php

class M_pasien_kunjungan extends CI_Model
{
	public $table = 'pasien_kunjungan';
	public $id = 'pasien_kunjungan.id';
	public $order = 'DESC';

	public function total_rows()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function get_limit_data()
	{
		$this->db->select('pasien_kunjungan.*, pasien.*, poli.nama as poli_nama, user.nama as dokter_nama, dokter.*, pasien_kunjungan.id as pasien_kunjungan_id, pasien_kunjungan.status as pasien_kunjungan_status');
		$this->db->join('pasien', 'pasien.id = pasien_kunjungan.pasien_id');
		$this->db->join('dokter', 'dokter.id = pasien_kunjungan.dokter_id');
		$this->db->join('user', 'user.id = dokter.user_id');
		$this->db->join('poli', 'dokter.poli_id = poli.id');
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	function get_limit_data_id($id)
	{
		$this->db->select('pasien_kunjungan.*, pasien.*, poli.nama as poli_nama, user.nama as dokter_nama, dokter.*, pasien_kunjungan.id as pasien_kunjungan_id, pasien_kunjungan.status as pasien_kunjungan_status');
		$this->db->join('pasien', 'pasien.id = pasien_kunjungan.pasien_id');
		$this->db->join('dokter', 'dokter.id = pasien_kunjungan.dokter_id');
		$this->db->join('user', 'user.id = dokter.user_id');
		$this->db->join('poli', 'dokter.poli_id = poli.id');
		$this->db->where('pasien_kunjungan.id', $id);
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}


	function get_limit_data_onsite()
	{
		$this->db->select('pasien_kunjungan.*, pasien.*, poli.nama as poli_nama, user.nama as dokter_nama, dokter.*, pasien_kunjungan.id as pasien_kunjungan_id, pasien_kunjungan.status as pasien_kunjungan_status');
		$this->db->join('pasien', 'pasien.id = pasien_kunjungan.pasien_id');
		$this->db->join('dokter', 'dokter.id = pasien_kunjungan.dokter_id');
		$this->db->join('user', 'user.id = dokter.user_id');
		$this->db->join('poli', 'dokter.poli_id = poli.id');
		$this->db->where('daftar', 'onsite');
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	function get_limit_data_online()
	{
		$this->db->select('pasien_kunjungan.*, pasien.*, poli.nama as poli_nama, user.nama as dokter_nama, dokter.*, pasien_kunjungan.id as pasien_kunjungan_id, pasien_kunjungan.status as pasien_kunjungan_status');
		$this->db->join('pasien', 'pasien.id = pasien_kunjungan.pasien_id');
		$this->db->join('dokter', 'dokter.id = pasien_kunjungan.dokter_id');
		$this->db->join('user', 'user.id = dokter.user_id');
		$this->db->join('poli', 'dokter.poli_id = poli.id');
		$this->db->where('daftar', 'online');
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
