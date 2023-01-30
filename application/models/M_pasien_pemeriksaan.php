<?php

class M_pasien_pemeriksaan extends CI_Model
{
	public $table = 'pasien_pemeriksaan';
	public $id = 'pasien_pemeriksaan.id';
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
		$this->db->where('user.id', $this->session->userdata('id'));
		$this->db->where('pasien_kunjungan.status', 1);
		$this->db->order_by('pasien_kunjungan.id', $this->order);
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

	function delete_by_pasien_kunjungan_id($id)
	{
		$this->db->where('pasien_kunjungan_id', $id);
		$this->db->delete($this->table);
	}

	function update_by_pasien_kunjungan_id($id, $data)
	{
		$this->db->where('pasien_kunjungan_id', $id);
		$this->db->update($this->table, $data);
	}

	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	function insert_diagnosis($diagnosis_data, $id)
	{
		foreach ($diagnosis_data as $diagnosis) {
			$data = [
				'diagnosis_id' => $diagnosis,
				'pasien_pemeriksaan_id' => $id
			];
			$this->db->insert('pasien_pemeriksaan_diagnosis', $data);
		}
	}

	function insert_tindakan($tindakan_data, $id)
	{
		foreach ($tindakan_data as $tindakan) {
			$data = [
				'tindakan_id' => $tindakan,
				'pasien_pemeriksaan_id' => $id
			];
			$this->db->insert('pasien_pemeriksaan_tindakan', $data);
		}
	}
}
