<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('error');
                $this->load->view('footer');

	}
}

