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

	public function getKehadiranSiswaByIdGrupAbsensi($bulan_id=NULL,$id_grup_absensi=NULL)
	{
		$kehadiran = $this->db->select('tbl_absensi.*,tbl_keterangan_absensi.*,tbl_siswa.nama_siswa')
						  ->from('tbl_absensi')
						  ->join('tbl_keterangan_absensi','tbl_absensi.keterangan_absensi_id=tbl_keterangan_absensi.id_keterangan_absensi')
						  ->join('tbl_siswa','tbl_absensi.siswa_id=tbl_siswa.id_siswa')
						  ->where('tbl_absensi.bulan_id',$bulan_id)
						  ->where('tbl_absensi.id_grup_absensi',$id_grup_absensi)
						  ->get();

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

	public function getKehadiranSiswaByThisMonth($id_bulan)
	{
		$kehadiran = $this->db->get_where('tbl_absensi',['bulan_id' => $id_bulan])->result_array();
		return $kehadiran;
	}

	public function getAllBulan($result_type=NULL)
	{
		$bulan = $this->db->get('tbl_bulan');
		switch ($result_type) {
			case 'result_array':
					$result = $bulan->result_array();	
				break;
			case 'num_rows':
					$result = $bulan->num_rows();
				break;
			default:
					$result = $bulan->result_array();		
				break;
		}

		return $result;
	}

	public function getBulanById($id_bulan)
	{
		$bulan = $this->db->get_where('tbl_bulan',['id_bulan' => $id_bulan])->row_array();
		return $bulan;
	}

	public function getActiveBulan($result_type=NULL)
	{
		$bulan = $this->db->get_where('tbl_bulan',['is_active' => 1]);
		
		switch ($result_type) {
			case 'result_array':
					$result = $bulan->result_array();	
				break;
			case 'row_array':
					$result = $bulan->row_array();	
				break;
			case 'num_rows':
					$result = $bulan->num_rows();
				break;
			default:
					$result = $bulan->result_array();		
				break;
		}

		return $result;
	}

	public function getBulanSekarang()
	{
		$bulan_sekarang = date('m');
		$bulan = $this->db->get_where('tbl_bulan',['no_bulan' => $bulan_sekarang])->row_array();
		return $bulan;
	}

	public function getNonActiveBulan($result_type=NULL)
	{
		$bulan = $this->db->get_where('tbl_bulan',['is_active' => 0]);
		
		switch ($result_type) {
			case 'result_array':
					$result = $bulan->result_array();	
				break;
			case 'row_array':
					$result = $bulan->row_array();	
				break;
			case 'num_rows':
					$result = $bulan->num_rows();
				break;
			default:
					$result = $bulan->result_array();		
				break;
		}

		return $result;
	}

	public function update($data=[],$id_bulan)
	{
		return $this->db->where('id_bulan',$id_bulan)->update('tbl_bulan',$data);
	}

}

/* End of file M_Kehadiran_Siswa.php */
/* Location: ./application/models/Pembimbing/M_Kehadiran_Siswa.php */