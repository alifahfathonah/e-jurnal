<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/M_User');
		$this->load->model('siswa/M_Siswa');
		$this->load->model('siswa/M_Kegiatan');
		$this->load->model('common/M_Bulan');
		$this->load->helper(['auth', 'siswa']);
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
		$data['bulan_aktif'] = $this->M_Bulan->getActiveBulan();
		$data['bulan_sekarang'] = date('F');

		$this->load->view('layouts/_templates/header', $data);
		$this->load->view('layouts/_templates/navbar', $data);
		$this->load->view('layouts/_templates/sidebar', $data);
		$this->load->view('siswa/kegiatan/index', $data);
		$this->load->view('layouts/_templates/footer');
	}

	public function create_kegiatan($id_bulan,$id_grup_kegiatan)
	{	
		$data['judul'] = 'Kegiatan';
		$data['user'] = $this->user;
		$data['kegiatan'] = $this->M_Kegiatan->getAllData();
		$data['bulan'] = $this->M_Bulan->getBulanById($id_bulan);
		$data['id_grup_kegiatan'] = $id_grup_kegiatan;
		$data['siswa'] = $this->siswa;
		$id_siswa = $data['siswa']['id_siswa'];

		$data['kegiatan'] = $this->M_Kegiatan->getKegiatanByIdGrupKegiatanAndIdSiswa($id_grup_kegiatan,$id_siswa);

		if (!$data['kegiatan']) {
			$this->load->view('layouts/_templates/header', $data);
			$this->load->view('layouts/_templates/navbar', $data);
			$this->load->view('layouts/_templates/sidebar', $data);
			$this->load->view('siswa/kegiatan/tambah-kegiatan', $data);
			$this->load->view('layouts/_templates/footer');		
		}else{
			$this->session->set_flashdata('warning','Kegiatan sudah ditambahkan');
			redirect('siswa/Kegiatan/bulan/'.$id_bulan);	
		}
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
			'siswa_id' => $this->input->post('siswa_id'),
			'bulan_id' => $this->input->post('bulan_id'), 
			'tanggal' => $this->input->post('tgl'),
			'jam_masuk' => $this->input->post('jam_masuk'),
			'jam_pulang' => $this->input->post('jam_pulang'),
			'uraian_kegiatan' => $this->input->post('uraian_kegiatan'),
			'id_grup_kegiatan' => $this->input->post('id_grup_kegiatan'),
		);
		$this->M_Kegiatan->insert($data);
		redirect('Siswa/kegiatan');
	}

	public function bulan($id_bulan)
	{
		$data['judul'] = 'Kegiatan';
		$data['user'] = $this->user;
		$data['siswa'] = $this->siswa;
		$data['bulan'] = $this->M_Bulan->getBulanById($id_bulan);

		$this->load->view('layouts/_templates/header', $data);
		$this->load->view('layouts/_templates/navbar', $data);
		$this->load->view('layouts/_templates/sidebar', $data);
		$this->load->view('siswa/kegiatan/tanggal_bulan', $data);
		$this->load->view('layouts/_templates/footer');	
	}

	public function show_kegiatan($id_bulan,$id_grup_kegiatan)
	{
		$data['judul'] = 'Kegiatan';
		$data['user'] = $this->user;
		$data['siswa'] = $this->siswa;
		$data['bulan'] = $this->M_Bulan->getBulanById($id_bulan);
		$id_siswa = $data['siswa']['id_siswa'];

		$data['kegiatan'] = $this->M_Kegiatan->getKegiatanByIdGrupKegiatanAndIdSiswa($id_grup_kegiatan,$id_siswa);
		if ($data['kegiatan']) {
			$this->load->view('layouts/_templates/header', $data);
			$this->load->view('layouts/_templates/navbar', $data);
			$this->load->view('layouts/_templates/sidebar', $data);
			$this->load->view('siswa/kegiatan/detail_kegiatan', $data);
			$this->load->view('layouts/_templates/footer');
		}else{
			$this->session->set_flashdata('warning','tidak ada kegiatan');
			redirect('siswa/Kegiatan/bulan/'.$id_bulan);	
		}
				
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