<?php

class M_dokter_indeks extends CI_Model
{
	public $table = 'pasien';
	public $id = 'id';
	public $order = 'DESC';

	public function total_rows()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function get_limit_data($dokter_id = 0, $date_start = 0, $date_end = 0)
	{
		$this->db->select('pasien.*, pasien_kunjungan.*, user.nama as dokter_nama, poli.nama as poli_nama');
		$this->db->join('pasien_kunjungan', ' pasien.id = pasien_kunjungan.pasien_id');
		$this->db->join('dokter', 'pasien_kunjungan.dokter_id = dokter.id');
		$this->db->join('user', 'user.id = dokter.user_id');
		$this->db->join('poli', 'poli.id = dokter.poli_id');
		$this->db->where('pasien_kunjungan.status >', 1);
		if ($this->session->userdata('jabatan') == 'Dokter') {
			$this->db->where('user.id', $this->session->userdata('id'));
		} else if ($dokter_id != 0) {
			$this->db->where('dokter.id', $dokter_id);
		}
		if ($date_start != 0 && $date_end != 0) {
			$this->db->where('pasien_kunjungan.tanggal >=', $date_start);
			$this->db->where('pasien_kunjungan.tanggal <=', $date_end);
		}
		$this->db->order_by('pasien.id', $this->order);
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
