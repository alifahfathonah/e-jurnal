<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kegiatan extends CI_Model
{
    public function getAllData()
    {
        $kegiatan = $this->db->get('tbl_kegiatan')->result_array();
        return $kegiatan;
    }
    public function insert($data)
    {
        $this->db->insert('tbl_kegiatan', $data);
    }
}
