<?php 
function thisSiswaNotExists()
{
	$CI=get_instance();
	$id_user=$CI->session->userdata('id_user');
	$role_id=$CI->session->userdata('role_id');
	$siswa=$CI->db->get_where('tbl_siswa',['user_id' => $id_user]);
	if ($role_id==4) {
		if ($siswa->num_rows()<1) {
			$CI->session->set_flashdata('error','Lengkapi identitas anda terlebih dahulu');
			redirect('siswa/identitas/create');
		}
	}
}

function thisSiswaExists()
{
	$CI=get_instance();
	$id_user=$CI->session->userdata('id_user');
	$siswa=$CI->db->get_where('tbl_siswa',['user_id' => $id_user]);
	if ($siswa->num_rows()>0) {
		$CI->session->set_flashdata('error','Anda sudah mengisi identitas');
		redirect('siswa');
	}
}

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
