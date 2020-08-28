  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tbl_Perusahaan extends CI_Model {
	public function get(){
		return $this->db->get('tbl_perusahaan');
	}

	public function insert($data){
		$this->db->insert('tbl_perusahaan',$data);
	}

    public function delete($id)
	{
		$this->db->where('id_perusahaan',$id)->delete('tbl_perusahaan');
	
	}

}

/* End of file M_Tbl_Pembbimbing.php */
/* Location: ./application/models/Admin/Crud/M_Tbl_Pembbimbing.php */