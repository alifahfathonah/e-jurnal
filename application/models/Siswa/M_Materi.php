<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Materi extends CI_Model {

    public function getAllMateri($start,$limit)
    {
        $materi = $this->db->order_by('created_at','DESC')->get('tbl_tugas_siswa',$start,$limit);
        return $materi;
    }

    public function getMateriById($id)
    {
        $materi = $this->db->get_where('tbl_tugas_siswa',['id_tugas'=>$id])->row_array();
        return $materi;
    }

}
