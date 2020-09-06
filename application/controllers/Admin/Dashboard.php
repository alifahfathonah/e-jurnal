<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/M_User');
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		$this->load->model('admin/M_Dashboard');
		isLoggedIn();
	}

    public function index()
    {
    	$data['judul'] = 'Dashboard';
		$data['user'] = $this->user;
        
		$data['total_user'] = $this->M_Dashboard->countTable('tbl_user');
        $data['total_admin'] = $this->M_Dashboard->countTable('tbl_admin');
        $data['total_pembimbing'] = $this->M_Dashboard->countTable('tbl_pembimbing');
        $data['total_petugas'] = $this->M_Dashboard->countTable('tbl_petugas_monitoring');
        $data['total_siswa'] = $this->M_Dashboard->countTable('tbl_siswa');

        $data['total_role'] = $this->M_Dashboard->countTable('tbl_role');
        $data['total_menu'] = $this->M_Dashboard->countTable('tbl_menu');
        $data['total_submenu'] = $this->M_Dashboard->countTable('tbl_submenu');

        $data['total_role'] = $this->M_Dashboard->countTable('tbl_role');
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('layouts/_templates/footer');
    }
}
