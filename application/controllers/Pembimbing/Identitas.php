<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('user/M_User');
        $this->load->model('pembimbing/M_Pembimbing');
        $this->load->helper(['auth','pembimbing']);
        $this->user=$this->M_User->getUserLoginData();
        $this->pembimbing=$this->M_Pembimbing->getPembimbingLoginData();
        
        isLoggedIn();
	}

	public function index()
	{
		justPembimbingCanAccessThis();
		$data['judul'] = 'Identitas';
        $data['user'] = $this->user;
        $data['pembimbing'] = $this->pembimbing;        
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('pembimbing/identitas/index',$data);
        $this->load->view('layouts/_templates/footer');	
	}

	public function create()
	{
		redirectIfThisPembimbingExists();
		$data['judul'] = 'Identitas';
        $data['user'] = $this->user;
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('pembimbing/identitas/create',$data);
        $this->load->view('layouts/_templates/footer');
	}

	public function store()
	{
		$data = $this->_identitasPembimbingForm();
		$this->M_Pembimbing->store('tbl_pembimbing',$data);
		$this->session->set_flashdata('success','Identitas Pembimbing Berhasil Diisi');
		redirect('pembimbing/identitas');
	}

	private function _identitasPembimbingForm()
	{
		$data = [	'user_id'            =>$this->input->post('user_id'),
                    'nama_pembimbing'    =>$this->input->post('nama_pembimbing'),
    				'nip'                =>$this->input->post('nip'),
                    'no_telp_pembimbing' =>$this->input->post('no_telp_pembimbing'),
                ];
        return $data;
	}

}

/* End of file Identitas.php */
/* Location: ./application/controllers/Pembimbing/Identitas.php */