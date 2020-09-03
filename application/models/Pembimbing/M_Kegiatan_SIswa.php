<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kegiatan_Siswa extends CI_Model {

	public function getKegiatanSiswaByToday()
	{
		$tanggal_sekarang=date('Y-m-d');

		$kegiatan=$this->db->select('tbl_kegiatan.*,tbl_siswa.nama_siswa')
						->from('tbl_kegiatan')
						->join('tbl_siswa','tbl_kegiatan.siswa_id=tbl_siswa.id_siswa')
						->where('tbl_kegiatan.tanggal',$tanggal_sekarang)
						->order_by('tbl_siswa.nama_siswa','ASC')
						->get()->result_array();
		return $kegiatan;	
	}

	public function countKegiatanSiswaByToday()
	{
		$kegiatan = $this->db->get_where('tbl_kegiatan',['tanggal' => date('Y-m-d')])->num_rows();
		return $kegiatan;
	}

	public function countUnConfirmedKegiatanSiswaByToday()
	{
		$kegiatan = $this->db->get_where('tbl_kegiatan',['tanggal' => date('Y-m-d'),'is_active' => 0])->num_rows();
		return $kegiatan;
	}

	public function confirmKegiatanById($id_kegiatan)
	{
		return $this->db->where('id_kegiatan',$id_kegiatan)->update('tbl_kegiatan',['is_active' => 1]);
	}

	public function confirmAllKegiatanByToday()
	{	
		$today = date('Y-m-d');
		return $this->db->where('tanggal',$today)->update('tbl_kegiatan',['is_active' => 1]);
	}

}

/* End of file M_Kegiatan_Siswa.php */
/* Location: ./application/models/Pembimbing/M_Kegiatan_Siswa.php */