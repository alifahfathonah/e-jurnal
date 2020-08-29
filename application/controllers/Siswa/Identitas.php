<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/M_User');
		$this->load->model('Siswa/M_Siswa');
		$this->load->helper(['auth','siswa']);
		$this->user=$this->M_User->getUserLoginData();
		$this->siswa=$this->M_Siswa->getSiswaLoginData();
		justSiswaCanAccessThis();
		isLoggedIn();
	}

	public function index()
	{
		$data['siswa_exists']=$this->M_Siswa->isThisSiswaExists();
		$data['judul'] = 'Identitas';
		$data['user'] = $this->user;
		$data['siswa'] = $this->siswa;
		$data['identitas_siswa'] = $this->M_Siswa->getSiswaLengkapData();
		$this->load->view('layouts/_templates/header',$data);
		$this->load->view('layouts/_templates/navbar',$data);
		$this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('siswa/identitas/index',$data);
		$this->load->view('layouts/_templates/footer');			
	}

	public function create()
	{	
		$data['judul'] = 'Lengkapi Identitas';
		$data['user'] = $this->user;
		$data['siswa'] = $this->siswa;
		$data['all_kelas'] = $this->M_Siswa->getAllKelas();
		$data['all_jurusan'] = $this->M_Siswa->getAllJurusan();
		$this->load->view('layouts/_templates/header',$data);
		$this->load->view('layouts/_templates/navbar',$data);
		$this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('siswa/identitas/create',$data);
		$this->load->view('layouts/_templates/footer');	
	}

	public function store()
	{
		$data = $this->_identitasSiswaForm();
		$this->M_Siswa->store('tbl_siswa',$data);
		$this->session->set_flashdata('success','Identitas Siswa Berhasil Diisi');
		redirect('siswa/identitas');
	}

	private function _identitasSiswaForm()
	{
		$data = [	'user_id'          =>$this->input->post('user_id'),
                    'kelas_id'          =>$this->input->post('kelas_id'),
                    'jurusan_id'        =>$this->input->post('jurusan_id'),
                    'nama_siswa'        =>$this->input->post('nama_siswa'),
    				'nis'               =>$this->input->post('nis'),
                    'tempat_lahir'      =>$this->input->post('tempat_lahir'),
                    'tanggal_lahir'     =>$this->input->post('tanggal_lahir'),
                    'jenis_kelamin'     =>$this->input->post('jenis_kelamin'),
                    'alamat_siswa'      =>$this->input->post('alamat_siswa'),
                    'nama_orang_tua'    =>$this->input->post('nama_orang_tua'),
                    'alamat_orang_tua'  =>$this->input->post('alamat_orang_tua'),
                    'no_telp_siswa'			=>$this->input->post('no_telp'),
                ];
        return $data;
	}

}

/* End of file Identitas.php */
/* Location: ./application/controllers/Siswa/Identitas.php */