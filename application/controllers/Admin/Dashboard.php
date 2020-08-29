<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/M_User');
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		$this->load->model('Admin/M_Dashboard');
		isLoggedIn();
	}

    public function index()
    {
    	$data['judul'] = 'Dashboard';
		$data['user'] = $this->user;
		$data['total_user'] = $this->M_Dashboard->countTable('tbl_user');
        $data['total_perusahaan'] = $this->M_Dashboard->countTable('tbl_perusahaan');
        $data['total_role'] = $this->M_Dashboard->countTable('tbl_role');
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('layouts/_templates/footer');
    }
}
