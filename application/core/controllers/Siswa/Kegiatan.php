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
		$this->load->model('Siswa/M_kegiatan');
		$this->user = $this->M_User->getUserLoginData();
		$this->siswa = $this->M_Siswa->getSiswaLoginData();
		isLoggedIn();
		thisSiswaNotExists();
	}

	public function index()
	{
		$data['judul'] = 'Kegiatan';
		$data['user'] = $this->user;
		$data['siswa'] = $this->siswa;
		$data['kegiatan'] = $this->M_kegiatan->getAllData();
		$this->load->view('layouts/_templates/header', $data);
		$this->load->view('layouts/_templates/navbar', $data);
		$this->load->view('layouts/_templates/sidebar', $data);
		$this->load->view('siswa/kegiatan/index', $data);
		$this->load->view('layouts/_templates/footer');
	}

	public function save()
	{
		$data = array(
			'tanggal' => $this->input->post('tgl'),
			'jam_masuk' => $this->input->post('jam_masuk'),
			'jam_pulang' => $this->input->post('jam_pulang'),
			'uraian_kegiatan' => $this->input->post('uraian'),
		);
		$this->M_kegiatan->insert($data);
		redirect('Siswa/kegiatan');
	}
}

/* End of file Kegiatan.php */
/* Location: ./application/controllers/Siswa/Kegiatan.php */