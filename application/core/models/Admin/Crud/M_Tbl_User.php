<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tbl_User extends CI_Model {

	public function getAll()
	{
		return $this->db->order_by('username','ASC')->get('tbl_user')->result_array();
	}

	//get user untuk memasukan user_id di tabel siswa
	public function getAllRole()
	{
		return $this->db->order_by('id_role','ASC')->get('tbl_role')->result_array();
	}

	public function getById($id='')
	{
		return $this->db->get_where('tbl_user',['id_user' => $id])->row_array();
	}

	public function tambah($data=[])
	{
		return $this->db->insert('tbl_user',$data);
	}

	public function hapus($id='')
	{
		return $this->db->where('id_user',$id)->delete('tbl_user');
	}

	public function update($id='',$data=[])
	{
		return $this->db->update('tbl_user',$data,['id_user' => $id]);
	}

}

/* End of file M_Tbl_User.php */
/* Location: ./application/models/Admin/Crud/M_Tbl_User.php */