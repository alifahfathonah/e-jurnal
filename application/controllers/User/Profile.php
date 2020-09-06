<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
  		parent::__construct();
  		$this->load->model('user/M_User');
  		$this->load->helper(['auth']);
  		$this->user=$this->M_User->getUserLoginData();
      isLoggedIn();
	}

  public function index()
  { 
   	  $data['judul'] = 'Profile';
   	  $data['user'] = $this->user;
   	  $this->load->view('layouts/_templates/header',$data);
      $this->load->view('layouts/_templates/navbar',$data);
      $this->load->view('layouts/_templates/sidebar',$data);
      $this->load->view('user/profile',$data);
      $this->load->view('layouts/_templates/footer');
  }
  
  public function edit()
  {
     	$data['judul'] = 'Profile';
     	$data['user'] = $this->user;
      $id_user = $data['user']['id_user'];
     	$data['profile'] = $this->db->get_where('tbl_user',['id_user' => $id_user])->row_array();		
     	$this->load->view('layouts/_templates/header',$data);
      $this->load->view('layouts/_templates/navbar',$data);
      $this->load->view('layouts/_templates/sidebar',$data);
      $this->load->view('user/edit',$data);
      $this->load->view('layouts/_templates/footer');
  }
  
  public function update()
  {
      $data['user'] = $this->user;
      $id_user = $data['user']['id_user'];
      $old_img = $this->input->post('old_img');

      $config['upload_path'] = './assets/img/profile/';
      $config['encrypt_name'] = TRUE;
      $config['allowed_types'] = 'jpg|png|jfif|gif';
      $this->load->library('upload',$config);
      if (!$this->upload->do_upload('gambar')) {
        $this->upload->display_errors();
      }else{
       $filename=$this->upload->data('file_name');
       unlink(FCPATH.'/assets/img/profile/'.$old_img); 
      }
      $data = [
               'image' => $filename,
              ];
      $this->db->where('id_user',$id_user);
      $this->db->update('tbl_user',$data);
      $this->session->set_flashdata('info','Foto profil berhasil diubah');
      redirect('user/Profile');
  }
   
}
