<?php 

if (!function_exists('isLoggedIn')) {
	function isLoggedIn()
	{
		$CI = get_instance();
		if (!$CI->session->userdata('id_user')) {
			redirect('login');
		}else{
			$role_id=$CI->session->userdata('role_id');
			$menu=$CI->uri->segment(1);
			$tbl_menu=$CI->db->get_where('tbl_menu',['nama_menu' => strtoupper($menu)])->row_array();
			$menu_id=$tbl_menu['id_menu'];
			$tbl_access_menu=$CI->db->get_where('tbl_access_menu',['menu_id' => $menu_id,'role_id' => $role_id]);
			if ($tbl_access_menu->num_rows()>0) {
				return TRUE;
			}else{
				redirect('blocked');
			}
		}
	}
}