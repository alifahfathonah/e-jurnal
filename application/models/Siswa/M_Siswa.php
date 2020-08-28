<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Siswa extends CI_Model {

	public function getSiswaLoginData()
	{
		$siswa=$this->db->get_where('tbl_siswa',['user_id' => $this->session->userdata('id_user')])->row_array();
		if ($siswa) {
			$this->session->set_userdata(['id_siswa' => $siswa['id_siswa']]);
			return $siswa; 
		}else{
			return FALSE;
		}
	}

	public function getSiswaLengkapData()
	{
		$siswa=$this->db->select('tbl_siswa.*,tbl_jurusan.nama_jurusan,tbl_kelas.nama_kelas')
					->from('tbl_siswa')
					->join('tbl_jurusan','tbl_siswa.jurusan_id=tbl_jurusan.id_jurusan')
					->join('tbl_kelas','tbl_siswa.kelas_id=tbl_kelas.id_kelas')->get()->row_array();
	}

	public function isThisSiswaExists()
	{
		$siswa=$this->getSiswaLoginData();
		return $siswa;
	}

	public function getAllKelas()
	{
		$kelas=$this->db->get('tbl_kelas')->result_array();
		return $kelas;	
	}

	public function getAllJurusan()
	{
		$jurusan=$this->db->get('tbl_jurusan')->result_array();
		return $jurusan;
	}

	public function store($table,$data=[])
	{
		return $this->db->insert($table,$data);
	}

}

/* End of file M_Siswa.php */
/* Location: ./application/models/Siswa/M_Siswa.php */