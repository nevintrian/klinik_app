<?php

class M_pasien_pembayaran_indeks extends CI_Model
{
	public $table = 'pasien_pembayaran';
	public $id = 'id';
	public $order = 'DESC';

	public function total_rows()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function get_limit_data($tahun = 0)
	{
		$this->db->select('month(pasien_kunjungan.tanggal) as bulan, year(pasien_kunjungan.tanggal) as year, count(pasien_id) as jumlah_pasien, sum(pasien_pembayaran.total_harga) as total_harga');
		$this->db->join('pasien_pembayaran', 'pasien_kunjungan.id = pasien_pembayaran.pasien_kunjungan_id');
		$this->db->group_by('month(pasien_kunjungan.tanggal)');
		if ($tahun != 0) {
			$this->db->where('year(pasien_kunjungan.tanggal)', $tahun);
		}
		$this->db->order_by('pasien_kunjungan.tanggal', $this->order);
		return $this->db->get('pasien_kunjungan')->result();
		// select month(pasien_kunjungan.tanggal) as bulan, count(pasien_id), sum(pasien_pembayaran.total_harga) from pasien_kunjungan join pasien_pembayaran on pasien_kunjungan.id = pasien_pembayaran.pasien_kunjungan_id group by month(pasien_kunjungan.tanggal);
	}

	function get_limit_data_umum($tahun = 0)
	{
		$this->db->select('month(pasien_kunjungan.tanggal) as bulan, year(pasien_kunjungan.tanggal) as year, count(pasien_id) as jumlah_pasien, sum(pasien_pembayaran.total_harga) as total_harga');
		$this->db->join('pasien_pembayaran', 'pasien_kunjungan.id = pasien_pembayaran.pasien_kunjungan_id');
		$this->db->group_by('month(pasien_kunjungan.tanggal)');
		$this->db->where('pasien_kunjungan.akses_bayar', 'Umum');
		if ($tahun != 0) {
			$this->db->where('year(pasien_kunjungan.tanggal)', $tahun);
		}
		$this->db->order_by('pasien_kunjungan.tanggal', $this->order);
		return $this->db->get('pasien_kunjungan')->result();
	}

	function get_limit_data_sosial($tahun = 0)
	{
		$this->db->select('month(pasien_kunjungan.tanggal) as bulan, year(pasien_kunjungan.tanggal) as year, count(pasien_id) as jumlah_pasien, sum(pasien_pembayaran.total_harga) as total_harga');
		$this->db->join('pasien_pembayaran', 'pasien_kunjungan.id = pasien_pembayaran.pasien_kunjungan_id');
		$this->db->group_by('month(pasien_kunjungan.tanggal)');
		$this->db->where('pasien_kunjungan.akses_bayar', 'Sosial');
		if ($tahun != 0) {
			$this->db->where('year(pasien_kunjungan.tanggal)', $tahun);
		}
		$this->db->order_by('pasien_kunjungan.tanggal', $this->order);
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
