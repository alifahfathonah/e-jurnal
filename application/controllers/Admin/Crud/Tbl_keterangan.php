<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tbl_Keterangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Crud/M_Tbl_Keterangan', 'M_Tbl_Keterangan');
        $this->load->model('User/M_User');
        $this->load->helper(['auth']);
        $this->user=$this->M_User->getUserLoginData();
        isLoggedIn();
    }
    public function index()
    {
        $data['keterangan'] = $this->M_Tbl_Keterangan->get_all();
        $data['judul'] = 'Data Keterangan Absensi';
        $data['user'] = $this->user;
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/crud/tbl_keterangan/index', $data);
        $this->load->view('layouts/_templates/footer');
    }
}
