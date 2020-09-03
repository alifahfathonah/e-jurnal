<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring_Kehadiran_Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/M_User');
		$this->load->model('Petugas/M_Monitoring');
		$this->load->model('Siswa/M_Kehadiran');
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		isLoggedIn();
	}
	
	public function index(){
		$data['judul'] = 'Kehadiran Siswa';
		$data['user'] = $this->user;
        $data['kehadiran']=$this->M_Monitoring->get_all()->result_array();
        $this->load->view('layouts/_templates/header',$data);
		$this->load->view('layouts/_templates/navbar',$data);
		$this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('petugas/monitoring-kehadiran-siswa/index',$data);
		$this->load->view('layouts/_templates/footer');
	}
	
	public function siswa($id=NULL)
	{
		$data['judul'] = 'Kehadiran Siswa';
		$data['user'] = $this->user;
        $data['bulan_aktif']=$this->M_Kehadiran->getActiveBulan();
        $data['id_siswa'] = $id;
        $this->load->view('layouts/_templates/header',$data);
		$this->load->view('layouts/_templates/navbar',$data);
		$this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('petugas/monitoring-kehadiran-siswa/show-bulan',$data);
		$this->load->view('layouts/_templates/footer');
	}

	public function show_kehadiran_siswa($id_siswa,$id_bulan)
	{
		$data['judul'] = 'Kehadiran Siswa';
		$data['user'] = $this->user;
		$data['kehadiran_siswa_per_bulan']=$this->M_Kehadiran->getKehadiranBySiswaAndBulanId($id_siswa,$id_bulan)->result_array();

        $this->load->view('layouts/_templates/header',$data);
		$this->load->view('layouts/_templates/navbar',$data);
		$this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('petugas/monitoring-kehadiran-siswa/show-kehadiran-siswa',$data);
		$this->load->view('layouts/_templates/footer');
	}

}
