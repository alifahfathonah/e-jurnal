<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

		public function __construct()
	{
		parent::__construct();
		$this->load->model('User/M_User');
		$this->load->model('Admin/M_Kontak');
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		isLoggedIn();
	}

    public function index()
    {
    	$data['judul'] = 'Kontak';
		$data['user'] = $this->user;
		$data['total_siswa'] =$this->M_Kontak->countContactByTable('tbl_siswa');
		$data['total_pembimbing'] =$this->M_Kontak->countContactByTable('tbl_pembimbing');
		$data['total_petugas'] = $this->M_Kontak->countContactByTable('tbl_petugas_monitoring');
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/kontak/index',$data);
        $this->load->view('layouts/_templates/footer');
    }

    public function kontak_siswa()
    {
    	$data['judul'] = 'Kontak Siswa';
		$data['user'] = $this->user;
		$data['kontak_siswa'] = $this->M_Kontak->getAllContactSiswa();
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/kontak/kontak_siswa',$data);
        $this->load->view('layouts/_templates/footer');
    }

     public function kontak_pembimbing()
    {
    	$data['judul'] = 'Kontak Pembimbing';
		$data['user'] = $this->user;
		$data['kontak_pembimbing'] = $this->M_Kontak->getAllContactPembimbing();
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/kontak/kontak_pembimbing',$data);
        $this->load->view('layouts/_templates/footer');
    }

     public function kontak_petugas()
    {
    	$data['judul'] = 'Kontak Petugas';
		$data['user'] = $this->user;
		$data['kontak_petugas'] = $this->M_Kontak->getAllContactPetugas();
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/kontak/kontak_petugas',$data);
        $this->load->view('layouts/_templates/footer');
    }


}