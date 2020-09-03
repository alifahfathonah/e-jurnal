<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id_user')) {
			redirect('blocked');
		}
	}

	public function index()
	{
		$data['judul'] = "Login";
		$this->form_validation->set_rules(
			'email',
			'Email',
			'trim|required',
			[
				'required' => 'Email Harus diisi..!'
			]
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required',
			[
				'required' => 'Password Harus diisi..!'
			]
		);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/template_login/header', $data);
			$this->load->view('auth/login', $data);
			$this->load->view('auth/template_login/footer', $data);
		} else {
			$this->prosesLogin();
		}
	}

	/*
	| --------------------------------------------------------
	| Fungsi Untuk Proses Login 
	| --------------------------------------------------------
	*/
	protected function prosesLogin()
	{
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');
		
		$user = $this->db->where('email',$email)->or_where('username',$email)->limit(1)->get('tbl_user')->row_array();
		
		if ($user) {
			if (password_verify($password, $user['password'])) {
				$authorize = $this->db->get_where('tbl_role', ['id_role' => $user['role_id']])->row_array();
				if ($authorize['id_role'] == $user['role_id']) {
					$userdata = ['id_user' => $user['id_user'],'role_id' => $user['role_id']];
					$this->session->set_userdata($userdata); 
					redirect($authorize['login_redirect']);
				} else {
					$this->session->set_flashdata('error', 'Username atau email salah');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('error', 'Password salah');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('error','Login gagal');
			redirect('login');
		}
	}
}
