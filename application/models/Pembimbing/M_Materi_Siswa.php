<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Materi_Siswa extends CI_Model {

	public function FunctionName($value='')
	{
		
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

}

/* End of file M_Materi_Siswa.php */
/* Location: ./application/models/Pembimbing/M_Materi_Siswa.php */