<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller {

	public function index()
	{
		$this->load->view("control");
	}

	public function updateIp($ip)
	{
		echo "IP: ".$this->input->ip_address();
	}
}