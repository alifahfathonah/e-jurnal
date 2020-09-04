<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/*
| ---------------------------------------------------------------------
| Auth (controllers/Auth)
| ---------------------------------------------------------------------
| berisi controller untuk autentikasi seperti Login(Multilevel)
| reset password(via gmail) dan Logout
*/
$route['login'] = 'Auth/Login';
$route['forgot-password'] = 'Auth/Forgot_Password';
$route['logout'] = 'Auth/Logout';


/*
| ---------------------------------------------------------------------
| Admin (controllers/Admin)
| ---------------------------------------------------------------------
| berisi controller untuk admin dan tempat crud data.
| admin bebas mengatur segalanya termasuk hak akses,crud data dll
*/
$route['admin'] = 'admin/Dashboard';
$route['admin/list-kontak'] = 'admin/List_Kontak';
$route['admin/crud'] = 'admin/crud/Master';


/*
| ---------------------------------------------------------------------
| Crud (controllers/Admin/Crud)
| ---------------------------------------------------------------------
| berisi controller untuk crud data database
*/
//Tbl Absen
$route['admin/crud/tbl-absen'] = 'admin/crud/Tbl_Absen';
$route['admin/crud/tbl-absen/tambah'] = 'admin/crud/Tbl_Absen/tambah';
$route['admin/crud/tbl-absen/update/(:any)'] = 'admin/crud/Tbl_Absen/ubah/$1';
$route['admin/crud/tbl-absen/hapus/(:any)'] = 'admin/crud/Tbl_Absen/hapus/$1';

//Tbl Admin
$route['admin/crud/tbl-admin'] = 'admin/crud/Tbl_Admin';
$route['admin/crud/tbl-admin/tambah'] = 'admin/crud/Tbl_Admin/tambah';
$route['admin/crud/tbl-admin/edit/(:any)'] = 'admin/crud/Tbl_Admin/edit/$1';
$route['admin/crud/tbl-admin/update'] = 'admin/crud/Tbl_Admin/update';
$route['admin/crud/tbl-admin/hapus/(:any)'] = 'admin/crud/Tbl_Admin/hapus/$1';

//Tbl Access Menu
$route['admin/crud/tbl-access-menu'] = 'admin/crud/Tbl_Access_Menu';
$route['admin/crud/tbl-access-menu/tambah'] = 'admin/crud/Tbl_Access_Menu/tambah';
$route['admin/crud/tbl-access-menu/edit/(:any)'] = 'admin/crud/Tbl_Access_Menu/edit/$1';
$route['admin/crud/tbl-access-menu/update'] = 'admin/crud/Tbl_Access_Menu/update';
$route['admin/crud/tbl-access-menu/hapus/(:any)'] = 'admin/crud/Tbl_Access_Menu/hapus/$1';

//Tbl Chat
$route['admin/crud/tbl-chat'] = 'admin/crud/Tbl_Chat';
$route['admin/crud/tbl-chat/hapus/(:any)'] = 'admin/crud/Tbl_Chat/hapus/$1';

//Tbl Siswa
$route['admin/crud/tbl-siswa'] = 'admin/crud/Tbl_Siswa';
$route['admin/crud/tbl-siswa/tambah'] = 'admin/crud/Tbl_Siswa/tambah';
$route['admin/crud/tbl-siswa/edit/(:any)'] = 'admin/crud/Tbl_Siswa/edit/$1';
$route['admin/crud/tbl-siswa/update'] = 'admin/crud/Tbl_Siswa/update';
$route['admin/crud/tbl-siswa/hapus/(:any)'] = 'admin/crud/Tbl_Siswa/hapus/$1';

//Tbl User
$route['admin/crud/tbl-user'] = 'admin/crud/Tbl_User';
$route['admin/crud/tbl-user/tambah'] = 'admin/crud/Tbl_User/tambah';
$route['admin/crud/tbl-user/edit/(:any)'] = 'admin/crud/Tbl_User/edit/$1';
$route['admin/crud/tbl-user/update'] = 'admin/crud/Tbl_User/update';
$route['admin/crud/tbl-user/hapus/(:any)'] = 'admin/crud/Tbl_User/hapus/$1';

//Tbl Submenu
$route['admin/crud/tbl-submenu'] = 'admin/crud/Tbl_Submenu';
$route['admin/crud/tbl-submenu/tambah'] = 'admin/crud/Tbl_Submenu/tambah';
$route['admin/crud/tbl-submenu/edit/(:any)'] = 'admin/crud/Tbl_Submenu/edit/$1';
$route['admin/crud/tbl-submenu/update'] = 'admin/crud/Tbl_Submenu/update';
$route['admin/crud/tbl-submenu/hapus/(:any)'] = 'admin/crud/Tbl_Submenu/hapus/$1';
$route['petugas'] ='admin/crud/Tbl_Petugas';


/*
| ---------------------------------------------------------------------
| Pembimbing (controllers/Pembimbing)
| ---------------------------------------------------------------------
| berisi controller untuk pembimbing (pembimbing prakerin)
*/
$route['pembimbing'] = 'pembimbing/Home';


## Bulan Prakerin Siswa ###
$route['pembimbing/bulan-prakerin-siswa'] = 'pembimbing/Bulan_Prakerin_Siswa';
$route['pembimbing/bulan-prakerin-siswa/edit-total-hari/(:any)'] = 'pembimbing/Bulan_Prakerin_Siswa/edit_total_hari/$1';
$route['pembimbing/bulan-prakerin-siswa/konfirmasi-semua-kehadiran'] = 'pembimbing/Bulan_Prakerin_Siswa';

### Identitas ###
$route['pembimbing/identitas'] = 'pembimbing/Identitas';
$route['pembimbing/identitas/create'] = 'pembimbing/Identitas/create';
$route['pembimbing/identitas/store'] = 'pembimbing/Identitas/store';

## Kegiatan Siswa ###
$route['pembimbing/kegiatan-siswa'] = 'pembimbing/kegiatan_Siswa';
$route['pembimbing/kegiatan-siswa/konfirmasi-kegiatan/(:any)'] = 'pembimbing/kegiatan_Siswa';
$route['pembimbing/kegiatan-siswa/konfirmasi-semua-kehadiran'] = 'pembimbing/Kegiatan_Siswa';

### Kehadiran Siswa ###
$route['pembimbing/kehadiran-siswa'] = 'pembimbing/Kehadiran_Siswa';
$route['pembimbing/kehadiran-siswa/detail-kehadiran-per-bulan/(:any)/(:any)'] = 'pembimbing/Kehadiran_Siswa/detail_kehadiran_per_bulan/$1/$1';

$route['pembimbing/kehadiran-siswa/konfirmasi-kehadiran/(:any)'] = 'pembimbing/Kehadiran_Siswa/confirmKehadiranSiswa/$1';

$route['pembimbing/kehadiran-siswa/konfirmasi-semua-kehadiran'] = 'pembimbing/Kehadiran_Siswa/confirmAllKehadiranSiswa';

$route['pembimbing/kehadiran-siswa/delete/(:any)'] = 'pembimbing/Tugas_Siswa/delete/$1';

### Tugas Siswa ###
$route['pembimbing/tugas-siswa'] = 'pembimbing/Tugas_Siswa';
$route['pembimbing/tugas-siswa/store'] = 'pembimbing/Tugas_Siswa/store';
$route['pembimbing/tugas-siswa/show/(:any)'] = 'pembimbing/Tugas_Siswa/show/$1';
$route['pembimbing/tugas-siswa/edit/(:any)'] = 'pembimbing/Tugas_Siswa/edit/$1';
$route['pembimbing/tugas-siswa/delete/(:any)'] = 'pembimbing/Tugas_Siswa/delete/$1';


/*
| ---------------------------------------------------------------------
| Petugas Monitoring
| ---------------------------------------------------------------------
| berisi controller untuk petugas(siswa prakerin)
*/
$route['petugas'] = 'petugas/Home';

### Kehadiran Siswa ###
$route['petugas/monitoring-kehadiran-siswa'] = 'petugas/Monitoring_Kehadiran_Siswa';
$route['petugas/monitoring-kegiatan-siswa'] = 'petugas/Monitoring_Kegiatan_Siswa';

### Saran Untuk Siswa ###
$route['petugas/saran-untuk-siswa'] = 'petugas/Saran_Siswa';
$route['petugas/saran-untuk-siswa/show/(:any)'] = 'petugas/Saran_Siswa/show_saran/$1';


/*
| ---------------------------------------------------------------------
| Siswa
| ---------------------------------------------------------------------
| berisi controller untuk siswa (siswa prakerin)
*/
$route['siswa'] = 'siswa/Home';
//

### Identitas ###
$route['siswa/identitas'] = 'siswa/Identitas';
$route['siswa/identitas/create'] = 'siswa/Identitas/create';
$route['siswa/identitas/lengkapi-identitas'] = 'siswa/Identitas/create';
$route['siswa/identitas/store'] = 'siswa/Identitas/store';

### Kegiatan ###
$route['siswa/kegiatan'] = 'siswa/Kegiatan';
$route['siswa/kegiatan/create'] = 'siswa/Kegiatan/create_kegiatan';
$route['siswa/kegiatan/detail/(:any)'] = 'siswa/Kegiatan/detail/$1';
$route['siswa/kegiatan/edit/(:any)'] = 'siswa/Kegiatan/update/$1';

### Kehadiran ###
$route['siswa/kehadiran/(:any)'] = 'siswa/Kehadiran/bulan/$1';
$route['siswa/kehadiran/store-absensi'] = 'siswa/Kehadiran/storeAbsensi';

### Saran ###
$route['siswa/saran'] = 'siswa/Saran';

### Tugas ###
$route['siswa/tugas'] = 'siswa/Tugas/index';
// $route['siswa/detail-tugas/(:any)'] = 'siswa/Tugas/detail_tugas/$1';
$route['siswa/detail-tugas/(:any)'] = 'siswa/Tugas/detail_tugas/$1';


/*
| ---------------------------------------------------------------------
| User (controllers/User)
| ---------------------------------------------------------------------
| berisi controller untuk admin dan tempat crud data.
| admin bebas mengatur segalanya termasuk hak akses,crud data dll
*/
$route['user'] = 'user/Home';
$route['user/home'] = 'user/Home';
$route['user/change-password'] = 'user/Change_Password';
$route['user/profile'] = 'user/Profile';
$route['user/profile/edit'] = 'user/Profile/update';


/*
| ---------------------------------------------------------------------
| Blocked Controller
| ---------------------------------------------------------------------
| controller yang bertugas mengalihkan halaman ketika user mencoba-
| mengakses halaman yang tidak diizinkan sesuai hak aksesnya
*/
$route['blocked'] = 'Blocked';