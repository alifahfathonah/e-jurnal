<?php 
if (!function_exists('justPembimbingCanAccessThis')) {
	function justPembimbingCanAccessThis()
	{
		$CI = get_instance();

		$user_id = $CI->session->userdata('id_user');
		$role_id = $CI->session->userdata('role_id');

		if ($role_id=='2') {
			$pembimbing = $CI->db->get_where('tbl_pembimbing',['user_id' => $user_id])->num_rows();	
			
			if ($pembimbing>0) {
				return TRUE;
			}else{
				redirect('pembimbing/identitas/create');
			}

		}else{
			redirect('blocked');
		}
	}
}

if (!function_exists('redirectIfThisPembimbingExists')) {
	function redirectIfThisPembimbingExists()
	{
		$CI = get_instance();

		$user_id = $CI->session->userdata('id_user');
		$role_id = $CI->session->userdata('role_id');

		if ($role_id=='2') {
			$pembimbing = $CI->db->get_where('tbl_pembimbing',['user_id' => $user_id])->num_rows();	
			
			if ($pembimbing>0) {
				redirect('pembimbing');
			}else{
				return TRUE;
			}

		}else{
			redirect('blocked');
		}
	}
}