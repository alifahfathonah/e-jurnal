<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blocked extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/M_User');
		$this->load->model('Siswa/M_Siswa');
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		$this->siswa=$this->M_Siswa->getSiswaLoginData();
	}

    public function index()
    {
    	$data['judul'] = 'Unauthorized';
		$data['user'] = $this->user;
		$data['siswa'] = $this->siswa;
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('errors/blocked',$data);
        $this->load->view('layouts/_templates/footer');
    }

}

/* End of file Blocked.php */
/* Location: ./application/controllers/Blocked.php */