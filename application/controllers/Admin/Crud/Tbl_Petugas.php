<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tbl_Petugas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/crud/M_Tbl_Petugas');
		$this->load->model('user/M_User');
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		isLoggedIn();
	}
	
	public function index(){
		$data['petugas'] = $this->M_Tbl_Petugas->get()->result_array();
		$data['judul'] = 'Tabel Petugas';
    	$data['user'] = $this->user;
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('admin/crud/tbl_petugas/index',$data);
        $this->load->view('layouts/_templates/footer');
	}
	public function add(){
		$data['judul'] = 'Tambah Petugas';
    	$data['user'] = $this->user;
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('admin/crud/tbl_petugas/insert',$data);	
        $this->load->view('layouts/_templates/footer');

	}
	public function save(){
		$data = array(
 				'nama_petugas_monitoring' => $this->input->post('nama'),
 				'saran_petugas_monitoring' => $this->input->post('saran'),
 				'no_telp_petugas' => $this->input->post('telp')
		);
		$this->M_Tbl_Pembimbing->insert($data);
		redirect('admin/crud/Tbl_Petugas');
	}
	public function delete($id){
		$this->M_Tbl_Pembimbing->delete($id);
		redirect('admin/crud/Tbl_Petugas');
	}
	public function update($id){
		$data['judul'] = 'Edit Petugas';
    	$data['user'] = $this->user;
    	$data['petugas'] = $this->db->get_where('tbl_petugas_monitoring',['id_petugas_monitoring' => $id])->row_array();
		$this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('admin/crud/tbl_petugas/edit',$data);	
        $this->load->view('layouts/_templates/footer');
	}
	public function edit(){
		$this->M_Tbl_Pembimbing->edit(); 
		redirect('admin/crud/Tbl_Petugas');
	}
}