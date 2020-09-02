<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Saran extends CI_Model
{

    public function getSaranBySiswaId()
    {
        $id_siswa = $this->session->userdata('id_siswa');
        return $this->db->get_where('tbl_saran', ['siswa_id' => $id_siswa])->row_array();
    }

    public function getSaranByPetugasId()
    {
        $petugas_id = $this->getSaranBySiswaId()['petugas_id'];
        return $this->db->get_where('tbl_petugas_monitoring', ['id_petugas_monitoring' => $petugas_id])->row_array();
    }
}

/* End of file M_Sarana.php */
