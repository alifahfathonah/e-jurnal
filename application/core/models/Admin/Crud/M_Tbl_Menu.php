<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Tbl_Menu extends CI_Model
{

    public function get_all()
    {
        return $this->db->query("SELECT * FROM tbl_menu ")->result_array();
    }

    // public function getSubmenu($menu_id=NULL)
    // {
    //     if ($menu_id) {
    //         $response = $this->db->get_where('tbl_submenu',['menu_id' => $menu_id]);
    //     }else{
    //         $response = $this->db->get('tbl_submenu');
    //     }
    //     return $response->result_array();
    // }

    public function tambah($id)
    {
      return $this->db->insert('tbl_menu',$id);
    }

    public function update($id,$data=[])
    {
      return $this->db->where('id_menu',$id)->update('tbl_menu',$data);
    }

    public function hapus($id)
    {
        $this->db->delete('tbl_menu', ['id_menu' => $id]);
    }
    
}

/* End of file M_Tbl_Absen.php */
