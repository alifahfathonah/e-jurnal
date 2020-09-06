<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_Role extends CI_Controller {

		public function __construct()
	{
		parent::__construct();

		$this->load->model('user/M_User');
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		$this->load->model('admin/M_Dashboard');
		$this->load->model('admin/crud/M_Tbl_Role');
		isLoggedIn();
		
	}
	public function index(){
		$data['judul'] = 'Role';
		$data['user'] = $this->user;
		$data['role'] = $this->M_Tbl_Role->get()->result_array();
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('admin/crud/tbl_role/index',$data);
        $this->load->view('layouts/_templates/footer');
	}
	public function add(){
		$data['judul'] = 'Tambah Role';
    	$data['user'] = $this->user;
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('admin/crud/tbl_role/insert',$data);	
        $this->load->view('layouts/_templates/footer');

	}
	public function save(){
		$data = array(
 				'nama_role' => $this->input->post('nama'),
 				'redirect' => $this->input->post('redirect')
		);
		$this->M_Tbl_Role->insert($data);
		redirect('admin/crud/Tbl_Role');
	}
	public function delete($id){
		$this->M_Tbl_Role->delete($id);
		redirect('admin/crud/Tbl_Role');
	}
	public function update($id){
		$data['judul'] = 'Edit Role';
    	$data['user'] = $this->user;
    	$data['role'] = $this->db->get_where('tbl_role',['id_role' => $id])->row_array();
		$this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('admin/crud/tbl_role/edit',$data);	
        $this->load->view('layouts/_templates/footer');
	}
	public function edit(){
		$this->M_Tbl_Role->edit(); 
		redirect('admin/crud/Tbl_Role');
	}
}


/* End of file Tbl_Role.php */
/* Location: ./application/controllers/Admin/Crud/Tbl_Role.php */