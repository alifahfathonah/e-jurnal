<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kehadiran_Siswa extends CI_Model {

	/*
    | -------------------------------------------------------------------------
    | Mengambil kehadiran semua siswa prakerin hari ini
    | -------------------------------------------------------------------------
    | Siswa prakerin yang sudah mensubmit kehadiran hari ini dan siap
    | dikonfirmasi oleh pembimbing.
    | 
    */
	public function getKehadiranSiswaByThisDay()
	{
		$tanggal_sekarang=date('d-m-Y');

		$kehadiran=$this->db->select('tbl_absensi.*,tbl_keterangan_absensi.*,tbl_siswa.nama_siswa')
						->from('tbl_absensi')
						->join('tbl_keterangan_absensi','tbl_absensi.keterangan_absensi_id=tbl_keterangan_absensi.id_keterangan_absensi')
						->join('tbl_siswa','tbl_absensi.siswa_id=tbl_siswa.id_siswa')
						->where('tbl_absensi.tanggal_absensi',$tanggal_sekarang)
						->order_by('tbl_siswa.nama_siswa','ASC')
						->get()->result_array();
		return $kehadiran;	
	}

	public function countConfirmedKehadiranByThisDay()
	{
		$tanggal_sekarang=date('d-m-Y');
		return $this->db->get_where('tbl_absensi',['tanggal_absensi' => $tanggal_sekarang,'is_active' => 1])->num_rows();
	}	

	public function confirmKehadiranById($id_absensi)
	{
		return $this->db->where('id_absensi',$id_absensi)->update('tbl_absensi',['is_active' => 1]);
	}

	public function confirmAllKehadiranByThisDay()
	{
		$tanggal_sekarang=date('d-m-Y');
		return $this->db->where('tanggal_absensi',$tanggal_sekarang)->update('tbl_absensi',['is_active' => 1]);		
	}
}

/* End of file M_Kehadiran_Siswa.php */
/* Location: ./application/models/Pembimbing/M_Kehadiran_Siswa.php */