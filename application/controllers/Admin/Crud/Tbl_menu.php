<?php
class Tbl_Menu extends CI_Controller
{

public function __construct()
 {
    parent::__construct();
    $this->load->model('admin/crud/M_Tbl_Menu', 'M_Tbl_Menu');
    $this->load->model('user/M_User');
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
            'no_urut_menu' => $this->input->post('no_urut_menu'),
    );
    $this->M_Tbl_Menu->update($data['id_menu'],$data);
    $this->session->set_flashdata('message', ' <script>alert("DATA BERHASIL DIUPDATE");</script>');
    redirect('admin/crud/tbl_Menu');
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
    $this->form_validation->set_rules('nama_menu','nm','required',[
        'required' => 'kolom harus diisi',

    ]);
    $this->form_validation->set_rules('no_urut_menu','num','required|numeric|is_unique[tbl_menu.no_urut_menu]',[
        'required' => 'kolom harus diisi',
        'numeric' => 'isian harus berupa angka',
        'is_unique' => 'nomor urut dilarang sama',
    ]);
    if ($this->form_validation->run() == TRUE) {
        $data = array(
                    'id_menu' => $this->input->post('id'),
                    'nama_menu' => $this->input->post('nama_menu'),
                    'no_urut_menu' => $this->input->post('no_urut_menu'),
        );
        $this->M_Tbl_Menu->tambah($data);
        redirect ('admin/crud/tbl_Menu');   
    } else {
        redirect ('admin/crud/tbl_Menu/tambah');
    }
 }
 public function tambah_submenu($menu_id='')
 {
    $this->form_validation->set_rules('nama_submenu','n','required');
    $this->form_validation->set_rules('icon_submenu','i','required');
    $this->form_validation->set_rules('no_urut_submenu','nus','required|numeric');
    if ($this->form_validation->run()==FALSE) {
        $data['judul'] = 'Tambah Submenu';
        $data['menu_id'] = $menu_id;
        $data['user'] = $this->user;
        $data['submenu_menu'] = $this->db->order_by('no_urut_submenu','ASC')->get_where('tbl_submenu',['menu_id' => $menu_id])->result_array();
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
                'no_urut_submenu'  => $this->input->post('no_urut_submenu')
        ];
        $this->db->insert('tbl_submenu',$data);
        redirect('admin/crud/Tbl_Menu');
    }
 }

    public function update_no_urut_submenu($id_submenu,$menu_id)
    {
        $data = [
            'no_urut_submenu' => $this->input->post('no_urut_submenu'),
        ];
        $this->db->where('id_submenu',$id_submenu)->update('tbl_submenu',$data);
        redirect('admin/crud/Tbl_Menu/tambah_submenu/'.$menu_id);
    }


}