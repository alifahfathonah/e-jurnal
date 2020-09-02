<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Petugas extends CI_Model {

	/*
    | -------------------------------------------------------------------------
    | Mengambil Data Login Dari Pembimbing Yang Login
    | -------------------------------------------------------------------------
    | Ketika user login dan role nya adalah pembimbing maka fungsi ini akan-
    | dijalankan.
    */
	public function getPetugasLoginData()
	{
		$petugas=$this->db->get_where('tbl_petugas_monitoring',['user_id' => $this->session->userdata('id_user')])->row_array();
		if ($petugas) {
			$this->session->set_userdata('id_petugas',$petugas['id_petugas_monitoring']);
		}
		return $petugas;
	}	

}

/* End of file M_Petugas.php */
/* Location: ./application/models/Pembimbing/M_Pembimbing.php */