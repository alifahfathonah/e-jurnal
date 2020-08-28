<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kehadiran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/M_User');
		$this->load->model('Siswa/M_Siswa');
		$this->load->model('Siswa/M_Kehadiran');
		$this->load->helper(['auth', 'siswa']);
		$this->user = $this->M_User->getUserLoginData();
		$this->siswa = $this->M_Siswa->getSiswaLoginData();
		isLoggedIn();
		thisSiswaNotExists();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['judul'] = 'Kehadiran';
		$data['user'] = $this->user;
		$data['siswa'] = $this->siswa;
		$data['some_bulan'] = $this->M_Kehadiran->getSomeBulan(['agustus', 'september', 'oktober']);
		$data['bulan_sekarang'] = date('F');
		$this->load->view('layouts/_templates/header', $data);
		$this->load->view('layouts/_templates/navbar', $data);
		$this->load->view('layouts/_templates/sidebar', $data);
		$this->load->view('siswa/kehadiran/index', $data);
		$this->load->view('layouts/_templates/footer');
	}

	public function bulan($slug = '')
	{
		if ($slug) {
			$bulan = $this->db->get_where('tbl_bulan', ['slug_bulan' => $slug])->row_array();
			$no_bulan_sekarang = date('m');
			$nama_bulan_sekarang = date('F');
			if ($bulan) {
				if ($bulan['no_bulan'] <= $no_bulan_sekarang) {
					$data['judul'] = 'Kehadiran Bulan ' . $bulan['nama_bulan'];
					$data['user'] = $this->user;
					$data['siswa'] = $this->siswa;
					$data['kehadiran_saya'] = $this->M_Kehadiran->getKehadiranBySiswaId()->result_array();
					$data['count_kehadiran_saya'] = $this->M_Kehadiran->countKehadiranBySiswaId();
					$data['all_keterangan_absensi'] = $this->M_Kehadiran->getAllKeteranganAbsensi();
					$data['slug_bulan'] = $bulan['slug_bulan'];
					/////////////////////////////////////////////////////////////////////////////
					// $config['']
					/////////////////////////////////////////////////////////////////////////////
					$this->load->view('layouts/_templates/header', $data);
					$this->load->view('layouts/_templates/navbar', $data);
					$this->load->view('layouts/_templates/sidebar', $data);
					$this->load->view('siswa/kehadiran/kehadiran', $data);
					$this->load->view('layouts/_templates/footer');
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
		$this->_doAbsensi();
		redirect('siswa/kehadiran/bulan/'.$this->input->post('slug_bulan'));
	}

	private function _doAbsensi()
	{
		$siswa_id = $this->input->post('siswa_id');
		$tanggal_absensi = $this->input->post('tanggal_absensi');
		if ($this->M_Kehadiran->isNowAbsensiExists($siswa_id, $tanggal_absensi)->num_rows() > 0) {
			$this->session->set_flashdata('error', 'Absensi hari ini sudah dilakukan');
			redirect('siswa/kehadiran/bulan/'.$this->input->post('slug_bulan'));
		} else {
			if ($tanggal_absensi==date('d-m-Y')) {
				$data = [
					'siswa_id' => $siswa_id,
					'is_active' => '0',
					'keterangan_absensi_id' => $this->input->post('keterangan_absensi_id'),
					'tanggal_absensi' => $tanggal_absensi,
				];
				$this->M_Kehadiran->insert($data);
			}else{
				$this->session->set_flashdata('error', 'Oops absensi kehadiran gagal');
				redirect('siswa/kehadiran/bulan/'.$this->input->post('slug_bulan'));
			}
		}
	}
}

/* End of file Kehadiran.php */
/* Location: ./application/controllers/Siswa/Kehadiran.php */