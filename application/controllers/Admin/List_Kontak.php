<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_Kontak extends CI_Controller {

		public function __construct()
	{
		parent::__construct();
		$this->load->model('user/M_User');
		$this->load->model('admin/M_List_Kontak');
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		isLoggedIn();
	}

    public function index()
    {
    	$data['judul'] = 'List Kontak';
		$data['user'] = $this->user;
		$data['total_siswa'] =$this->M_List_Kontak->countContactByTable('tbl_siswa');
		$data['total_pembimbing'] =$this->M_List_Kontak->countContactByTable('tbl_pembimbing');
		$data['total_petugas'] = $this->M_List_Kontak->countContactByTable('tbl_petugas_monitoring');
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/list-kontak/index',$data);
        $this->load->view('layouts/_templates/footer');
    }

    public function kontak_siswa()
    {
    	$data['judul'] = 'List Kontak Siswa';
		$data['user'] = $this->user;
		$data['kontak_siswa'] = $this->M_List_Kontak->getAllContactSiswa();
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/list-kontak/kontak-siswa',$data);
        $this->load->view('layouts/_templates/footer');
    }

     public function kontak_pembimbing()
    {
    	$data['judul'] = 'List Kontak Pembimbing';
		$data['user'] = $this->user;
		$data['kontak_pembimbing'] = $this->M_List_Kontak->getAllContactPembimbing();
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/list-kontak/kontak-pembimbing',$data);
        $this->load->view('layouts/_templates/footer');
    }

     public function kontak_petugas()
    {
    	$data['judul'] = 'List Kontak Petugas';
		$data['user'] = $this->user;
		$data['kontak_petugas'] = $this->M_List_Kontak->getAllContactPetugas();
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/list-kontak/kontak-petugas',$data);
        $this->load->view('layouts/_templates/footer');
    }


}