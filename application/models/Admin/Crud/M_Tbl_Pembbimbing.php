<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tbl_Pembbimbing extends CI_Model {
	public function get(){
		$this->db->get('Tbl_Pembimbing');
	}

	public function insert($data){
		$this->db->insert('Tbl_Pembimbing',$data);
	}

	public function delete($id){
		$this->db->delete('id_pembimbing',$id);
		$this->db->where('Tbl_Pembimbing');
	}


}

/* End of file M_Tbl_Pembbimbing.php */
/* Location: ./application/models/Admin/Crud/M_Tbl_Pembbimbing.php */