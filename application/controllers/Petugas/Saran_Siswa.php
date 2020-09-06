<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saran_Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/M_User');
		$this->load->model('petugas/M_Monitoring');
		$this->load->model('petugas/M_Petugas');
		$this->load->model('petugas/M_Saran');
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		isLoggedIn();
		$this->petugas=$this->M_Petugas->getPetugasLoginData();
	}

	public function index(){
		$data['judul'] = 'Saran Siswa';
		$data['user'] = $this->user;
		$data['petugas'] = $this->petugas;
        $data['nama'] = $this->M_Monitoring->get_all()->result_array();
        $this->load->view('layouts/_templates/header',$data);
		$this->load->view('layouts/_templates/navbar',$data);
		$this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('petugas/saran-untuk-siswa/index',$data);
		$this->load->view('layouts/_templates/footer');
	}

	public function create($id){
		$data['judul'] = 'Saran Siswa';
		$data['user'] = $this->user;
		$data['petugas'] = $this->petugas;
		$data['id_petugas'] = $data['petugas']['id_petugas_monitoring'];
        $data['nama'] = $this->M_Monitoring->getDataById($id)->row_array();
        $this->load->view('layouts/_templates/header',$data);
		$this->load->view('layouts/_templates/navbar',$data);
		$this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('petugas/saran-untuk-siswa/saran',$data);
		$this->load->view('layouts/_templates/footer');
	}

	public function store()
	{
		$data =[
				'petugas_id' => $this->input->post('petugas_id'),
				'siswa_id' => $this->input->post('siswa_id'),
				'isi_saran' => $this->input->post('isi_saran'),
				'tanggal_saran' => date('d-m-Y'),
				'is_active' => 1,
		  		];
		  		$this->M_Saran->insert($data);
		  		$this->session->set_flashdata('success','saran berhasil dibuat');
		  		redirect('Petugas/Saran');
	}

	public function show_saran($id=NULL)
	{
		$data['judul'] = 'Detail Saran';
		$data['user'] = $this->user;
		$data['petugas'] = $this->petugas;
		$data['id_petugas'] = $data['petugas']['id_petugas_monitoring'];
        $data['detail_saran'] = $this->db->get_where('tbl_saran',['siswa_id' => $id])->row_array();
        $this->load->view('layouts/_templates/header',$data);
		$this->load->view('layouts/_templates/navbar',$data);
		$this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('petugas/saran-untuk-siswa/detail_saran',$data);
		$this->load->view('layouts/_templates/footer');
	}

	public function showEditSaran($id_saran)
	{
		$data = $this->M_Saran->getSaranById($id_saran);
		echo json_encode($data);
	}
	
}		