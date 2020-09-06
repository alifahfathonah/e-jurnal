<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Bulan extends CI_Model {

	public function getAllBulan($result_type=NULL)
	{
		$bulan = $this->db->get('tbl_bulan');
		switch ($result_type) {
			case 'result_array':
					$result = $bulan->result_array();	
				break;
			case 'num_rows':
					$result = $bulan->num_rows();
				break;
			default:
					$result = $bulan->result_array();		
				break;
		}

		return $result;
	}

	public function getBulanById($id_bulan)
	{
		$bulan = $this->db->get_where('tbl_bulan',['id_bulan' => $id_bulan])->row_array();
		return $bulan;
	}

	public function getActiveBulan($result_type=NULL)
	{
		$bulan = $this->db->get_where('tbl_bulan',['is_active' => 1]);
		
		switch ($result_type) {
			case 'result_array':
					$result = $bulan->result_array();	
				break;
			case 'row_array':
					$result = $bulan->row_array();	
				break;
			case 'num_rows':
					$result = $bulan->num_rows();
				break;
			default:
					$result = $bulan->result_array();		
				break;
		}

		return $result;
	}

	public function getBulanSekarang()
	{
		$bulan_sekarang = date('m');
		$bulan = $this->db->get_where('tbl_bulan',['no_bulan' => $bulan_sekarang])->row_array();
		return $bulan;
	}

	public function getNonActiveBulan($result_type=NULL)
	{
		$bulan = $this->db->get_where('tbl_bulan',['is_active' => 0]);
		
		switch ($result_type) {
			case 'result_array':
					$result = $bulan->result_array();	
				break;
			case 'row_array':
					$result = $bulan->row_array();	
				break;
			case 'num_rows':
					$result = $bulan->num_rows();
				break;
			default:
					$result = $bulan->result_array();		
				break;
		}

		return $result;
	}

	public function update($data=[],$id_bulan)
	{
		return $this->db->where('id_bulan',$id_bulan)->update('tbl_bulan',$data);
	}	

}

/* End of file M_Bulan.php */
/* Location: ./application/models/common/M_Bulan.php */