<?php

class M_diagnosis_besar extends CI_Model
{
	public $table = 'diagnosis';
	public $id = 'id';
	public $order = 'DESC';

	public function total_rows()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	function get_limit_data_dashboard()
	{
		$this->db->select('pasien_kunjungan.tanggal, diagnosis.kode, diagnosis.nama, count(diagnosis.nama) as jumlah');
		$this->db->join('pasien_pemeriksaan', 'pasien_kunjungan.id = pasien_pemeriksaan.pasien_kunjungan_id');
		$this->db->join('pasien_pemeriksaan_diagnosis', 'pasien_pemeriksaan.id = pasien_pemeriksaan_diagnosis.pasien_pemeriksaan_id');
		$this->db->join('diagnosis', 'diagnosis.id = pasien_pemeriksaan_diagnosis.diagnosis_id');
		$this->db->group_by(array('diagnosis.nama'));
		$this->db->order_by('jumlah', 'desc');
		return $this->db->get('pasien_kunjungan')->result();
	}

	function get_limit_data($date_start = 0, $date_end = 0)
	{
		$this->db->select('pasien_kunjungan.tanggal, diagnosis.kode, diagnosis.nama, count(diagnosis.nama) as jumlah');
		$this->db->join('pasien_pemeriksaan', 'pasien_kunjungan.id = pasien_pemeriksaan.pasien_kunjungan_id');
		$this->db->join('pasien_pemeriksaan_diagnosis', 'pasien_pemeriksaan.id = pasien_pemeriksaan_diagnosis.pasien_pemeriksaan_id');
		$this->db->join('diagnosis', 'diagnosis.id = pasien_pemeriksaan_diagnosis.diagnosis_id');
		$this->db->group_by(array('pasien_kunjungan.tanggal', 'diagnosis.nama'));
		$this->db->order_by('jumlah', 'desc');
		if ($date_start != 0 && $date_end != 0) {
			$this->db->where('pasien_kunjungan.tanggal >=', $date_start);
			$this->db->where('pasien_kunjungan.tanggal <=', $date_end);
		}
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
