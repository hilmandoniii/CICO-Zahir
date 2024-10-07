<?php 

function is_logged_in()
{
	$CI =& get_instance();

	if ( ! $CI->session->userdata('username')) :
		$CI->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
			Akses ditolak!
			</div>');

		redirect('Auth/blocked');
	endif;

}