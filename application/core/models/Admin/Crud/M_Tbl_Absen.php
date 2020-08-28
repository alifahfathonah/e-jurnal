<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Tbl_Absen extends CI_Model
{

    public function get_all()
    {
        return $this->db->query("SELECT tbl_siswa.*,tbl_absensi.*,tbl_keterangan_absensi.* 
                                 FROM tbl_siswa,tbl_absensi,tbl_keterangan_absensi 
                                   WHERE tbl_siswa.id_siswa=tbl_absensi.siswa_id AND tbl_keterangan_absensi.id_keterangan_absensi=tbl_absensi.keterangan_absensi_id ")->result_array();
    }
    public function hapus($id)
    {
        $this->db->delete('tbl_absensi', ['id_absensi' => $id]);
    }
}

/* End of file M_Tbl_Absen.php */
