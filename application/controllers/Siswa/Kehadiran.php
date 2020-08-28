<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kehadiran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/M_User');
		$this->load->model('Siswa/M_Siswa');
		$this->load->model('Siswa/M_Kehadiran');
		$this->load->helper(['auth','siswa']);
		$this->user=$this->M_User->getUserLoginData();
		$this->siswa=$this->M_Siswa->getSiswaLoginData();
		$this->load->library('pagination');
		isLoggedIn();
		thisSiswaNotExists();
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index()
	{
		$data['judul'] = 'Kehadiran';
		$data['user'] = $this->user;
		$data['siswa'] = $this->siswa;
		$data['some_bulan'] = $this->M_Kehadiran->getSomeBulan(['agustus','september','oktober']);
		$data['bulan_sekarang']=date('F');
		$this->load->view('layouts/_templates/header',$data);
		$this->load->view('layouts/_templates/navbar',$data);
		$this->load->view('layouts/_templates/sidebar',$data);
		$this->load->view('siswa/kehadiran/index',$data);
		$this->load->view('layouts/_templates/footer');		
	}

	public function bulan($slug='')
	{
		if ($slug) {
			$bulan=$this->db->get_where('tbl_bulan',['slug_bulan' => $slug])->row_array();
			$no_bulan_sekarang=date('m');
			$nama_bulan_sekarang=date('F');
			if ($bulan) {
				if ($bulan['no_bulan']<=$no_bulan_sekarang) {
					$data['judul'] = 'Kehadiran Bulan '.$bulan['nama_bulan'];
					$data['user'] = $this->user;
					$data['siswa'] = $this->siswa;
					$data['kehadiran_saya'] = $this->M_Kehadiran->getKehadiranBySiswaId()->result_array();
					$data['count_kehadiran_saya'] = $this->M_Kehadiran->countKehadiranBySiswaId();
					/////////////////////////////////////////////////////////////////////////////
					// $config['base_url'] = 'siswa/kehadian/'.$slug;
					// $config['start'] = $this->uri->segment(3);
					// $config['per_page'] = 5;
					// $config['total_rows'] = $this->M_Kehadiran->getKehadiranBySiswaId()->num_rows();
					// $this->pagination->initialize($config); 
					/////////////////////////////////////////////////////////////////////////////
					$this->load->view('layouts/_templates/header',$data);
					$this->load->view('layouts/_templates/navbar',$data);
					$this->load->view('layouts/_templates/sidebar',$data);
					$this->load->view('siswa/kehadiran/kehadiran',$data);
					$this->load->view('layouts/_templates/footer');				
				}else{
					$this->session->set_flashdata('error','Kehadiran belum masuk bulan '.$bulan['nama_bulan']);
					redirect('siswa/kehadiran');	
				}
			}else{
				redirect('siswa/kehadiran');	
			}
		}else{
			redirect('siswa/kehadiran');
		}
	}

}

/* End of file Kehadiran.php */
/* Location: ./application/controllers/Siswa/Kehadiran.php */