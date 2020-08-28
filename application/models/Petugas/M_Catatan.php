<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Catatan extends CI_Model {

		 public function getAll()
		{
			$catatan = $this->db->select('tbl_catatan_monitoring.*,tbl_petugas_monitoring')
								->form('tbl_catatan_monitoring')
								->join('tbl_petugas_monitoring','tbl_catatan_monitoring.petugas_id = tbl_petugas_monitoring.id_petugas_monitoring')
								->get()->result_array();
								return $catatan;
		}	

}

/* End of file M_Catatan.php */
/* Location: ./application/models/Petugas/M_Catatan.php */