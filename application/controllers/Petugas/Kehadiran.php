<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kehadiran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/M_User');
		$this->load->model('Petugas/M_Petugas');
		$this->load->model('Siswa/M_Kehadiran');
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		$this->petugas=$this->M_Petugas->getPetugasLoginData();
		isLoggedIn();
	}
	public function index(){
		$data['judul'] = 'petugas';
		$data['user'] = $this->user;
        $data['kehadiran']=$this->M_Kehadiran->getKehadiranBySiswaId();
        $this->load->view('layouts/_templates/header',$data);
		$this->load->view('layouts/_templates/navbar',$data);
		$this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('petugas/home/index',$data);
		$this->load->view('layouts/_templates/footer');
	}

}