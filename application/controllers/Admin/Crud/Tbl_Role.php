<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_Role extends CI_Controller {

		public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Crud/M_Tbl_Role');
		
	}
	public function index(){
		$data['role'] = $this->M_Tbl_Role->get()->result_array();
        $this->load->view('layouts/_templates/header');
        $this->load->view('layouts/_templates/navbar');
        $this->load->view('layouts/_templates/sidebar');
		$this->load->view('admin/crud/tbl_role/index',$data);
        $this->load->view('layouts/_templates/footer');
	}
	public function add(){

        $this->load->view('layouts/_templates/header');
        $this->load->view('layouts/_templates/navbar');
        $this->load->view('layouts/_templates/sidebar');
		$this->load->view('admin/crud/tbl_role/insert');	
        $this->load->view('layouts/_templates/footer');

	}
	public function save(){
		$data = array(
 				'nama_role' => $this->input->post('nama'),
 				'redirect' => $this->input->post('redirect')
		);
		$this->M_Tbl_Role->insert($data);
		redirect('Admin/Crud/Tbl_Role');
	}
	public function delete($id){
		$this->M_Tbl_Role->delete($id);
		redirect('Admin/Crud/Tbl_Role');
	}
	public function update($id){
		$this->load->view('layouts/_templates/header');
        $this->load->view('layouts/_templates/navbar');
        $this->load->view('layouts/_templates/sidebar');
		$data['role'] = $this->db->get_where('tbl_role',['id_role' => $id])->row_array();
		$this->load->view('admin/crud/tbl_role/edit',$data);	
        $this->load->view('layouts/_templates/footer');
	}
	public function edit(){
		$this->M_Tbl_Role->edit(); 
		redirect('Admin/Crud/Tbl_Role');
	}
}


/* End of file Tbl_Role.php */
/* Location: ./application/controllers/Admin/Crud/Tbl_Role.php */