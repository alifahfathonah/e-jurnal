<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kontak extends CI_Model {

	public function getAllContactSiswa()
	{
		$kontak = $this->db->select('tbl_siswa.*,tbl_kelas.*,tbl_jurusan.*')
		->from('tbl_siswa')
		->join('tbl_kelas','tbl_siswa.kelas_id = tbl_kelas.id_kelas')
		->join('tbl_jurusan','tbl_siswa.jurusan_id = tbl_jurusan.id_jurusan')
		->get()->result_array();
		return $kontak;
	}


	public function getAllContactPembimbing()
	{
		$kontak = $this->db->select('tbl_pembimbing.*,tbl_perusahaan.*')
		->from('tbl_pembimbing')
		->join('tbl_perusahaan','tbl_pembimbing.perusahaan_id = tbl_perusahaan.id_perusahaan')
		->get()->result_array();
		return $kontak;
	}

	public function getAllContactPetugas()
	{
		$kontak = $this->db->get('tbl_petugas_monitoring')->result_array();
		return $kontak;
	}

	public function countContactByTable($table='')
	{
		$contact = $this->db->get($table)->num_rows();
		return $contact;
	}




}
