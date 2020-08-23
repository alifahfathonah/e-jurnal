<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tbl_Siswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin/Crud/M_Tbl_Siswa","M_Siswa");	
        $this->load->model('User/M_User');
        $this->load->helper('auth');
        $this->user=$this->M_User->getUserLoginData();
        isLoggedIn();
	}

    public function index()
    {
        $data['judul'] = 'Tabel Siswa';
    	$data['user'] = $this->user;
        $data['all_siswa'] = $this->M_Siswa->getAllSiswa();
    	$this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/crud/tbl_siswa/index',$data);
        $this->load->view('layouts/_templates/footer');
    }

    public function tambah()
    {	
    	if ($this->form_validation->run($this->_tambahSiswaValidate())==FALSE) {
    		$data['judul']            = 'Tambah Data Siswa';
            $data['user']             = $this->user;
    		$data['user_siswa']       = $this->M_Siswa->isUserSiswa();
	    	$data['all_kelas']        = $this->M_Siswa->getAllKelas();
            $data['all_jurusan']      = $this->M_Siswa->getAllJurusan();
            $data['all_perusahaan']   = $this->M_Siswa->getAllPerusahaan();
            $this->load->view('layouts/_templates/header',$data);
	        $this->load->view('layouts/_templates/navbar',$data);
	        $this->load->view('layouts/_templates/sidebar',$data);
	    	$this->load->view('admin/crud/tbl_siswa/tambah',$data);
	    	$this->load->view('layouts/_templates/footer');
    	}else{
    		$data = ['user_id'          =>$this->input->post('user_id'),
                    'kelas_id'          =>$this->input->post('kelas_id'),
                    'jurusan_id'        =>$this->input->post('jurusan_id'),
                    'perusahaan_id'     =>$this->input->post('perusahaan_id'),
                    'nama_siswa'        =>$this->input->post('nama_siswa'),
    				'nis'               =>$this->input->post('nis'),
                    'tempat_lahir'      =>$this->input->post('tempat_lahir'),
                    'tanggal_lahir'     =>$this->input->post('tanggal_lahir'),
                    'jenis_kelamin'     =>$this->input->post('jenis_kelamin'),
                    'alamat_siswa'      =>$this->input->post('alamat_siswa'),
                    'nama_orang_tua'    =>$this->input->post('nama_orang_tua'),
                    'alamat_orang_tua'  =>$this->input->post('alamat_orang_tua'),
                    ];
    		$this->M_Siswa->tambah($data);
    		redirect('admin/crud/tbl-siswa');
    	}
    }

    public function edit($id='')
    {
    	if ($this->form_validation->run($this->_tambahSiswaValidate())==FALSE) {
            $data['judul'] = 'Edit Data Siswa';
            $data['user'] = $this->user;
    		$data['siswa']=$this->M_Siswa->getById($id);
    		$this->load->view('layouts/_templates/header',$data);
	        $this->load->view('layouts/_templates/navbar',$data);
	        $this->load->view('layouts/_templates/sidebar',$data);
	    	$this->load->view('admin/crud/tbl_siswa/edit',$data);
	    	$this->load->view('layouts/_templates/footer');
    	}else{
    		$this->_update();
    	}
    }

    private function _update()
    {
    	$id=$this->input->post('id_siswa');
    	$data =	['nama_siswa'  =>  $this->input->post('nama_siswa'),
    			 'nisn'  =>  $this->input->post('nisn')];
    	$this->M_Siswa->update($id,$data);
    	redirect('admin/crud/tbl-siswa');
    }

    public function hapus($id)
    {
    	$this->M_Siswa->hapus($id);
    	redirect('admin/crud/tbl-siswa');
    }

    private function _tambahSiswaValidate()
    {
        $this->form_validation->set_rules('nama_siswa', 'na', 'required|min_length[2]|max_length[45]');
        $this->form_validation->set_rules('nis', 'ni', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'na', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'ni', 'required');
        $this->form_validation->set_rules('alamat_siswa', 'as', 'required');
        $this->form_validation->set_rules('nama_orang_tua', 'not', 'required');
        $this->form_validation->set_rules('alamat_orang_tua', 'aot', 'required');
    }

}

/* End of file Tbl_Siswa.php */