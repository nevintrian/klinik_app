<?php

class M_dokter extends CI_Model
{
	public $table = 'dokter';
	public $id = 'id';
	public $order = 'DESC';

	public function total_rows()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function get_limit_data()
	{
		$this->db->select('user.*, dokter.*, poli.nama as poli_nama');
		$this->db->join('user', 'user.id = dokter.user_id');
		$this->db->join('poli', 'dokter.poli_id = poli.id');
		$this->db->order_by('user.id', $this->order);
		return $this->db->get($this->table)->result();
	}

	function get_limit_data_dokter()
	{
		// select user.*, dokter.*, poli.nama as poli_nama, count(case when pasien_kunjungan.tanggal='2023-02-03' then pasien_kunjungan.id end) as kuota from dokter join user on user.id = dokter.user_id join poli on dokter.poli_id = poli.id join pasien_kunjungan on dokter.id = pasien_kunjungan.dokter_id group by dokter.id order by dokter.id desc;

		$this->db->select("user.*, dokter.*, poli.nama as poli_nama, count(case when pasien_kunjungan.tanggal=CURDATE() then pasien_kunjungan.id end) as kuota");
		$this->db->join('user', 'user.id = dokter.user_id');
		$this->db->join('poli', 'dokter.poli_id = poli.id');
		$this->db->join('pasien_kunjungan', 'dokter.id = pasien_kunjungan.dokter_id');
		$this->db->group_by('dokter.id');
		$this->db->order_by('dokter.id', $this->order);
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
