<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Saran extends CI_Model {

	public function insert($data)
	{
		$this->db->insert('tbl_saran',$data);
	}
	
	public function getSaranById($id)
	{
		return $this->db->get_where('tbl_saran',['id_saran' => $id])->row_array();
	}
}