<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_Submenu extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin/Crud/M_Tbl_Submenu','M_Submenu');
        $this->load->model('User/M_User');
        $this->load->helper('auth');
        $this->user=$this->M_User->getUserLoginData();
        isLoggedIn();
	}

	public function index()
    {
        $data['judul'] = 'Data Submenu';
        $data['user'] = $this->user;
    	$data['all_submenu'] = $this->M_Submenu->getAll();
    	$this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/crud/tbl_submenu/index',$data);
        $this->load->view('layouts/_templates/footer');
    }

    public function tambah()
    {	
    	if ($this->form_validation->run($this->_tambahSubmenuValidate())==FALSE) {
    		$data['judul'] = 'Tambah Data Submenu';
            $data['user'] = $this->user;
    		$data['all_menu']=$this->M_Submenu->getAllMenu();
	    	$this->load->view('layouts/_templates/header',$data);
	        $this->load->view('layouts/_templates/navbar',$data);
	        $this->load->view('layouts/_templates/sidebar',$data);
	    	$this->load->view('admin/crud/tbl_submenu/tambah',$data);
	    	$this->load->view('layouts/_templates/footer');
    	}else{
    		$data = ['nama_submenu' =>    $this->input->post('nama_submenu'),
    				'icon_submenu' =>  $this->input->post('icon_submenu'),
                    'url_submenu' => $this->input->post('url_submenu'),
                    'menu_id' =>    $this->input->post('menu_id'),
                    'is_active' =>    $this->input->post('is_active'),
                    ];
    		$this->M_Submenu->tambah($data);
    		redirect('admin/crud/tbl-submenu');
    	}
    }

    public function edit($id='')
    {
    	if ($this->form_validation->run($this->_ubahSubmenuValidate())==FALSE) {
            $data['judul'] = 'Edit Data Submenu';
            $data['user'] = $this->user;
            $data['submenu']=$this->M_Submenu->getById($id);
            $data['all_menu']=$this->M_Submenu->getAllMenu();
    		$this->load->view('layouts/_templates/header',$data);
	        $this->load->view('layouts/_templates/navbar',$data);
	        $this->load->view('layouts/_templates/sidebar',$data);
	    	$this->load->view('admin/crud/tbl_submenu/edit',$data);
	    	$this->load->view('layouts/_templates/footer');
    	}else{
            $this->_update();
    	}
    }

    private function _update()
    {
        $id=$this->input->post('id_submenu');
        $data = ['nama_submenu' =>    $this->input->post('nama_submenu'),
				'icon_submenu' =>  $this->input->post('icon_submenu'),
                'url_submenu' => $this->input->post('url_submenu'),
                'menu_id' =>    $this->input->post('menu_id'),
                'is_active' =>    $this->input->post('is_active'),
                ];
        $this->M_Submenu->update($id,$data);
        redirect('admin/crud/tbl-submenu');
    }

    public function hapus($id='')
    {
    	$this->M_Submenu->hapus($id);
    	redirect('admin/crud/tbl-submenu');
    }

    private function _tambahSubmenuValidate()
    {
    	$this->form_validation->set_rules('nama_submenu','u','required');
    	$this->form_validation->set_rules('icon_submenu', 'e', 'required');
    }

    private function _ubahSubmenuValidate()
    {
        $this->form_validation->set_rules('nama_submenu','u','required');
        $this->form_validation->set_rules('icon_submenu', 'e', 'required');
    }

}

/* End of file Tbl_Submenu.php */
/* Location: ./application/controllers/Admin/Crud/Tbl_Submenu.php */