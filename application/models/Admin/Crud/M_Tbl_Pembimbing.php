  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tbl_Pembimbing extends CI_Model {
	public function get(){
		return $this->db->get('tbl_pembimbing');
	}

	public function insert($data){
		$this->db->insert('tbl_pembimbing',$data);
	}

	public function delete($id){
		$this->db->where('id_pembimbing',$id)->delete('tbl_pembimbing');
	}
	public  function edit(){
		$data = array(
				'id_pembimbing' => $this->input->post('id'),
				'nama_pembimbing' => $this->input->post('nama'),
				'nip' => $this->input->post('nip'),
		);
		$this->db->where('id_pembimbing',$data['id_pembimbing']);
		$this->db->update('tbl_Pembimbing',$data);
	}


}

/* End of file M_Tbl_Pembbimbing.php */
/* Location: ./application/models/Admin/Crud/M_Tbl_Pembbimbing.php */