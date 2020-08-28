<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tbl_Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Crud/M_Tbl_Admin','M_Admin');
        $this->load->model('User/M_User');
        $this->load->helper('auth');
        $this->user=$this->M_User->getUserLoginData();
        isLoggedIn();
    }

    public function index()
    {
        $data['judul']='Data Admin';
        $data['admin'] = $this->M_Admin->get_all();
        $data['user'] = $this->user;
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/crud/tbl_admin/index', $data);
        $this->load->view('layouts/_templates/footer');
    }
}

/* End of file Tbl_Admin.php */
