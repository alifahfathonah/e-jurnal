<?php 
class M_Monitoring extends CI_Model
{
	
	public function get_all()
	{
		return $this->db->get('tbl_siswa');
	}
	
	public function getKehadiranById($id=NULL)
	{
		return $this->db->get('tbl_bulan');
	}

	public function getDataById($id){
		return $this->db->get_where('tbl_siswa',['id_siswa' => $id]);
	}

}