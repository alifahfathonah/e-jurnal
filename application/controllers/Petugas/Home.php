<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/M_User');
		$this->load->model('petugas/M_Monitoring');
		$this->load->model('petugas/M_Petugas');
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		$this->petugas=$this->M_Petugas->getPetugasLoginData();
		isLoggedIn();
	}

	public function index()
	{
		$data['judul'] = 'Petugas';
		$data['user'] = $this->user;
		$data['petugas'] = $this->petugas;
		$this->user=$this->M_User->getUserLoginData();
		$this->load->view('layouts/_templates/header',$data);
		$this->load->view('layouts/_templates/navbar',$data);
		$this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('petugas/home/index',$data);
		$this->load->view('layouts/_templates/footer');		
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Siswa/Home.php */