<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/M_User');
		$this->load->model('Siswa/M_Siswa');
		$this->load->helper(['auth', 'siswa']);
		$this->load->model('Siswa/M_Kegiatan');
		$this->user = $this->M_User->getUserLoginData();
		$this->siswa = $this->M_Siswa->getSiswaLoginData();
		isLoggedIn();
		justSiswaCanAccessThis();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['judul'] = 'Kegiatan';
		$data['user'] = $this->user;
		$data['siswa'] = $this->siswa;
		$data['kegiatan'] = $this->M_Kegiatan->getAllData();
		$this->load->view('layouts/_templates/header', $data);
		$this->load->view('layouts/_templates/navbar', $data);
		$this->load->view('layouts/_templates/sidebar', $data);
		$this->load->view('siswa/kegiatan/index', $data);
		$this->load->view('layouts/_templates/footer');
	}

	/*
	| -------------------------------------------------------------------------
	| Mengisi Kegiatan
	| -------------------------------------------------------------------------
	| Siswa prakerin mengisi kegiatan sehari-hari 
	*/
	public function save()
	{
		$data = array(
			'tanggal' => $this->input->post('tgl'),
			'jam_masuk' => $this->input->post('jam_masuk'),
			'jam_pulang' => $this->input->post('jam_pulang'),
			'uraian_kegiatan' => $this->input->post('uraian'),
		);
		$this->M_Kegiatan->insert($data);
		redirect('Siswa/kegiatan');
	}

	public function detail($id)
	{
		$data['judul'] = 'Detail Kegiatan';
        $data['user'] = $this->user;
        $data['siswa'] = $this->siswa;
        $data['detail_kegiatan'] = $this->M_Kegiatan->getKegiatanById($id);
        $this->load->view('layouts/_templates/header', $data);
        $this->load->view('layouts/_templates/navbar', $data);
        $this->load->view('layouts/_templates/sidebar', $data);
        $this->load->view('siswa/kegiatan/detail_kegiatan', $data);
        $this->load->view('layouts/_templates/footer');
	}

	 public function update($id)
	{
		$data['judul'] = 'Edit Kegiatan';
		$data['user'] = $this->user;
		$data['siswa'] = $this->siswa;
		$data['uraian_kegiatan'] = $this->db->get_where('tbl_kegiatan',['id_kegiatan' => $id])->row_array();
		$this->load->view('layouts/_templates/header', $data);
		$this->load->view('layouts/_templates/navbar', $data);
		$this->load->view('layouts/_templates/sidebar', $data);
		$this->load->view('siswa/kegiatan/edit_detail', $data);
		$this->load->view('layouts/_templates/footer');
	}
	
	public function edit()
	{
		$this->M_Kegiatan->edit();
		redirect ('Siswa/Kegiatan');
	}

}

/* End of file Kegiatan.php */
/* Location: ./application/controllers/Siswa/Kegiatan.php */