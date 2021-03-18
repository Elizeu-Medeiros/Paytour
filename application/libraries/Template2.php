<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template2
{
	
	function show($view, $data = array())
	{
		$CI = &get_instance();
		$CI->load->library('Session'); 

		// Load header
		$CI->load->view('template/page/header', $data);

		// Load menu
		$CI->load->view('template/page/menu', $data);

		// Load content
		$CI->load->view($view, $data);

		// Load footer
		$CI->load->view('template/page/footer', $data);

		// Scripts
		$CI->load->view('template/page/scripts', $data);
	}
}

/* End of file Template.php */

/* Location: ./system/application/libraries/Template.php */