<?php

class M_obat_indeks extends CI_Model
{
	public $table = 'obat';
	public $id = 'id';
	public $order = 'DESC';

	public function total_rows()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function get_limit_data($obat_id = 0, $date_start = 0, $date_end = 0)
	{
		$this->db->select('pasien_resep.*, obat.nama as obat_nama, obat_satuan.nama as obat_satuan_nama, sum(pasien_resep.jumlah) as obat_jumlah');
		$this->db->join('pasien_kunjungan', 'pasien.id = pasien_kunjungan.pasien_id');
		$this->db->join('pasien_resep', 'pasien_resep.pasien_kunjungan_id = pasien_kunjungan.id');
		$this->db->join('obat', 'obat.id = pasien_resep.obat_id');
		$this->db->join('obat_satuan', 'obat_satuan.id = obat.obat_satuan_id');
		$this->db->group_by(array('pasien_resep.tanggal', 'pasien_resep.obat_id'));
		if ($obat_id != 0) {
			$this->db->where('obat.id', $obat_id);
		}
		if ($date_start != 0 && $date_end != 0) {
			$this->db->where('pasien_resep.tanggal >=', $date_start);
			$this->db->where('pasien_resep.tanggal <=', $date_end);
		}
		$this->db->order_by('pasien.id', $this->order);
		return $this->db->get('pasien')->result();
	}

	function get_limit_data_umum($obat_id = 0, $date_start = 0, $date_end = 0)
	{
		$this->db->select('pasien_resep.*, obat.nama as obat_nama, obat_satuan.nama as obat_satuan_nama, sum(pasien_resep.jumlah) as obat_jumlah');
		$this->db->join('pasien_kunjungan', 'pasien.id = pasien_kunjungan.pasien_id');
		$this->db->join('pasien_resep', 'pasien_resep.pasien_kunjungan_id = pasien_kunjungan.id');
		$this->db->join('obat', 'obat.id = pasien_resep.obat_id');
		$this->db->join('obat_satuan', 'obat_satuan.id = obat.obat_satuan_id');
		$this->db->group_by(array('pasien_resep.tanggal', 'pasien_resep.obat_id'));
		$this->db->where('pasien_kunjungan.akses_bayar', 'Umum');
		if ($obat_id != 0) {
			$this->db->where('obat.id', $obat_id);
		}
		if ($date_start != 0 && $date_end != 0) {
			$this->db->where('pasien_resep.tanggal >=', $date_start);
			$this->db->where('pasien_resep.tanggal <=', $date_end);
		}
		$this->db->order_by('pasien.id', $this->order);
		return $this->db->get('pasien')->result();
	}


	function get_limit_data_bpjs($obat_id = 0, $date_start = 0, $date_end = 0)
	{
		$this->db->select('pasien_resep.*, obat.nama as obat_nama, obat_satuan.nama as obat_satuan_nama, sum(pasien_resep.jumlah) as obat_jumlah');
		$this->db->join('pasien_kunjungan', 'pasien.id = pasien_kunjungan.pasien_id');
		$this->db->join('pasien_resep', 'pasien_resep.pasien_kunjungan_id = pasien_kunjungan.id');
		$this->db->join('obat', 'obat.id = pasien_resep.obat_id');
		$this->db->join('obat_satuan', 'obat_satuan.id = obat.obat_satuan_id');
		$this->db->group_by(array('pasien_resep.tanggal', 'pasien_resep.obat_id'));
		$this->db->where('pasien_kunjungan.akses_bayar', 'BPJS');
		if ($obat_id != 0) {
			$this->db->where('obat.id', $obat_id);
		}
		if ($date_start != 0 && $date_end != 0) {
			$this->db->where('pasien_resep.tanggal >=', $date_start);
			$this->db->where('pasien_resep.tanggal <=', $date_end);
		}
		$this->db->order_by('pasien.id', $this->order);
		return $this->db->get('pasien')->result();
	}

	function get_limit_data_sosial($obat_id = 0, $date_start = 0, $date_end = 0)
	{
		$this->db->select('pasien_resep.*, obat.nama as obat_nama, obat_satuan.nama as obat_satuan_nama, sum(pasien_resep.jumlah) as obat_jumlah');
		$this->db->join('pasien_kunjungan', 'pasien.id = pasien_kunjungan.pasien_id');
		$this->db->join('pasien_resep', 'pasien_resep.pasien_kunjungan_id = pasien_kunjungan.id');
		$this->db->join('obat', 'obat.id = pasien_resep.obat_id');
		$this->db->join('obat_satuan', 'obat_satuan.id = obat.obat_satuan_id');
		$this->db->group_by(array('pasien_resep.tanggal', 'pasien_resep.obat_id'));
		$this->db->where('pasien_kunjungan.akses_bayar', 'Sosial');
		if ($obat_id != 0) {
			$this->db->where('obat.id', $obat_id);
		}
		if ($date_start != 0 && $date_end != 0) {
			$this->db->where('pasien_resep.tanggal >=', $date_start);
			$this->db->where('pasien_resep.tanggal <=', $date_end);
		}
		$this->db->order_by('pasien.id', $this->order);
		return $this->db->get('pasien')->result();
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
