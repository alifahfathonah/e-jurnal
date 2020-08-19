<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Siswa extends CI_Model {

	public function getSiswaLoginData()
	{
		$siswa=$this->db->get_where('tbl_siswa',['user_id' => $this->session->userdata('id_user')])->row_array();
		return $siswa; 
	}

}

/* End of file M_Siswa.php */
/* Location: ./application/models/Siswa/M_Siswa.php */