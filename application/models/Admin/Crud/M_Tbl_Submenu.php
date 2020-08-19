<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tbl_Submenu extends CI_Model {

	public function getAll()
	{
		return $this->db->order_by('nama_submenu','ASC')->get('tbl_submenu')->result_array();
	}

	public function getAllRole()
	{
		return $this->db->order_by('id_role','ASC')->get('tbl_role')->result_array();
	}

	public function getAllMenu()
	{
		return $this->db->order_by('id_menu','ASC')->get('tbl_menu')->result_array();
	}

	public function getById($id)
	{
		return $this->db->get_where('tbl_submenu',['id_submenu' => $id])->row_array();
	}

	public function tambah($data=[])
	{
		return $this->db->insert('tbl_submenu',$data);
	}

	public function hapus($id)
	{
		return $this->db->where('id_submenu',$id)->delete('tbl_submenu');
	}

	public function update($id,$data=[])
	{
		return $this->db->update('tbl_submenu',$data,['id_submenu' => $id]);
	}

	public function isUserSiswa()
	{
		$tbl_submenu = $this->db->get('tbl_submenu')->result_array();
    	$data=[];
    	foreach ($tbl_submenu as $siswa) {
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

/* End of file M_Tbl_Submenu.php */
/* Location: ./application/models/Admin/Crud/M_Tbl_Submenu.php */