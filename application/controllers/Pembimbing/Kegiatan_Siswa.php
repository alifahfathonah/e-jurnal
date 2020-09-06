<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_Siswa extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('user/M_User');
        $this->load->model('pembimbing/M_Pembimbing');
        $this->load->model('pembimbing/M_Kegiatan_Siswa','M_Kegiatan');
        $this->load->helper(['auth','pembimbing']);
        $this->user=$this->M_User->getUserLoginData();
        $this->pembimbing=$this->M_Pembimbing->getPembimbingLoginData();
        justPembimbingCanAccessThis();
        isLoggedIn();
    }

	public function index()
	{
		$data['judul'] = 'Kegiatan Siswa';
        $data['user'] = $this->user;
        $data['pembimbing'] = $this->pembimbing;
        $data['all_kegiatan_today'] = $this->M_Kegiatan->getKegiatanSiswaByToday();
        $data['count_unconfirmed_kegiatan_today'] = $this->M_Kegiatan->countUnConfirmedKegiatanSiswaByToday();
        $data['count_kegiatan_today'] = $this->M_Kegiatan->countKegiatanSiswaByToday();

        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('pembimbing/kegiatan-siswa/index',$data);
        $this->load->view('layouts/_templates/footer');     
	}

	public function confirmKegiatanSiswa($id_kegiatan)
	{
		$this->M_Kegiatan->confirmKegiatanById($id_kegiatan);
        $this->session->set_flashdata('success','kegiatan dikonfirmasi');
        redirect('pembimbing/Kegiatan_Siswa');
	}

	public function confirmAllKegiatanSiswa()
	{
		$this->M_Kegiatan->confirmAllKegiatanByToday();
        $this->session->set_flashdata('success','semua kegiatan dikonfirmasi');
        redirect('pembimbing/Kegiatan_Siswa');
	}

}

/* End of file Kegiatan_Siswa.php */
/* Location: ./application/controllers/Pembimbing/Kegiatan_Siswa.php */