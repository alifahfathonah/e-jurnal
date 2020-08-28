  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tbl_Petugas extends CI_Model {
	public function get(){
		return $this->db->get('tbl_petugas_monitoring');
	}

	public function insert($data){
		$this->db->insert('tbl_petugas_monitoring',$data);
	}

	public function delete($id){
		$this->db->where('id_petugas_monitoring',$id)->delete('tbl_petugas_monitoring');
	}
	public  function edit(){
		$data = array(
				'id_petugas_monitoring' => $this->input->post('id'),
				'nama_petugas_monitoring' => $this->input->post('nama'),
				'no_telp_petugas' => $this->input->post('telp'),
		);
		$this->db->where('id_petugas_monitoring',$data['id_petugas_monitoring']);
		$this->db->update('tbl_petugas_monitoring',$data);
	}


}

/* End of file M_Tbl_Pembbimbing.php */
/* Location: ./application/models/Admin/Crud/M_Tbl_Pembbimbing.php */