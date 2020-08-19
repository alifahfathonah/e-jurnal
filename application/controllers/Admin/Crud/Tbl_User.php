<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tbl_User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin/Crud/M_Tbl_User","M_User");	
	}

    public function index()
    {
        $data['judul'] = 'Tabel User';
    	$data['all_user'] = $this->M_User->getAll();
    	$this->load->view('layouts/_templates/header');
        $this->load->view('layouts/_templates/navbar');
        $this->load->view('layouts/_templates/sidebar');
        $this->load->view('admin/crud/tbl_user/index',$data);
        $this->load->view('layouts/_templates/footer');
    }

    public function tambah()
    {	
    	if ($this->form_validation->run($this->_tambahUserValidate())==FALSE) {
    		$data['judul'] = 'Tambah Data User';
    		$data['all_role']=$this->M_User->getAllRole();
	    	$this->load->view('layouts/_templates/header',$data);
	        $this->load->view('layouts/_templates/navbar');
	        $this->load->view('layouts/_templates/sidebar');
	    	$this->load->view('admin/crud/tbl_user/tambah',$data);
	    	$this->load->view('layouts/_templates/footer');
    	}else{
    		$data = ['username' =>    $this->input->post('username'),
    				'email' =>  $this->input->post('email'),
    				'password' =>   password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role_id' =>    $this->input->post('role_id'),
                    ];
    		$this->M_User->tambah($data);
    		redirect('admin/crud/tbl-user');
    	}
    }

    public function edit($id='')
    {
    	if ($this->form_validation->run($this->_ubahUserValidate())==FALSE) {
            $data['judul'] = 'Edit Data User';
    		$data['user']=$this->M_User->getById($id);
            $data['all_role']=$this->M_User->getAllRole();
    		$this->load->view('layouts/_templates/header',$data);
	        $this->load->view('layouts/_templates/navbar');
	        $this->load->view('layouts/_templates/sidebar');
	    	$this->load->view('admin/crud/tbl_user/edit',$data);
	    	$this->load->view('layouts/_templates/footer');
    	}else{
            $this->_update();
    	}
    }

    private function _update()
    {
        
        if (!empty($this->input->post('password'))) {
            $password=password_hash($this->input->post('password'),PASSWORD_DEFAULT);    
        }else{
            $password=$this->input->post('old_password');
        }

        $id=$this->input->post('id_user');
    	$data = ['username' =>    $this->input->post('username'),
                'email' =>  $this->input->post('email'),
                'password' =>   $password,
                'role_id' =>    $this->input->post('role_id'),
                ];
        $this->M_User->update($id,$data);
        redirect('admin/crud/tbl-user');
    }

    public function hapus($id='')
    {
    	$this->M_User->hapus($id);
    	redirect('admin/crud/tbl-user');
    }

    private function _tambahUserValidate()
    {
    	$this->form_validation->set_rules('username','u','required');
    	$this->form_validation->set_rules('email', 'e', 'required');
    	$this->form_validation->set_rules('password','p','required');
    }

    private function _ubahUserValidate()
    {
        $this->form_validation->set_rules('username','u','required');
        $this->form_validation->set_rules('email', 'e', 'required');
    }
}

/* End of file Tbl_User.php */