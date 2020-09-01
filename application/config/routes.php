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
$route['default_controller'] = 'welcome';
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
$route['admin'] = 'Admin/Dashboard';
$route['admin/crud'] = 'Admin/Crud/Master';


/*
| ---------------------------------------------------------------------
| Crud (controllers/Admin/Crud)
| ---------------------------------------------------------------------
| berisi controller untuk crud data database
*/
//Tbl Admin
$route['admin/crud/tbl-admin'] = 'Admin/Crud/Tbl_Admin';
$route['admin/crud/tbl-admin/tambah'] = 'Admin/Crud/Tbl_Admin/tambah';
$route['admin/crud/tbl-admin/edit/(:any)'] = 'Admin/Crud/Tbl_Admin/edit/$1';
$route['admin/crud/tbl-admin/update'] = 'Admin/Crud/Tbl_Admin/update';
$route['admin/crud/tbl-admin/hapus/(:any)'] = 'Admin/Crud/Tbl_Admin/hapus/$1';

//Tbl Access Menu
$route['admin/crud/tbl-access-menu'] = 'Admin/Crud/Tbl_Access_Menu';
$route['admin/crud/tbl-access-menu/tambah'] = 'Admin/Crud/Tbl_Access_Menu/tambah';
$route['admin/crud/tbl-access-menu/edit/(:any)'] = 'Admin/Crud/Tbl_Access_Menu/edit/$1';
$route['admin/crud/tbl-access-menu/update'] = 'Admin/Crud/Tbl_Access_Menu/update';
$route['admin/crud/tbl-access-menu/hapus/(:any)'] = 'Admin/Crud/Tbl_Access_Menu/hapus/$1';

//Tbl Siswa
$route['admin/crud/tbl-siswa'] = 'Admin/Crud/Tbl_Siswa';
$route['admin/crud/tbl-siswa/tambah'] = 'Admin/Crud/Tbl_Siswa/tambah';
$route['admin/crud/tbl-siswa/edit/(:any)'] = 'Admin/Crud/Tbl_Siswa/edit/$1';
$route['admin/crud/tbl-siswa/update'] = 'Admin/Crud/Tbl_Siswa/update';
$route['admin/crud/tbl-siswa/hapus/(:any)'] = 'Admin/Crud/Tbl_Siswa/hapus/$1';

//Tbl User
$route['admin/crud/tbl-user'] = 'Admin/Crud/Tbl_User';
$route['admin/crud/tbl-user/tambah'] = 'Admin/Crud/Tbl_User/tambah';
$route['admin/crud/tbl-user/edit/(:any)'] = 'Admin/Crud/Tbl_User/edit/$1';
$route['admin/crud/tbl-user/update'] = 'Admin/Crud/Tbl_User/update';
$route['admin/crud/tbl-user/hapus/(:any)'] = 'Admin/Crud/Tbl_User/hapus/$1';

//Tbl Submenu
$route['admin/crud/tbl-submenu'] = 'Admin/Crud/Tbl_Submenu';
$route['admin/crud/tbl-submenu/tambah'] = 'Admin/Crud/Tbl_Submenu/tambah';
$route['admin/crud/tbl-submenu/edit/(:any)'] = 'Admin/Crud/Tbl_Submenu/edit/$1';
$route['admin/crud/tbl-submenu/update'] = 'Admin/Crud/Tbl_Submenu/update';
$route['admin/crud/tbl-submenu/hapus/(:any)'] = 'Admin/Crud/Tbl_Submenu/hapus/$1';
$route['petugas'] ='admin/crud/tbl_petugas';


/*
| ---------------------------------------------------------------------
| Pembimbing (controllers/Pembimbing)
| ---------------------------------------------------------------------
| berisi controller untuk pembimbing (pembimbing prakerin)
*/
$route['pembimbing'] = 'Pembimbing/Home';

### Kegiatan Siswa ###
// $route['pembimbing/kehadiran-siswa'] = 'Pembimbing/Kehadiran_Siswa';
// $route['pembimbing/kehadiran-siswa/konfirmasi-kehadiran'] = 'Pembimbing/Kehadiran_Siswa/confirmKehadiran';
// $route['pembimbing/kehadiran-siswa/delete/(:any)'] = 'Pembimbing/Tugas_Siswa/delete/$1';

### Kehadiran Siswa ###
$route['pembimbing/kehadiran-siswa'] = 'Pembimbing/Kehadiran_Siswa';
$route['pembimbing/kehadiran-siswa/konfirmasi-kehadiran/(:any)'] = 'Pembimbing/Kehadiran_Siswa/confirmKehadiran/$1';
$route['pembimbing/kehadiran/konfirmasi-semua-kehadiran'] = 'pembimbing/kehadiran-siswa/confirmAllKehadiran';
$route['pembimbing/kehadiran-siswa/delete/(:any)'] = 'Pembimbing/Tugas_Siswa/delete/$1';

### Tugas Siswa ###
$route['pembimbing/tugas-siswa'] = 'Pembimbing/Tugas_Siswa';
$route['pembimbing/tugas-siswa/store'] = 'Pembimbing/Tugas_Siswa/store';
$route['pembimbing/tugas-siswa/show/(:any)'] = 'Pembimbing/Tugas_Siswa/show/$1';
$route['pembimbing/tugas-siswa/delete/(:any)'] = 'Pembimbing/Tugas_Siswa/delete/$1';

/*
| ---------------------------------------------------------------------
| Siswa (controllers/Siswa)
| ---------------------------------------------------------------------
| berisi controller untuk siswa (siswa prakerin)
*/
$route['siswa'] = 'Siswa/Home';
$route['siswa/jurnal'] = 'Siswa/Jurnal';

### Identitas ###
$route['siswa/identitas'] = 'Siswa/Identitas';
$route['siswa/identitas/create'] = 'Siswa/Identitas/create';
$route['siswa/identitas/lengkapi-identitas'] = 'Siswa/Identitas/create';
$route['siswa/identitas/store'] = 'Siswa/Identitas/store';

### Kehadiran ###
// $route['siswa/kehadiran/(:any)'] = 'Siswa/Kehadiran/bulan/$1';
$route['siswa/kehadiran/store-absensi'] = 'Siswa/Kehadiran/storeAbsensi';
### Tugas ###
$route['siswa/materi'] = 'Siswa/Tugas';


/*
| ---------------------------------------------------------------------
| User (controllers/User)
| ---------------------------------------------------------------------
| berisi controller untuk admin dan tempat crud data.
| admin bebas mengatur segalanya termasuk hak akses,crud data dll
*/
$route['user/change-password'] = 'User/Change_Password';


/*
| ---------------------------------------------------------------------
| Blocked Controller
| ---------------------------------------------------------------------
| controller yang bertugas mengalihkan halaman ketika user mencoba-
| mengakses halaman yang tidak diizinkan sesuai hak aksesnya
*/
$route['blocked'] = 'Blocked';