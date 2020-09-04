<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/M_User');
		$this->load->model('Siswa/M_Siswa');
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		$this->siswa=$this->M_Siswa->getSiswaLoginData();
		isLoggedIn();
	}

	public function index()
	{
		$data['judul'] = 'Home';
		$data['user'] = $this->user;
		$data['siswa'] = $this->siswa;
		$data['siswa_exists'] = $this->M_Siswa->isThisSiswaExists();
		$this->load->view('layouts/_templates/header',$data);
		$this->load->view('layouts/_templates/navbar',$data);
		$this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('siswa/home/index',$data);
		$this->load->view('layouts/_templates/footer');		
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Siswa/Home.php */