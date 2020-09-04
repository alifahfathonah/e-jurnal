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

    public function searchMateri($keyword,$limit=NULL,$start=NULL)
    {
        $result = $this->db->like('judul_tugas_siswa',$keyword)
                        ->or_like('deskripsi_tugas',$keyword)
                        ->or_like('tanggal_tugas_siswa',$keyword)
                        ->get('tbl_tugas_siswa',$limit,$start);
        return $result;
    }

}
