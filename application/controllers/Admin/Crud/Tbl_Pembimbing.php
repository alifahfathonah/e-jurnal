<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tbl_Pembimbing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/crud/M_Tbl_Pembimbing');
		$this->load->model('user/M_User');
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		isLoggedIn();
	}
	public function index(){
		$data['pembimbing'] = $this->M_Tbl_Pembimbing->get()->result_array();
		$data['judul'] = 'Tabel Pembimbing';
    	$data['user'] = $this->user;
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('admin/crud/tbl_pembimbing/index',$data);
        $this->load->view('layouts/_templates/footer');
	}
	public function add(){
		$data['judul'] = 'Tambah Pembimbing';
    	$data['user'] = $this->user;
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('admin/crud/tbl_pembimbing/insert',$data);	
        $this->load->view('layouts/_templates/footer');

	}
	public function save(){
		$data = array(
 				'nama_pembimbing' => $this->input->post('nama'),
 				'nip' => $this->input->post('nip')
		);
		$this->M_Tbl_Pembimbing->insert($data);
		redirect('admin/crud/Tbl_Pembimbing');
	}
	public function delete($id){
		$this->M_Tbl_Pembimbing->delete($id);
		redirect('admin/crud/Tbl_Pembimbing');
	}
	public function update($id){
		$data['judul'] = 'Edit Pembimbing';
    	$data['user'] = $this->user;
    	$data['pembimbing'] = $this->db->get_where('tbl_pembimbing',['id_pembimbing' => $id])->row_array();
		$this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('admin/crud/tbl_pembimbing/edit',$data);	
        $this->load->view('layouts/_templates/footer');
	}
	public function edit(){
		$this->M_Tbl_Pembimbing->edit(); 
		redirect('admin/crud/Tbl_Pembimbing');
	}
}