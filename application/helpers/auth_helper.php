<?php 

if (!function_exists('isLoggedIn')) {
	function isLoggedIn()
	{
		$CI = get_instance();
		if (!$CI->session->userdata('id_user')) {
			redirect('login');
		}else{

		}
	}
}