<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kehadiran extends CI_Model
{

	public function getSomeBulan($bulan = [])
	{
		$bulan = $this->db->where_in('slug_bulan', $bulan)->get('tbl_bulan')->result_array();
		return $bulan;
	}

	public function getKehadiranBySiswaId()
	{
		$kehadiran = $this->db->select('tbl_absensi.*,tbl_keterangan_absensi.*')
			->from('tbl_absensi')
			->join('tbl_keterangan_absensi', 'tbl_absensi.keterangan_absensi_id=tbl_keterangan_absensi.id_keterangan_absensi')
			->where('tbl_absensi.siswa_id', $this->session->userdata('id_siswa'))
			->like('tanggal_absensi', date('m-Y'))
			->get();
		return $kehadiran;
	}

	public function countKehadiranBySiswaId()
	{
		$kehadiran = $this->getKehadiranBySiswaId()->num_rows();
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