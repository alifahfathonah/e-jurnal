<?php 
if (!function_exists('sapa')) {
	function greetings()
	{
		$CI = get_instance();
		date_default_timezone_set('Asia/Jakarta');
		$time_now=date('His');
		if ($time_now>=000000 && $time_now<=100000) {
			$say='Selamat Pagi';
		}elseif($time_now>=100000 && $time_now<=140000){
			$say='Selamat Siang';
		}elseif($time_now>=140000 && $time_now<=180000){
			$say='Selamat Sore';
		}elseif($time_now>=180000 && $time_now<=235959){
			$say='Selamat Malam';
		}else{
			$say="Hello";
		}
		return $CI->session->set_flashdata('greetings',$say);
	}
}