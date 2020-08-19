<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {

	public function getUserLoginData()
	{
		$user=$this->db->get_where('tbl_user',['id_user' => $this->session->userdata('id_user')])->row_array();
		return $user;
	}	

}

/* End of file M_User.php */
/* Location: ./application/models/User/M_User.php */