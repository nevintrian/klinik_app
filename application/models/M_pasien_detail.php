<?php

class M_pasien_detail extends CI_Model
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
		$this->db->where('MONTH(pasien_kunjungan.tanggal)', date('m'));
		return $this->db->count_all_results();
	}

	public function total_rows_today()
	{
		$this->db->from($this->table);
		$this->db->join('pasien_kunjungan', 'pasien_kunjungan.pasien_id = pasien.id');
		$this->db->where('pasien_kunjungan.tanggal', date('Y-m-d'));
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

	function get_limit_data_pasien_kunjungan($id)
	{
		$this->db->select('pasien_kunjungan.*, pasien.*, poli.nama as poli_nama, user.nama as dokter_nama, dokter.*, pasien_kunjungan.id as pasien_kunjungan_id, pasien_kunjungan.status as pasien_kunjungan_status, pasien_pemeriksaan.suhu, pasien_pemeriksaan.td, pasien_pemeriksaan.ra, , pasien_pemeriksaan.rpd');
		$this->db->join('pasien', 'pasien.id = pasien_kunjungan.pasien_id');
		$this->db->join('pasien_pemeriksaan', 'pasien_pemeriksaan.pasien_kunjungan_id = pasien_kunjungan.id');
		$this->db->join('dokter', 'dokter.id = pasien_kunjungan.dokter_id');
		$this->db->join('user', 'user.id = dokter.user_id');
		$this->db->join('poli', 'dokter.poli_id = poli.id');
		$this->db->where('pasien.id', $id);
		$this->db->order_by('pasien_kunjungan.id', $this->order);
		return $this->db->get('pasien_kunjungan')->result();
	}

	function get_limit_data_pasien($id)
	{
		$this->db->select('*');
		$this->db->where('pasien.id', $id);
		$this->db->order_by('pasien.id', $this->order);
		return $this->db->get('pasien')->row();
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
