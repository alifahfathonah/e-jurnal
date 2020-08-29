<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Materi_Siswa extends CI_Model {

	public function getTugasSiswaByPembimbingId()
	{
		$tugas=$this->db->order_by('created_at','DESC')->get_where('tbl_tugas_siswa',['pembimbing_id' => $this->session->userdata('id_pembimbing')]);
		return $tugas;
	}

	public function getAllTipeTugasSiswa()
	{
		$tipe_tugas=$this->db->get('tbl_tipe_tugas_siswa')->result_array();
		return $tipe_tugas;
	}

	public function insert($table,$data=[])
	{
		return $this->db->insert($table,$data);
	}

	public function delete($id)
	{
		$this->db->where('id_tugas',$id)->delete('tbl_tugas_siswa');
	}	

}

/* End of file M_Materi_Siswa.php */
/* Location: ./application/models/Pembimbing/M_Materi_Siswa.php */