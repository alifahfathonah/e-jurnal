<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tugas_Siswa extends CI_Model {

	public function getTugasSiswaByPembimbingId()
	{
		$tugas=$this->db->order_by('created_at','DESC')->get_where('tbl_tugas_siswa',['pembimbing_id' => $this->session->userdata('id_pembimbing')]);
		return $tugas;
	}

	public function getTugasById($id)
	{
		$tugas=$this->db->get_where('tbl_tugas_siswa',['id_tugas' => $id])->row_array();
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

/* End of file M_Tugas_Siswa.php */
/* Location: ./application/models/Pembimbing/M_Tugas_Siswa.php */