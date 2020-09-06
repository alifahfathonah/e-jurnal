<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_Perusahaan extends CI_Controller {

		public function __construct()
	{
		parent::__construct();

		$this->load->model('user/M_User');
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		$this->load->model('admin/crud/M_Tbl_Perusahaan');
		isLoggedIn();
		
	}
	public function index(){
		$data['judul'] = 'Perusahaan';
		$data['user'] = $this->user;
		$data['perusahaan'] = $this->M_Tbl_Perusahaan->get()->result_array();
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('admin/crud/tbl_perusahaan/index',$data);
        $this->load->view('layouts/_templates/footer');
	}
	public function tambah(){
		$data['judul'] = ' Tambah Perusahaan';
		$data['user'] = $this->user;
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
		$this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('admin/crud/tbl_perusahaan/tambah');	
        $this->load->view('layouts/_templates/footer');
		} else {
			$data = [
				'nama_perusahaan'=> $this->input->post('nama'),
				'alamat_perusahaan'=> $this->input->post('alamat'),
				'nama_pimpinan'=> $this->input->post('pimpinan'),
				'bidang_usaha'=> $this->input->post('bidang'),
			];
			$this->db->insert('tbl_perusahaan',$data);
			$this->session->set_flashdata('message','<script>alert("data berhasil ditambahkan!!!");</script>');
			redirect('admin/crud/Tbl_Perusahaan');
		}
        
       

	}
	public function delete($id)
	{
		$this->M_Tbl_Perusahaan->delete($id);
		redirect('admin/crud/Tbl_Perusahaan');
	}
	public function edit($id=NULL)
	{
       $data['judul'] = ' Edit Perusahaan';
		$data['user'] = $this->user;
		$data['prshan'] = $this->db->get_where('tbl_perusahaan',['id_perusahaan' => $id])->row();
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
		$this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('admin/crud/tbl_perusahaan/edit');	
        $this->load->view('layouts/_templates/footer');
		} else {
			$data = [
				'nama_perusahaan'=> $this->input->post('nama'),
				'alamat_perusahaan'=> $this->input->post('alamat'),
				'nama_pimpinan'=> $this->input->post('pimpinan'),
				'bidang_usaha'=> $this->input->post('bidang'),
			];
			$this->db->where('id_perusahaan',$id);
			$this->db->update('tbl_perusahaan',$data);
			$this->session->set_flashdata('message','<script>alert("data berhasil diedit!!!");</script>');
			redirect('admin/crud/Tbl_Perusahaan');
		}
	}
}