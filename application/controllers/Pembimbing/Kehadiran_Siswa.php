<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kehadiran_Siswa extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('User/M_User');
        $this->load->model('Pembimbing/M_Pembimbing');
        $this->load->model('Pembimbing/M_Kehadiran_Siswa');
        $this->load->helper(['auth','date','pembimbing']);
        $this->user=$this->M_User->getUserLoginData();
        $this->pembimbing=$this->M_Pembimbing->getPembimbingLoginData();
        justPembimbingCanAccessThis();
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
        $data['count_kehadiran'] = $this->M_Kehadiran_Siswa->countAllKehadiranSiswa();
        $data['bulan_aktif'] = $this->M_Kehadiran_Siswa->getActiveBulan();
        $data['bulan_sekarang'] = date('m'); 

        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('pembimbing/kehadiran-siswa/index',$data);
        $this->load->view('layouts/_templates/footer');     
	}

    public function bulan($id_bulan)
    {
        $data['judul'] = 'Kehadiran Siswa';
        $data['user'] = $this->user;
        $data['pembimbing'] = $this->pembimbing;
        $data['bulan'] = $this->M_Kehadiran_Siswa->getBulanById($id_bulan);
        $data['absensi'] = $this->M_Kehadiran_Siswa->getKehadiranSiswaByThisMonth($id_bulan);

        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('pembimbing/kehadiran-siswa/detail-bulan-kehadiran',$data);
        $this->load->view('layouts/_templates/footer');   
    }

    public function detail_kehadiran_per_bulan($bulan_id,$id_grup_absensi)
    {
        $data['judul'] = 'Kehadiran Siswa';
        $data['user'] = $this->user;
        $data['pembimbing'] = $this->pembimbing;

        $data['kehadiran'] = $this->M_Kehadiran_Siswa->getKehadiranSiswaByIdGrupAbsensi($bulan_id,$id_grup_absensi)->result_array();

        $data['count_kehadiran'] = $this->M_Kehadiran_Siswa->getKehadiranSiswaByIdGrupAbsensi($bulan_id,$id_grup_absensi)->num_rows();

        $data['id_grup_absensi'] = $id_grup_absensi;
        $data['bulan'] = $this->M_Kehadiran_Siswa->getBulanById($bulan_id);

        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('pembimbing/kehadiran-siswa/detail-kehadiran-per-bulan',$data);
        $this->load->view('layouts/_templates/footer');      
    }

    /*
    | -------------------------------------------------------------------------
    | Mengkonfirmasi Kehadiran Siswa Prakerin (per siswa prakerin)
    | -------------------------------------------------------------------------
    | Siswa prakerin yang sudah mengisi kehadiran hari ini,maka akan di-
    | konfirmasi oleh pembimbing prakerin sebagai ganti dari paraf.
    */
    public function confirmKehadiranSiswa($id_absensi)
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
    public function confirmAllKehadiranSiswa()
    {
        $this->M_Kehadiran_Siswa->confirmAllKehadiranByToday($id_absensi);
        redirect('pembimbing/kehadiran-siswa');
    }

}

/* End of file Kehadiran_Siswa.php */
/* Location: ./application/controllers/Pembimbing/Kehadiran_Siswa.php */