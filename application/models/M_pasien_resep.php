<?php

class M_pasien_resep extends CI_Model
{
	public $table = 'pasien_resep';
	public $id = 'id';
	public $order = 'DESC';

	public function total_rows()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function total_rows_menunggu()
	{
		$this->db->select('pasien_resep.* , obat.nama as obat_nama, pasien.nama as pasien_nama, pasien.no_rm as pasien_no_rm, pasien.jk as pasien_jk, pasien_kunjungan.akses_bayar as pasien_akses_bayar, user.nama as dokter_nama, poli.nama as poli_nama');
		$this->db->from('pasien_resep');
		$this->db->join('obat', 'obat.id = pasien_resep.obat_id');
		$this->db->join('pasien_kunjungan', 'pasien_kunjungan.id = pasien_resep.pasien_kunjungan_id');
		$this->db->join('pasien', 'pasien.id = pasien_kunjungan.pasien_id');
		$this->db->join('dokter', 'dokter.id = pasien_kunjungan.dokter_id');
		$this->db->join('user', 'user.id = dokter.user_id');
		$this->db->join('poli', 'dokter.poli_id = poli.id');
		$this->db->where('pasien_kunjungan.status', 2);
		$this->db->group_by('pasien_kunjungan.id');
		$this->db->order_by('pasien_resep.id', $this->order);
		return $this->db->count_all_results();
	}

	public function total_rows_selesai()
	{
		$this->db->select('pasien_resep.* , obat.nama as obat_nama, pasien.nama as pasien_nama, pasien.no_rm as pasien_no_rm, pasien.jk as pasien_jk, pasien_kunjungan.akses_bayar as pasien_akses_bayar, user.nama as dokter_nama, poli.nama as poli_nama');
		$this->db->from('pasien_resep');
		$this->db->join('obat', 'obat.id = pasien_resep.obat_id');
		$this->db->join('pasien_kunjungan', 'pasien_kunjungan.id = pasien_resep.pasien_kunjungan_id');
		$this->db->join('pasien', 'pasien.id = pasien_kunjungan.pasien_id');
		$this->db->join('dokter', 'dokter.id = pasien_kunjungan.dokter_id');
		$this->db->join('poli', 'dokter.poli_id = poli.id');
		$this->db->join('user', 'user.id = dokter.user_id');
		$this->db->where('pasien_kunjungan.status >', 2);
		$this->db->group_by('pasien_kunjungan.id');
		$this->db->order_by($this->id, $this->order);
		return $this->db->count_all_results();
	}

	function get_limit_data()
	{
		$this->db->select('pasien_resep.* , obat.nama as obat_nama, pasien.nama as pasien_nama, pasien.no_rm as pasien_no_rm, pasien.jk as pasien_jk, pasien_kunjungan.akses_bayar as pasien_akses_bayar, user.nama as dokter_nama, poli.nama as poli_nama');
		$this->db->join('obat', 'obat.id = pasien_resep.obat_id');
		$this->db->join('pasien_kunjungan', 'pasien_kunjungan.id = pasien_resep.pasien_kunjungan_id');
		$this->db->join('pasien', 'pasien.id = pasien_kunjungan.pasien_id');
		$this->db->join('dokter', 'dokter.id = pasien_kunjungan.dokter_id');
		$this->db->join('poli', 'dokter.poli_id = poli.id');
		$this->db->join('user', 'user.id = dokter.user_id');
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	function get_limit_data_menunggu()
	{
		$this->db->select('pasien_resep.* , obat.nama as obat_nama, pasien.nama as pasien_nama, pasien.no_rm as pasien_no_rm, pasien.jk as pasien_jk, pasien_kunjungan.akses_bayar as pasien_akses_bayar, user.nama as dokter_nama, poli.nama as poli_nama');
		$this->db->join('obat', 'obat.id = pasien_resep.obat_id');
		$this->db->join('pasien_kunjungan', 'pasien_kunjungan.id = pasien_resep.pasien_kunjungan_id');
		$this->db->join('pasien', 'pasien.id = pasien_kunjungan.pasien_id');
		$this->db->join('dokter', 'dokter.id = pasien_kunjungan.dokter_id');
		$this->db->join('user', 'user.id = dokter.user_id');
		$this->db->join('poli', 'dokter.poli_id = poli.id');
		$this->db->where('pasien_kunjungan.status', 2);
		$this->db->group_by('pasien_kunjungan.id');
		$this->db->order_by('pasien_resep.id', $this->order);
		return $this->db->get($this->table)->result();
	}

	function get_limit_data_selesai()
	{
		$this->db->select('pasien_resep.* , obat.nama as obat_nama, pasien.nama as pasien_nama, pasien.no_rm as pasien_no_rm, pasien.jk as pasien_jk, pasien_kunjungan.akses_bayar as pasien_akses_bayar, user.nama as dokter_nama, poli.nama as poli_nama');
		$this->db->join('obat', 'obat.id = pasien_resep.obat_id');
		$this->db->join('pasien_kunjungan', 'pasien_kunjungan.id = pasien_resep.pasien_kunjungan_id');
		$this->db->join('pasien', 'pasien.id = pasien_kunjungan.pasien_id');
		$this->db->join('dokter', 'dokter.id = pasien_kunjungan.dokter_id');
		$this->db->join('poli', 'dokter.poli_id = poli.id');
		$this->db->join('user', 'user.id = dokter.user_id');
		$this->db->where('pasien_kunjungan.status >', 2);
		$this->db->group_by('pasien_kunjungan.id');
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	function update($id, $data)
	{
		$this->db->where('pasien_kunjungan_id', $id);
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
