<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/M_User');
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		// isLoggedIn();
	}

	public function template($filename='',$data=[])
	{
		$data['user'] = $this->user;
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view($filename,$data);
		$this->load->view('layouts/_templates/footer');
	}

    public function index()
    {
    	$data['judul'] = 'Home';
        $data['siswa'] = $this->db->get('tbl_siswa')->result_array();
    	$this->template('errors/home',$data);
    }

    public function coba()
    {
    	$data['judul'] = 'Coba';
    	$this->template('errors/blocked',$data);
    }

}

/* End of file Blocked.php */
/* Location: ./application/controllers/Blocked.php */