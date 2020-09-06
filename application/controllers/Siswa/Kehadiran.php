<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kehadiran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/M_User');
		$this->load->model('siswa/M_Siswa');
		$this->load->model('siswa/M_Kehadiran');
		$this->load->helper(['auth', 'siswa']);
		$this->user = $this->M_User->getUserLoginData();
		$this->siswa = $this->M_Siswa->getSiswaLoginData();
		isLoggedIn();
		justSiswaCanAccessThis();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['judul'] = 'Kehadiran';
		$data['user'] = $this->user;
		$data['siswa'] = $this->siswa;
		$data['bulan_aktif'] = $this->M_Kehadiran->getActiveBulan();
		$data['bulan_sekarang'] = date('F');
		$this->load->view('layouts/_templates/header', $data);
		$this->load->view('layouts/_templates/navbar', $data);
		$this->load->view('layouts/_templates/sidebar', $data);
		$this->load->view('siswa/kehadiran/index', $data);
		$this->load->view('layouts/_templates/footer');
	}

	/*
	| -------------------------------------------------------------------------
	| Detail bulan absensi kehadiran
	| -------------------------------------------------------------------------
	| siswa prakerin dapat melihat dan mengisi data absensi kehadiran di bulan 
	| sekarang dan bulan sebelumnya. 
	*/
	public function bulan($slug = '')
	{
		if ($slug) {
			$bulan = $this->db->get_where('tbl_bulan', ['slug_bulan' => $slug])->row_array();
			$no_bulan_sekarang = date('m');
			$nama_bulan_sekarang = date('F');
			if ($bulan) {
				if ($bulan['no_bulan'] <= $no_bulan_sekarang) {
					if ($bulan['is_active']==1) {
						$data['judul'] = 'Kehadiran Bulan ' . $bulan['nama_bulan'];
				
						$data['user'] = $this->user;
						$data['siswa'] = $this->siswa;
						
						$id_siswa=$data['siswa']['id_siswa'];

						$data['slug_bulan'] = $bulan['slug_bulan'];
						$data['no_bulan'] = $bulan['no_bulan'];
						$data['id_bulan'] = $bulan['id_bulan'];

						$data['kehadiran_saya'] = $this->M_Kehadiran->getKehadiranBySiswaAndBulanId($id_siswa,$bulan['id_bulan'])->result_array();
						$data['count_kehadiran_saya'] = $this->M_Kehadiran->countKehadiranBySiswaAndBulanId($id_siswa,$bulan['id_bulan']);
						$data['all_keterangan_absensi'] = $this->M_Kehadiran->getAllKeteranganAbsensi();

						$this->load->view('layouts/_templates/header', $data);
						$this->load->view('layouts/_templates/navbar', $data);
						$this->load->view('layouts/_templates/sidebar', $data);
						$this->load->view('siswa/kehadiran/kehadiran', $data);
						$this->load->view('layouts/_templates/footer');
					}else{	
						redirect('siswa/kehadiran');		
					}
				} else {
					$this->session->set_flashdata('error', 'Kehadiran belum masuk bulan ' . $bulan['nama_bulan']);
					redirect('siswa/kehadiran');
				}
			} else {
				redirect('siswa/kehadiran');
			}
		} else {
			redirect('siswa/kehadiran');
		}
	}

	public function storeAbsensi()
	{	
		//memanggil fungsi _doAbsesnsi
		$this->_doAbsensi();
		$this->session->set_flashdata('info','Absensi berhasil dilakukan');
		redirect('siswa/kehadiran/bulan/'.$this->input->post('slug_bulan'));
	}

	/*
	| -------------------------------------------------------------------------
	| Melakukan Absensi
	| -------------------------------------------------------------------------
	| siswa prakerin melakukan absensi sesuai dengan id_siswa masing-masing 
	*/
	private function _doAbsensi()
	{
		$siswa_id = $this->input->post('siswa_id');
		$id_grup_absensi = $this->input->post('id_grup_absensi');
		$tanggal_absensi = $this->input->post('tanggal_absensi');
		
		if ($this->M_Kehadiran->isNowAbsensiExists($siswa_id, $tanggal_absensi)->num_rows() > 0) {
			$this->session->set_flashdata('error', 'Absensi hari ini sudah dilakukan');
			redirect('siswa/kehadiran/bulan/'.$this->input->post('slug_bulan'));
		} else {
			if ($tanggal_absensi==date('d-m-Y')) {
				if ($id_grup_absensi==date('dmY')) {
					$data = [
						'siswa_id' => $siswa_id,
						'is_active' => '0',
						'keterangan_absensi_id' => $this->input->post('keterangan_absensi_id'),
						'bulan_id' => $this->input->post('bulan_id'),
						'tanggal_absensi' => $tanggal_absensi,
						'id_grup_absensi' => $id_grup_absensi,
					];
					$this->M_Kehadiran->insert($data);
				}else{
					$this->session->set_flashdata('error', 'Oops absensi kehadiran gagal');
					redirect('siswa/kehadiran/bulan/'.$this->input->post('slug_bulan'));
				}
			}else{
				$this->session->set_flashdata('error', 'Oops absensi kehadiran gagal');
				redirect('siswa/kehadiran/bulan/'.$this->input->post('slug_bulan'));
			}
		}
	}
}

/* End of file Kehadiran.php */
/* Location: ./application/controllers/Siswa/Kehadiran.php */