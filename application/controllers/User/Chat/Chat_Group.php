<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_Group extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Siswa/M_Siswa','User/M_User','User/Chat/M_Chat_Group']);
		$this->load->helper(['auth']);
		$this->user=$this->M_User->getUserLoginData();
		$this->siswa=$this->M_Siswa->getSiswaLoginData();
		isLoggedIn();
	}

    public function index()
    {
    	$data['judul'] = 'Chat';
		$data['user'] = $this->user;
		$data['siswa'] = $this->siswa;
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('user/chat/chat_group',$data);
        $this->load->view('layouts/_templates/footer');
    }

    public function loadMessage()
    {
    	$id_user=$this->session->userdata('id_user');
    	$data=$this->M_Chat_Group->allMessage();
    	foreach ($data as $message) {
    		if ($message['user_id']==$id_user) {
    			$msg="<div class='direct-chat-msg right'>
	                    <div class='direct-chat-infos clearfix'>
	                      <span class='direct-chat-name float-right'>".$message['username']."</span>
	                      <span class='direct-chat-timestamp float-left'>".date('Y-m-d | h:i:s',strtotime($message['created_at']))."</span>
	                    </div>
	                 	
	                    <img class='direct-chat-img' src='".base_url('assets/img/profile/user.png')."' alt=''>
	                    
	                    <div class='direct-chat-text'>
	                      ".$message['isi_chat']."
	                    </div>
	                    
	                  </div>";
    		}else{
    			$msg="<div class='direct-chat-msg'>
	                    <div class='direct-chat-infos clearfix'>
	                      <span class='direct-chat-name float-left'>".$message['username']."</span>
	                      <span class='direct-chat-timestamp float-right'>".date('Y-m-d | h:i:s',strtotime($message['created_at']))."</span>
	                    </div>
	                  
	                    <img class='direct-chat-img' src='".base_url('assets/img/profile/user1.png')."' alt=''>
	                  
	                    <div class='direct-chat-text'>
	                       ".$message['isi_chat']."
	                    </div>
	      
	                  </div>";
    		}
    		echo $msg;
    	}
    }

    public function sendMessage()
    {
    	if ($this->form_validation->run($this->_sendMessageValidate())==TRUE) {
    		$id_user=$this->session->userdata('id_user');
	    	$data=['user_id' => $id_user,
	    		   'isi_chat' => $this->input->post('isi_chat'),];
	    	$this->M_Chat_Group->sendMessage($data);		
    	}else{
    		echo json_decode(['message' => 'gagal mengirim pesan']);
    	}
    }

    private function _sendMessageValidate()
    {
    	$this->form_validation->set_rules('isi_chat', 'isi_chat', 'required');
    }

}

/* End of file Chat_Group.php */
/* Location: ./application/controllers/User/Chat/Chat_Group.php */