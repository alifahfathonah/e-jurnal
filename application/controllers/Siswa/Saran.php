<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Saran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/M_User');
        $this->load->model('siswa/M_Siswa');
        $this->load->helper(['auth', 'siswa']);
        $this->load->model('siswa/M_Saran');
        $this->user = $this->M_User->getUserLoginData();
        $this->siswa = $this->M_Siswa->getSiswaLoginData();
        isLoggedIn();
        justSiswaCanAccessThis();
    }

    public function index()
    {
        $data['judul'] = 'Saran';
        $data['user'] = $this->user;
        $data['saran'] = $this->M_Saran->getSaranBySiswaId();
        $data['petugas_saran'] = $this->M_Saran->getSaranByPetugasId();
        $this->load->view('layouts/_templates/header', $data);
        $this->load->view('layouts/_templates/navbar', $data);
        $this->load->view('layouts/_templates/sidebar', $data);
        $this->load->view('siswa/saran/index', $data);
        $this->load->view('layouts/_templates/footer');
    }
}
