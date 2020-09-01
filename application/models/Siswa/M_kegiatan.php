<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kegiatan extends CI_Model
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

    public function getKegiatanById($id)
    {
        $kegiatan= $this->db->get_where('tbl_kegiatan',['id_kegiatan'=>$id])->row_array();
        return $kegiatan;
    }

    public function edit()
    {
        $data = array(
            'tanggal' => $this->input->post('tanggal'),
            'uraian_kegiatan' => $this->input->post('uraian_kegiatan')
        );
        $this->db->where('id_kegiatan',$this->input->post('id'));
		$this->db->update('tbl_kegiatan',$data);
    }

}
