<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tbl_Pembimbing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Crud/M_Tbl_Pembimbing');
		
	}
	public function index(){
		$data['pembimbing'] = $this->M_Tbl_Pembimbing->get()->result_array();
        $this->load->view('layouts/_templates/header');
        $this->load->view('layouts/_templates/navbar');
        $this->load->view('layouts/_templates/sidebar');
		$this->load->view('admin/crud/tbl_pembimbing/index',$data);
        $this->load->view('layouts/_templates/footer');
	}
	public function add(){

        $this->load->view('layouts/_templates/header');
        $this->load->view('layouts/_templates/navbar');
        $this->load->view('layouts/_templates/sidebar');
		$this->load->view('admin/crud/tbl_pembimbing/insert');	
        $this->load->view('layouts/_templates/footer');

	}
	public function save(){
		$data = array(
 				'nama_pembimbing' => $this->input->post('nama'),
 				'nip' => $this->input->post('nip')
		);
		$this->M_Tbl_Pembimbing->insert($data);
		redirect('Admin/Crud/Tbl_Pembimbing');
	}
	public function delete($id){
		$this->M_Tbl_Pembimbing->delete($id);
		redirect('Admin/Crud/Tbl_Pembimbing');
	}
	public function update($id){
		$this->load->view('layouts/_templates/header');
        $this->load->view('layouts/_templates/navbar');
        $this->load->view('layouts/_templates/sidebar');
		$data['pembimbing'] = $this->db->get_where('tbl_pembimbing',['id_pembimbing' => $id])->row_array();
		$this->load->view('admin/crud/tbl_pembimbing/edit',$data);	
        $this->load->view('layouts/_templates/footer');
	}
	public function edit(){
		$this->M_Tbl_Pembimbing->edit(); 
		redirect('Admin/Crud/Tbl_Pembimbing');
	}
}