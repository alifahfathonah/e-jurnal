<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bulan_Prakerin_Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('User/M_User');
        $this->load->model('Pembimbing/M_Pembimbing');
        $this->load->model('Pembimbing/M_Bulan_Prakerin_Siswa','M_Bulan');
        $this->load->model('Common/M_Crud');
        $this->load->helper(['auth','pembimbing']);
        $this->user=$this->M_User->getUserLoginData();
        $this->pembimbing=$this->M_Pembimbing->getPembimbingLoginData();
        justPembimbingCanAccessThis();
        isLoggedIn();
	}

	public function index()
	{
		$data['judul'] = 'Bulan Aktif Prakerin';
        $data['user'] = $this->user;
        $data['pembimbing'] = $this->pembimbing;
        $data['all_bulan'] = $this->M_Bulan->getAllBulan();
        $data['bulan_aktif'] = $this->M_Bulan->getActiveBulan();        
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('pembimbing/bulan-prakerin-siswa/index',$data);
        $this->load->view('layouts/_templates/footer');
	}

	public function edit_total_hari($id_bulan)
	{
		if ($this->form_validation->run($this->_editTotalHariValidate())==FALSE) {
			$data['judul'] = 'Bulan Aktif Prakerin';
	        $data['user'] = $this->user;
	        $data['pembimbing'] = $this->pembimbing;
	        $data['bulan'] = $this->M_Bulan->getBulanById($id_bulan);

	        $this->load->view('layouts/_templates/header',$data);
	        $this->load->view('layouts/_templates/navbar',$data);
	        $this->load->view('layouts/_templates/sidebar',$data);
	        $this->load->view('pembimbing/bulan-prakerin-siswa/edit-total-hari',$data);
	        $this->load->view('layouts/_templates/footer');
		} else {
			$data = ['total_hari' => $this->input->post('total_hari')];
			$this->M_Bulan->update($data,$id_bulan);
			$this->session->set_flashdata('success','Total hari berhasil di set');
			redirect('Pembimbing/Bulan_Prakerin_Siswa');
		}	
	}

	public function activateBulanPrakerin($id_bulan)
	{
		$this->M_Crud->update('tbl_bulan',['is_active' => 1],'id_bulan',$id_bulan);
		$this->session->set_flashdata('success','Bulan prakerin berhasil diaktifkan');
		redirect('Pembimbing/Bulan_Prakerin_Siswa');
	}

	public function nonActivateBulanPrakerin($id_bulan)
	{
		$this->M_Crud->update('tbl_bulan',['is_active' => 0],'id_bulan',$id_bulan);
		$this->session->set_flashdata('success','Bulan prakerin dinonaktifkan');
		redirect('Pembimbing/Bulan_Prakerin_Siswa');
	}

	private function _editTotalHariValidate()
	{
		$this->form_validation->set_rules('total_hari', 'total_hari', 'required|greater_than[27]|less_than[32]',[
			'required' => 'kolom harus diisi',
			'greater_than' => 'nilai total hari harus lebih besar',
			'less_than' => 'nilai total hari harus lebih kecil',
		]);
	}

}

/* End of file Bulan_Prakerin_Siswa.php */
/* Location: ./application/controllers/Pembimbing/Bulan_Prakerin_Siswa.php */