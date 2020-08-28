<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kehadiran extends CI_Model {

	public function getSomeBulan($bulan=[])
	{
		$bulan=$this->db->where_in('slug_bulan',$bulan)->get('tbl_bulan')->result_array();
		return $bulan;
	}

	public function getKehadiranBySiswaId()
	{
		$kehadiran=$this->db->select('tbl_absensi.*,tbl_keterangan_absensi.*')
		->from('tbl_absensi')
		->join('tbl_keterangan_absensi','tbl_absensi.keterangan_absensi_id=tbl_keterangan_absensi.id_keterangan_absensi')
		->where('tbl_absensi.siswa_id',$this->session->userdata('id_siswa'))
		->like('tanggal_absensi',date('m-Y'))
		->get();
		return $kehadiran;
	}

	public function getAllKehadiran($limit,$start)
	{
		return $this->db->get('tbl_absensi',$limit,$start)->result_array();
	}

	public function countKehadiranBySiswaId()
	{
		$kehadiran=$this->getKehadiranBySiswaId()->num_rows();
		return $kehadiran;
	}	

}

/* End of file M_Kehadiran.php */
/* Location: ./application/models/Siswa/M_Kehadiran.php */