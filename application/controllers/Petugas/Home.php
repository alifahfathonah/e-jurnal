<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/M_User');
		$this->load->model('Petugas/M_Catatan');
		$this->load->helper(['greetings','auth']);
		$this->user=$this->M_User->getUserLoginData();
		isLoggedIn();
	}

	public function index()
	{
		$data['judul'] = 'Home';
		$data['user'] = $this->user;
		$data['petugas'] = $this->petugas;
		$data['catatan_monitoring'] = $this->M_Catatan->getAll();
		$this->load->view('layouts/_templates/header',$data);
		$this->load->view('layouts/_templates/navbar',$data);
		$this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('petugas/Catatan',$data);
		$this->load->view('layouts/_templates/footer');		
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Siswa/Home.php */