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

//Auth
$route['login'] = 'Auth/Login';
$route['forgot-password'] = 'Auth/Forgot_Password';
$route['logout'] = 'Auth/Logout';

/****************************************************
*					 Admin
*****************************************************/
//Admin
$route['admin'] = 'Admin/Dashboard';
//Master
$route['admin/crud'] = 'Admin/Crud/Master';

########## Crud ##########
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
########## Crud ##########
/****************************************************/

/****************************************************
*					 Pembimbing
*****************************************************/
//Pembimbing
$route['pembimbing'] = 'Pembimbing/Home';
/****************************************************/
/****************************************************
*					 Siswa
*****************************************************/
//Siswa
$route['siswa'] = 'Siswa/Home';
$route['siswa/jurnal'] = 'Siswa/Jurnal';
//Siswa/Identitas
$route['siswa/identitas'] = 'Siswa/Identitas';
$route['siswa/identitas/create'] = 'Siswa/Identitas/create';
$route['siswa/identitas/lengkapi-identitas'] = 'Siswa/Identitas/create';
$route['siswa/identitas/store'] = 'Siswa/Identitas/store';

//Siswa/Kehadiran
$route['siswa/kehadiran/(:any)'] = 'Siswa/Kehadiran/bulan/$1';
$route['siswa/kehadiran/create'] = 'Siswa/Identitas/create';
$route['siswa/kehadiran/lengkapi-identitas'] = 'Siswa/Identitas/create';
$route['siswa/kehadiran/store'] = 'Siswa/Identitas/store';
/****************************************************/
/****************************************************
*						User
*****************************************************/
$route['user/settings/change-password'] = 'User/Settings/Change_Password';
/****************************************************/

$route['blocked'] = 'Blocked';