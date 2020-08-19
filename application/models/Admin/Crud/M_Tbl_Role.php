<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tbl_Role extends CI_Model {
 	public function get(){
		return $this->db->get('tbl_role');
	}

	public function insert($data){
		$this->db->insert('tbl_role',$data);
	}

	public function delete($id){
		$this->db->where('id_role',$id)->delete('tbl_role');
	}
	public  function edit(){
		$data = array(
				'id_role' => $this->input->post('id'),
				'nama_role' => $this->input->post('nama'),
				'redirect' => $this->input->post('redirect'),
		);
		$this->db->where('id_role',$data['id_role']);
		$this->db->update('tbl_role',$data);
	}
}
	



/* End of file M_Tbl_Role.php */
/* Location: ./application/models/Admin/Crud/M_Tbl_Role.php */