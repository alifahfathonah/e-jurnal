<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_Password extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/M_User');
		$this->load->model('Siswa/M_Siswa');
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		$this->siswa=$this->M_Siswa->getSiswaLoginData();
		isLoggedIn();
	}

	public function index()
	{
		if ($this->form_validation->run($this->_changePasswordValidate())==FALSE) {
			$data['judul'] = 'Ubah Katasandi';
			$data['user'] = $this->user;
			$data['siswa'] = $this->siswa;
			$this->load->view('layouts/_templates/header',$data);
			$this->load->view('layouts/_templates/navbar',$data);
			$this->load->view('layouts/_templates/sidebar',$data);
			$this->load->view('user/settings/change-password',$data);
			$this->load->view('layouts/_templates/footer');
		}else{
			$this->_changePassword();
		}
	}

	private function _changePassword()
	{
		$id_user = $this->session->userdata('id_user');
		$password = $this->input->post('password');
		$this->M_User->update($id_user,['password' => password_hash($password, PASSWORD_DEFAULT)]);
		$this->session->set_flashdata('success','Password berhasil diubah');
		redirect('user/settings/change-password');
	}

	private function _changePasswordValidate()
	{
		$this->form_validation->set_rules('password', 'password', 'required|min_length[4]',[
			'required' => 'password harus diisi',
			'min_length' => 'password terlalu pendek',
		]);
	}

}

/* End of file Change_Password.php */
/* Location: ./application/controllers/User/Settings/Change_Password.php */