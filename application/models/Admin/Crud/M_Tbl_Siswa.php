<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tbl_Siswa extends CI_Model {

	public function getAll()
	{
		return $this->db->order_by('nama_siswa','ASC')->get('tbl_siswa')->result_array();
	}

	//get user untuk memasukan user_id di tabel siswa
	public function getUserAll()
	{
		return $this->db->order_by('username','ASC')->get('tbl_user')->result_array();
	}

	public function getById($id)
	{
		return $this->db->get_where('tbl_siswa',['id_siswa' => $id])->row_array();
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
    		$tbl_user=$this->db->where_not_in('id_user',$data)->where('role_id',3)->order_by('username','ASC')->get('tbl_user')->result_array();	
    	}else{
    		$tbl_user=$this->db->where('role_id',3)->order_by('username','ASC')->get('tbl_user')->result_array();
    	}
    	return $tbl_user;
	}

}

/* End of file M_Tbl_Siswa.php */
/* Location: ./application/models/Admin/Crud/M_Tbl_Siswa.php */