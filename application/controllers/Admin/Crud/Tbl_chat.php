<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tbl_Chat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Crud/M_Tbl_Chat', 'M_Tbl_Chat');
        $this->load->model('User/M_User');
        $this->load->helper('auth');
        $this->user=$this->M_User->getUserLoginData();
        isLoggedIn();
    }
    public function index()
    {
        $data['judul'] =  'Data Chat';
        $data['chat'] = $this->M_Tbl_Chat->get_all();
        $data['user'] = $this->user;
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/crud/tbl_Chat/index',$data);
        $this->load->view('layouts/_templates/footer');
    }
    public function hapus($id)
    {
        $this->M_Tbl_Chat->hapus($id);
        $this->session->set_flashdata('message', ' <script>alert("DATA BERHASIL DIIHAPUS");</script>');
        redirect('Admin/Crud/Tbl_chat');
    }
}
