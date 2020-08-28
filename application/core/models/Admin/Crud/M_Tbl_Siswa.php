<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tbl_Siswa extends CI_Model {

	public function getAllSiswa()
	{
		$all_siswa=$this->db->order_by('nama_siswa','ASC')->get('tbl_siswa')->result_array();
		return $all_siswa;
	}

	//get user untuk memasukan user_id di tabel siswa
	public function getAllUser()
	{
		$all_user=$this->db->order_by('username','ASC')->get('tbl_user')->result_array();
		return $all_user;
	}

	public function getById($id)
	{
		$siswa=$this->db->get_where('tbl_siswa',['id_siswa' => $id])->row_array();
		return $siswa;
	}

	public function tambah($data=[])
	{
		return $this->db->insert('tbl_siswa',$data);
	}

	public function hapus($id)
	{
		return $this->db->where('id_siswa',$id)->delete('tbl_siswa');
	}

	public function update($id,$data=[])
	{
		return $this->db->update('tbl_siswa',$data,['id_siswa' => $id]);
	}

	public function isUserSiswa()
	{
		$tbl_siswa = $this->db->get('tbl_siswa')->result_array();
    	$data=[];
    	foreach ($tbl_siswa as $siswa) {
    		$data[]=$siswa['user_id'];	
    	}
    	
    	if (count($data)>0) {
    		$tbl_user=$this->db->where_not_in('id_user',$data)->where('role_id',4)->order_by('username','ASC')->get('tbl_user')->result_array();	
    	}else{
    		$tbl_user=$this->db->where('role_id',4)->order_by('username','ASC')->get('tbl_user')->result_array();
    	}
    	return $tbl_user;
	}

	public function getAllKelas()
	{
		$all_kelas=$this->db->get('tbl_kelas')->result_array();
		return $all_kelas;
	}

	public function getAllJurusan()
	{
		$all_jurusan=$this->db->get('tbl_jurusan')->result_array();
		return $all_jurusan;
	}

	public function getAllPerusahaan()
	{
		$all_perusahaan=$this->db->get('tbl_perusahaan')->result_array();
		return $all_perusahaan;
	}

}

/* End of file M_Tbl_Siswa.php */
/* Location: ./application/models/Admin/Crud/M_Tbl_Siswa.php */