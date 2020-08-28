<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi_Siswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User/M_User');
        $this->load->model('Pembimbing/M_Pembimbing');
        $this->load->model('Pembimbing/M_Materi_Siswa');
        $this->load->helper(['auth']);
        $this->user=$this->M_User->getUserLoginData();
        $this->pembimbing=$this->M_Pembimbing->getPembimbingLoginData();
        isLoggedIn();
    }

    public function index()
    {
        $data['judul'] = 'Materi Siswa';
        $data['user'] = $this->user;
        $data['pembimbing'] = $this->pembimbing;
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('pembimbing/materi-siswa/index',$data);
        $this->load->view('layouts/_templates/footer');     
    }

    public function create()
    {
        $data['judul'] = 'Tambah Materi/Tugas Siswa';
        $data['user'] = $this->user;
        $data['pembimbing'] = $this->pembimbing;
        $data['all_tipe_tugas'] = $this->M_Materi_Siswa->getAllTipeTugasSiswa();
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('pembimbing/materi-siswa/create',$data);
        $this->load->view('layouts/_templates/footer');   
    }

    public function store()
    {
        $data=[
            'tipe_tugas_siswa_id'   => $this->input->post('tipe_tugas_siswa_id'),
            'pembimbing_id'         => $this->input->post('pembimbing_id'),
            'judul_tugas_siswa'     => $this->input->post('judul_tugas_siswa'),
            'deskripsi_tugas'       => $this->input->post('deskripsi_tugas'),
            'tanggal_tugas_siswa'   => date('d-m-Y'),
        ];
        $this->M_Materi_Siswa->insert('tbl_tugas_siswa',$data);
        $this->session->set_flashdata('success','Materi siswa berhasil di posting');
        redirect('pembimbing/materi-siswa/create');
    }

}

/* End of file Materi_Siswa.php */
/* Location: ./application/controllers/Pembimbing/Materi_Siswa.php */