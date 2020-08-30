<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {

	/*
    | -------------------------------------------------------------------------
    | Mengambil Data Login Dari User Yang Login
    | -------------------------------------------------------------------------
    */
	public function getUserLoginData()
	{
		$user=$this->db->get_where('tbl_user',['id_user' => $this->session->userdata('id_user')])->row_array();
		return $user;
	}

	public function update($id_user,$data=[])
	{
		$this->db->where('id_user',$id_user)->update('tbl_user',$data);
	}	

}

/* End of file M_User.php */
/* Location: ./application/models/User/M_User.php */