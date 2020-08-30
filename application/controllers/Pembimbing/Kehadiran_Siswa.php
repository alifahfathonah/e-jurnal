<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kehadiran_Siswa extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('User/M_User');
        $this->load->model('Pembimbing/M_Pembimbing');
        $this->load->model('Pembimbing/M_Kehadiran_Siswa');
        $this->load->helper(['auth','date']);
        $this->user=$this->M_User->getUserLoginData();
        $this->pembimbing=$this->M_Pembimbing->getPembimbingLoginData();
        isLoggedIn();
        date_default_timezone_set('Asia/Jakarta');
    }

	public function index()
	{
		$data['judul'] = 'Kehadiran Siswa';
        $data['user'] = $this->user;
        $data['pembimbing'] = $this->pembimbing;
        $data['all_kehadiran_this_day'] = $this->M_Kehadiran_Siswa->getKehadiranSiswaByThisDay();
        $data['count_confirmed_kehadiran_this_day'] = $this->M_Kehadiran_Siswa->countConfirmedKehadiranByThisDay();
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('pembimbing/kehadiran-siswa/index',$data);
        $this->load->view('layouts/_templates/footer');     
	}

    /*
    | -------------------------------------------------------------------------
    | Mengkonfirmasi Kehadiran Siswa Prakerin (per siswa prakerin)
    | -------------------------------------------------------------------------
    | Siswa prakerin yang sudah mengisi kehadiran hari ini,maka akan di-
    | konfirmasi oleh pembimbing prakerin sebagai ganti dari paraf.
    */
    public function confirmKehadiran($id_absensi)
    {
        $this->M_Kehadiran_Siswa->confirmKehadiranById($id_absensi);
        redirect('pembimbing/kehadiran-siswa');
    }

    /*
    | -------------------------------------------------------------------------
    | Mengkonfirmasi Semua Kehadiran Siswa Prakerin (semua siswa prakerin)
    | -------------------------------------------------------------------------
    | Semua siswa prakerin yang sudah mensubmit hadir hari ini,maka akan-
    | dikonfirmasi secara bersamaan. 
    | 
    */
    public function confirmAllKehadiran()
    {

    }

}

/* End of file Kehadiran_Siswa.php */
/* Location: ./application/controllers/Pembimbing/Kehadiran_Siswa.php */