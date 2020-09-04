<?php 

function justSiswaCanAccessThis()
{
	$CI=get_instance();
	$id_user=$CI->session->userdata('id_user');
	$role_id=$CI->session->userdata('role_id');
	$siswa=$CI->db->get_where('tbl_siswa',['user_id' => $id_user]);
	if ($role_id==4) {
		if ($siswa->num_rows()>0) {
			return TRUE;
		}else{
			$CI->session->set_flashdata('error','Lengkapi identitas anda terlebih dahulu');
			redirect('siswa/identitas/create');
		}
	}else{
		redirect('blocked');
	}
}

if (!function_exists('redirectIfThisSiswaExists')) {
	function redirectIfThisSiswaExists()
	{
		$CI = get_instance();

		$user_id = $CI->session->userdata('id_user');
		$role_id = $CI->session->userdata('role_id');

		if ($role_id=='4') {
			$siswa = $CI->db->get_where('tbl_siswa',['user_id' => $user_id])->num_rows();	
			
			if ($siswa>0) {
				redirect('siswa');
			}else{
				return TRUE;
			}

		}else{
			redirect('blocked');
		}
	}
}