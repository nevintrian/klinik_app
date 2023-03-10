<?php

class M_pasien_pembayaran extends CI_Model
{
	public $table = 'pasien_pembayaran';
	public $id = 'id';
	public $order = 'DESC';

	public function total_rows()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function get_limit_data()
	{
		$this->db->select('pasien.*, poli.nama as poli_nama, pasien_kunjungan.akses_bayar as pasien_kunjungan_akses_bayar, pasien_kunjungan.id as pasien_kunjungan_id, pasien_kunjungan.status as pasien_kunjungan_status, user.nama as dokter_nama, pasien_pembayaran.total_harga as total_harga, pasien_pembayaran.id as pasien_pembayaran_id');
		$this->db->join('pasien', 'pasien.id = pasien_kunjungan.pasien_id');
		$this->db->join('dokter', 'pasien_kunjungan.dokter_id = dokter.id');
		$this->db->join('user', 'dokter.user_id = user.id');
		$this->db->join('poli', 'dokter.poli_id = poli.id');
		$this->db->join('pasien_pembayaran', 'pasien_pembayaran.pasien_kunjungan_id = pasien_kunjungan.id');
		$this->db->where('pasien_kunjungan.status >', 0);
		$this->db->where('pasien_kunjungan.tanggal', date('Y-m-d'));
		$this->db->order_by($this->id, $this->order);
		return $this->db->get('pasien_kunjungan')->result();
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
