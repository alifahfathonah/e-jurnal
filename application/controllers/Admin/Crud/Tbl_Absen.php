<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tbl_Absen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Crud/M_Tbl_Absen','M_Absen');
        $this->load->model('User/M_User');
        $this->load->helper('auth');
        $this->user=$this->M_User->getUserLoginData();
        isLoggedIn();
    }

    public function index()
    {
        $data['judul']='Tabel Absen';
        $data['user'] = $this->user;
        $data['absen'] = $this->M_Absen->get_all();
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/crud/tbl_absen/index', $data);
        $this->load->view('layouts/_templates/footer');
    }
    public function tambah()
    {
        $this->form_validation->set_rules('siswa_id', 'SISWA_ID', 'required');
        $this->form_validation->set_rules('keterangan_id', 'KETERANGAN_ID', 'required');

        if ($this->form_validation->run() ==  FALSE) {

            $this->load->view('layouts/_templates/header');
            $this->load->view('layouts/_templates/navbar');
            $this->load->view('layouts/_templates/sidebar');
            $this->load->view('admin/crud/tbl_absen/tambah');
            $this->load->view('layouts/_templates/footer');
        } else {
            $data = [
                'siswa_id' => $this->input->post('siswa_id'),
                'keterangan_id' => $this->input->post('keterangan_id'),
            ];
            $this->db->insert('tbl_absen', $data);
            $this->session->set_flashdata('message', ' <script>alert("DATA Berhasil ditambahkan");</script>');
            redirect('Admin/Crud/Tbl_Absen');
        }
    }
    public function ubah($id)
    {
        $this->form_validation->set_rules('siswa_id', 'SISWA_ID', 'required');
        $this->form_validation->set_rules('keterangan_id', 'KETERANGAN_ID', 'required');

        if ($this->form_validation->run() ==  FALSE) {

            $this->load->view('layouts/_templates/header');
            $this->load->view('layouts/_templates/navbar');
            $this->load->view('layouts/_templates/sidebar');
            $this->load->view('admin/crud/tbl_absen/edit');
            $this->load->view('layouts/_templates/footer');
        } else {
            $data = [
                'siswa_id' => $this->input->post('siswa_id'),
                'keterangan_id' => $this->input->post('keterangan_id'),
            ];
            $this->db->where('id_absen', $id);
            $this->db->update('tbl_absen', $data);
            $this->session->set_flashdata('message', ' <script>alert("DATA Berhasil diubah");</script>');
            redirect('Admin/Crud/Tbl_Absen');
        }
    }
    public function hapus($id)
    {
        $this->M_Absen->hapus($id);
        redirect('Admin/Crud/Tbl_Absen');
    }
}

/* End of file Tbl_Absen.php */
