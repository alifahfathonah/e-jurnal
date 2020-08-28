<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

     public function __construct()
        {
            parent::__construct();
            $this->load->model('User/M_User');
            $this->load->model('Siswa/M_Siswa');
            $this->load->model('Siswa/M_Materi');
            $this->load->helper(['auth', 'siswa']);
            $this->user = $this->M_User->getUserLoginData();
            $this->siswa = $this->M_Siswa->getSiswaLoginData();
            $this->load->library('pagination');
            isLoggedIn();
            thisSiswaNotExists();
           }
    
        public function index()
        {
            $data['judul'] = 'Materi';
            $data['user'] = $this->user;
            $data['siswa'] = $this->siswa;
            ////////////////////////////////////////////////
            $config['base_url'] = base_url('Siswa/Materi/index');
            $config['start'] = $this->uri->segment(4);
            $config['per_page'] = 8;
            $config['total_rows'] = $this->db->count_all('tbl_tugas_siswa');
            $this->pagination->initialize($config);
            /////////////////////////////////////////////////
            $data['materi'] = $this->M_Materi->getAllMateri($config['per_page'],$config['start'])->result_array();
            $data['total_materi'] = $config['total_rows'];
            $this->load->view('layouts/_templates/header', $data);
            $this->load->view('layouts/_templates/navbar', $data);
            $this->load->view('layouts/_templates/sidebar', $data);
            $this->load->view('siswa/materi/index', $data);
            $this->load->view('layouts/_templates/footer');
        }   

        public function detail_materi($id)
        {
            $data['judul'] = 'Materi';
            $data['user'] = $this->user;
            $data['siswa'] = $this->siswa;
            $data['detail_materi'] = $this->M_Materi->getMateriById($id);
            $data['materi_id'] = $id;
            $this->load->view('layouts/_templates/header', $data);
            $this->load->view('layouts/_templates/navbar', $data);
            $this->load->view('layouts/_templates/sidebar', $data);
            $this->load->view('siswa/materi/detail_materi', $data);
            $this->load->view('layouts/_templates/footer');
        }
    }
