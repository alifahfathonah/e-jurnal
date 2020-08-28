<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model {

  public function countTable($table='')
	{
		$table = $this->db->get($table)->num_rows();
		return $table;
	}
	

}

/* End of file M_Dashboard.php */
/* Location: ./application/models/Admin/M_Dashboard.php */