<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Chat_Group extends CI_Model {

	public function allMessage($id_tugas)
	{
		return $this->db->select('tbl_chat.*,tbl_user.username')->from('tbl_chat')
					->join('tbl_user','tbl_chat.user_id=tbl_user.id_user')->where('tbl_chat.tugas_siswa_id',$id_tugas)->order_by('tbl_chat.created_at','ASC')->get()->result_array();
	}

	// public function allMessage()
	// {
	// 	return $this->db->select('tbl_chat.*,tbl_user.username')->from('tbl_chat')
	// 				->join('tbl_user','tbl_chat.user_id=tbl_user.id_user')->order_by('tbl_chat.created_at','ASC')->get()->result_array();
	// }

	public function sendMessage($data=[])
	{
		return $this->db->insert('tbl_chat',$data);
	}	

}

/* End of file M_Chat_Group.php */
/* Location: ./application/models/User/Chat/M_Chat_Group.php */