<?php
class Tbl_menu extends CI_Controller
{

public function __construct()
 {
       parent::__construct();
       $this->load->model('Admin/Crud/M_Tbl_Menu', 'M_Tbl_Menu');
        $this->load->model('User/M_User');
        $this->load->helper(['auth']);
        $this->user=$this->M_User->getUserLoginData();
        isLoggedIn();
 }
public function index()
 {
    $data['tbl_menu']=$this->M_Tbl_Menu->get_all();
    $data['judul'] = 'Data Menu';
    $data['user'] = $this->user;
    $this->load->view('layouts/_templates/header',$data);
    $this->load->view('layouts/_templates/navbar',$data);
    $this->load->view('layouts/_templates/sidebar',$data);
    $this->load->view('admin/crud/tbl_menu/index', $data);
    $this->load->view('layouts/_templates/footer');

 }
 public function hapus($id)
 {
    $this->M_Tbl_Menu->hapus($id);
     $this->session->set_flashdata('message', ' <script>alert("DATA BERHASIL DIHAPUS");</script>');
    redirect ('admin/crud/tbl_menu');
 }
 public function ubah($id)
 {
    $data['menu']=$this->db->get_where('tbl_menu',['id_menu'=>$id])->row_array();
    $data['judul'] = 'Ubah Menu';
    $data['user'] = $this->user;
    $this->load->view('layouts/_templates/header',$data);
    $this->load->view('layouts/_templates/navbar',$data);
    $this->load->view('layouts/_templates/sidebar',$data);
    $this->load->view('admin/crud/tbl_menu/ubah',$data);
    $this->load->view('layouts/_templates/footer');
 }

 public function update()
 {
    $data = array(
            'id_menu' => $this->input->post('id_menu'),
            'nama_menu' => $this->input->post('nama_menu'),
    );
    $this->M_Tbl_Menu->update($data['id_menu'],$data);
    $this->session->set_flashdata('message', ' <script>alert("DATA BERHASIL DIUPDATE");</script>');
    redirect('Admin/Crud/tbl_menu');
 }
 public function tambah()
 { 
    $data['judul'] = 'Tambah Menu';
    $data['user'] = $this->user;
    $this->load->view('layouts/_templates/header',$data);
    $this->load->view('layouts/_templates/navbar',$data);
    $this->load->view('layouts/_templates/sidebar',$data);
    $this->load->view('admin/crud/tbl_menu/tambah',$data);
    $this->load->view('layouts/_templates/footer');
 }
 public function simpan()
 {
    $data = array(
                    'id_menu' => $this->input->post('id'),
                    'nama_menu' => $this->input->post('nama_menu')
    );
    $this->M_Tbl_Menu->tambah($data);
    redirect ('Admin/Crud/tbl_menu');
 }
 public function tambah_submenu($menu_id='')
 {
    $this->form_validation->set_rules('nama_submenu','n','required');
    $this->form_validation->set_rules('icon_submenu','i','required');
    if ($this->form_validation->run()==FALSE) {
        $data['menu_id'] = $menu_id;
        $data['judul'] = 'Tambah Submenu';
        $data['user'] = $this->user;
        $this->load->view('layouts/_templates/header',$data);
        $this->load->view('layouts/_templates/navbar',$data);
        $this->load->view('layouts/_templates/sidebar',$data);
        $this->load->view('admin/crud/tbl_menu/tambah_submenu',$data);
        $this->load->view('layouts/_templates/footer');   
    }else{
        $data = [
                'nama_submenu'  => $this->input->post('nama_submenu'),
                'icon_submenu'  => $this->input->post('icon_submenu'),
                'url_submenu'   => $this->input->post('url_submenu'),
                'menu_id'       => $menu_id,
                'is_active'     => 1,
        ];
        $this->db->insert('tbl_submenu',$data);
        redirect('Admin/Crud/Tbl_menu');
    }
 }


}