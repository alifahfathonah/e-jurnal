<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/M_User');
		$this->load->model('Siswa/M_Siswa');
		$this->load->helper(['auth','siswa']);
		$this->user=$this->M_User->getUserLoginData();
		$this->siswa=$this->M_Siswa->getSiswaLoginData();
		isLoggedIn();
		thisSiswaNotExists();
	}
	
	public function index()
	{
		$data['judul'] = 'Jurnal';
		$data['user'] = $this->user;
		$data['siswa'] = $this->siswa;
		$this->load->view('layouts/_templates/header',$data);
		$this->load->view('layouts/_templates/navbar',$data);
		$this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('siswa/jurnal',$data);
		$this->load->view('layouts/_templates/footer');		
	}

}

/* End of file Jurnal.php */
/* Location: ./application/controllers/Siswa/Jurnal.php */