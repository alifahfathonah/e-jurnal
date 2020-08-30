<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pembimbing extends CI_Model {

	/*
    | -------------------------------------------------------------------------
    | Mengambil Data Login Dari Pembimbing Yang Login
    | -------------------------------------------------------------------------
    | Ketika user login dan role nya adalah pembimbing maka fungsi ini akan-
    | dijalankan.
    */
	public function getPembimbingLoginData()
	{
		$pembimbing=$this->db->get_where('tbl_pembimbing',['user_id' => $this->session->userdata('id_user')])->row_array();
		if ($pembimbing) {
			$this->session->set_userdata('id_pembimbing',$pembimbing['id_pembimbing']);
		}
		return $pembimbing;
	}	

}

/* End of file M_Pembimbing.php */
/* Location: ./application/models/Pembimbing/M_Pembimbing.php */