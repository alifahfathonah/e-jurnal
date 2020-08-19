<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tbl_Siswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin/Crud/M_Tbl_Siswa","M_Siswa");	
	}

    public function index()
    {
        $data['judul'] = 'Tabel Siswa';
    	$data['all_siswa'] = $this->M_Siswa->getAll();
    	$this->load->view('layouts/_templates/header');
        $this->load->view('layouts/_templates/navbar');
        $this->load->view('layouts/_templates/sidebar');
        $this->load->view('admin/crud/tbl_siswa/index',$data);
        $this->load->view('layouts/_templates/footer');
    }

    public function tambah()
    {	
    	if ($this->form_validation->run($this->_tambahSiswaValidate())==FALSE) {
    		$data['judul'] = 'Tambah Data Siswa';
    		$data['user_siswa']=$this->M_Siswa->isUserSiswa();
	    	$this->load->view('layouts/_templates/header',$data);
	        $this->load->view('layouts/_templates/navbar');
	        $this->load->view('layouts/_templates/sidebar');
	    	$this->load->view('admin/crud/tbl_siswa/tambah',$data);
	    	$this->load->view('layouts/_templates/footer');
    	}else{
    		$data = ['user_id' =>$this->input->post('user_id'),
    				'nisn' =>$this->input->post('nisn'),
    				'nama_siswa' =>$this->input->post('nama_siswa'),];
    		$this->M_Siswa->tambah($data);
    		redirect('admin/crud/tbl-siswa');
    	}
    }

    public function edit($id='')
    {
    	if ($this->form_validation->run($this->_tambahSiswaValidate())==FALSE) {
            $data['judul'] = 'Edit Data Siswa';
    		$data['siswa']=$this->M_Siswa->getById($id);
    		$this->load->view('layouts/_templates/header',$data);
	        $this->load->view('layouts/_templates/navbar');
	        $this->load->view('layouts/_templates/sidebar');
	    	$this->load->view('admin/crud/tbl_siswa/edit',$data);
	    	$this->load->view('layouts/_templates/footer');
    	}else{
    		$this->_update();
    	}
    }

    private function _update()
    {
    	$id=$this->input->post('id_siswa');
    	$data =	['nama_siswa'  =>  $this->input->post('nama_siswa'),
    			 'nisn'  =>  $this->input->post('nisn')];
    	$this->M_Siswa->update($id,$data);
    	redirect('admin/crud/tbl-siswa');
    }

    public function hapus($id)
    {
    	$this->M_Siswa->hapus($id);
    	redirect('admin/crud/tbl-siswa');
    }

    private function _tambahSiswaValidate()
    {
    	$this->form_validation->set_rules('nama_siswa', 'na', 'required|min_length[2]|max_length[45]');
    	$this->form_validation->set_rules('nisn', 'ni', 'required|min_length[5]|max_length[20]');
    }

}

/* End of file Tbl_Siswa.php */