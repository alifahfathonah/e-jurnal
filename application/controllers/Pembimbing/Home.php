<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('User/M_User');
        $this->load->model('Pembimbing/M_Pembimbing');
        $this->load->helper('auth');
        $this->user=$this->M_User->getUserLoginData();
        $this->pembimbing=$this->M_Pembimbing->getPembimbingLoginData();
        isLoggedIn();
    }

	public function index()
	{
		$data['judul'] = 'Pembimbing';
        $data['user'] = $this->user;
        $data['pembimbing'] = $this->pembimbing;
        
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('pembimbing/home/index',$data);
        $this->load->view('layouts/_templates/footer');     
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Pembimbing/Home.php */