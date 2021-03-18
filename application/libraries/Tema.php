<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tema
{
	
	function show($view, $data = array())
	{
		$CI = &get_instance();
		$CI->load->library('Session'); 

		// Load header
		$CI->load->view('template/membros/header', $data);

		// Load menu
		$CI->load->view('template/membros/menu', $data);

		// Load content
		$CI->load->view($view, $data);

		// Load footer
		$CI->load->view('template/membros/footer', $data);

		// Scripts
		$CI->load->view('template/membros/scripts', $data);
	}
}

/* End of file Template.php */

/* Location: ./system/application/libraries/Template.php */