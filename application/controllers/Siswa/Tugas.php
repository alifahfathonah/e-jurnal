<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('user/M_User');
            $this->load->model('siswa/M_Siswa');
            $this->load->model('siswa/M_Materi');
            $this->load->helper(['auth', 'siswa']);
            $this->user = $this->M_User->getUserLoginData();
            $this->siswa = $this->M_Siswa->getSiswaLoginData();
            $this->load->library('pagination');
            justSiswaCanAccessThis();
            isLoggedIn();
        }
    
        public function index()
        {   
            $keyword = $this->input->get('keyword');
            if ($keyword) {
                $data['total_materi'] = $this->M_Materi->searchMateri($keyword)->num_rows();
                $data['materi'] = $this->M_Materi->searchMateri($keyword)->result_array();
            }else{
                $config['base_url'] = site_url('siswa/Tugas/index');
                $config['start'] = $this->uri->segment(4);
                $config['per_page'] = 8;
                $config['total_rows'] = $this->db->count_all('tbl_tugas_siswa');
                $this->pagination->initialize($config);
                /////////////////////////////////////////////////
                $data['materi'] = $this->M_Materi->getAllMateri($config['per_page'],$config['start'])->result_array();
                $data['total_materi'] = $config['total_rows'];
            }
            /////////
            $data['judul'] = 'Tugas & Materi';
            $data['user'] = $this->user;
            $data['siswa'] = $this->siswa;
            $this->load->view('layouts/_templates/header', $data);
            $this->load->view('layouts/_templates/navbar', $data);
            $this->load->view('layouts/_templates/sidebar', $data);
            $this->load->view('siswa/tugas/index', $data);
            $this->load->view('layouts/_templates/footer');
        }   

        public function detail_tugas($id)
        {
            $data['judul'] = 'Detail Tugas';
            $data['user'] = $this->user;
            $data['siswa'] = $this->siswa;
            $data['detail_materi'] = $this->M_Materi->getMateriById($id);
            $data['materi_id'] = $id;
            $this->load->view('layouts/_templates/header', $data);
            $this->load->view('layouts/_templates/navbar', $data);
            $this->load->view('layouts/_templates/sidebar', $data);
            $this->load->view('siswa/tugas/detail_materi', $data);
            $this->load->view('layouts/_templates/footer');
        }
    }
