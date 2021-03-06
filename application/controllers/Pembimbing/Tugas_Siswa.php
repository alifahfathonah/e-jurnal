<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_Siswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/M_User');
        $this->load->model('pembimbing/M_Pembimbing');
        $this->load->model('pembimbing/M_Tugas_Siswa');
        $this->load->helper(['auth','pembimbing']);
        $this->user=$this->M_User->getUserLoginData();
        $this->pembimbing=$this->M_Pembimbing->getPembimbingLoginData();
        justPembimbingCanAccessThis();
        isLoggedIn();
    }

    public function index()
    {
        $data['judul'] = 'Tugas Siswa';
        $data['user'] = $this->user;
        $data['pembimbing'] = $this->pembimbing;
        $data['all_tugas_siswa_by_pembimbing'] = $this->M_Tugas_Siswa->getTugasSiswaByPembimbingId()->result_array();
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('pembimbing/tugas-siswa/index',$data);
        $this->load->view('layouts/_templates/footer');     
    }

    public function create()
    {
        $data['judul'] = 'Tambah Materi/Tugas Siswa';
        $data['user'] = $this->user;
        $data['pembimbing'] = $this->pembimbing;
        $data['all_tipe_tugas'] = $this->M_Tugas_Siswa->getAllTipeTugasSiswa();
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('pembimbing/tugas-siswa/create',$data);
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
        $this->M_Tugas_Siswa->insert('tbl_tugas_siswa',$data);
        $this->session->set_flashdata('success','Materi siswa berhasil di posting');
        redirect('pembimbing/tugas-siswa/create');
    }

    public function show($id)
    {
        $data['judul'] = 'Detail Tugas';
        $data['user'] = $this->user;
        $data['pembimbing'] = $this->pembimbing;
        $data['materi_id'] = $id;
        $data['detail_tugas'] = $this->M_Tugas_Siswa->getTugasById($id);
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('pembimbing/tugas-siswa/show',$data);
        $this->load->view('layouts/_templates/footer');      
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Tugas';
        $data['user'] = $this->user;
        $data['pembimbing'] = $this->pembimbing;
        $data['materi_id'] = $id;
        $data['detail_tugas'] = $this->M_Tugas_Siswa->getTugasById($id);
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('pembimbing/tugas-siswa/edit',$data);
        $this->load->view('layouts/_templates/footer');      
    }


    public function update()
    {
        $data=[
            'id_tugas'              => $this->input->post('id_tugas'),
            'pembimbing_id'         => $this->input->post('pembimbing_id'),
            'judul_tugas_siswa'     => $this->input->post('judul_tugas_siswa'),
            'deskripsi_tugas'       => $this->input->post('deskripsi_tugas'),
        ];
        $this->M_Tugas_Siswa->update($data['id_tugas'],$data);
        $this->session->set_flashdata('success','Materi siswa berhasil di update');
        redirect('pembimbing/tugas-siswa');
    }

    public function delete($id)
    {
        $this->M_Tugas_Siswa->delete($id);
        $this->session->set_flashdata('success','Materi berhasil dihapus');
        redirect('pembimbing/tugas-siswa');
    }

}

/* End of file Tugas_Siswa.php */
/* Location: ./application/controllers/Pembimbing/Tugas_Siswa.php */