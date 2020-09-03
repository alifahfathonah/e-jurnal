<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kehadiran extends CI_Model
{

	public function getActiveBulan($result_type=NULL)
	{
		$bulan = $this->db->get_where('tbl_bulan',['is_active' => 1]);
		
		switch ($result_type) {
			case 'result_array':
					$result = $bulan->result_array();	
				break;
			case 'row_array':
					$result = $bulan->row_array();	
				break;
			case 'num_rows':
					$result = $bulan->num_rows();
				break;
			default:
					$result = $bulan->result_array();		
				break;
		}

		return $result;
	}

	// public function getKehadiranBySiswaId()
	// {
	// 	$kehadiran = $this->db->select('tbl_absensi.*,tbl_keterangan_absensi.*')
	// 		->from('tbl_absensi')
	// 		->join('tbl_keterangan_absensi', 'tbl_absensi.keterangan_absensi_id=tbl_keterangan_absensi.id_keterangan_absensi')
	// 		->where('tbl_absensi.siswa_id', $this->session->userdata('id_siswa'))
	// 		->like('tanggal_absensi', date('m-Y'))
	// 		->get();
	// 	return $kehadiran;
	// }

	/*
	| -------------------------------------------------------------------------
	| Mengambil kehadiran siswa pada bulan ini
	| -------------------------------------------------------------------------
	| Fungsi ini memiliki 2 parameter,yaitu $id_siswa dari -
	| -(id_siswa di tabel tbl_siswa)
	| dan $bulan_id dari (id_bulan di tabel tbl_bulan).
	*/
	public function getKehadiranBySiswaAndBulanId($siswa_id='',$bulan_id='')
	{
		$kehadiran = $this->db->select('tbl_absensi.*,tbl_keterangan_absensi.*')
			->from('tbl_absensi')
			->join('tbl_keterangan_absensi', 'tbl_absensi.keterangan_absensi_id=tbl_keterangan_absensi.id_keterangan_absensi')
			->where('tbl_absensi.siswa_id',$siswa_id)
			->where('tbl_absensi.bulan_id',$bulan_id)
			->get();
		return $kehadiran;
	}


	/*
	| -------------------------------------------------------------------------
	| Menghitung kehadiran siswa pada bulan ini
	| -------------------------------------------------------------------------
	| Fungsi ini sangat bergantung pada 
	| fungsi getKehadiranBySiswaAndBulanId($siswa_id='',$bulan_id=''){} dengan
	| menambahkan fungsi num_rows() untuk mengembalikan angka
	| 
	*/
	public function countKehadiranBySiswaAndBulanId($siswa_id='',$bulan_id='')
	{
		$kehadiran = $this->getKehadiranBySiswaAndBulanId($siswa_id,$bulan_id)->num_rows();
		return $kehadiran;
	}

	public function getAllKeteranganAbsensi()
	{
		$keterangan = $this->db->get('tbl_keterangan_absensi')->result_array();
		return $keterangan;
	}

	public function insert($data = [])
	{
		return $this->db->insert('tbl_absensi', $data);
	}

	public function isNowAbsensiExists($siswa_id, $tgl)
	{
		$absensi = $this->db->get_where('tbl_absensi', ['siswa_id' => $siswa_id, 'tanggal_absensi' => $tgl]);
		return $absensi;
	}
}

/* End of file M_Kehadiran.php */
/* Location: ./application/models/Siswa/M_Kehadiran.php */