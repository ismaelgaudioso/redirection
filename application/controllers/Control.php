<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends MY_Controller {

	public function __construct()
        {
                parent::__construct();
        }

	public function index()
	{
		$this->load->view("control");
	}

	public function updateIp()
	{
		$this->config_data->updateIp($this->input->ip_address());
		echo $this->input->ip_address();
	}
	public function test()
	{
		$test = $this->config_data->getTestData();
		echo "<pre>";
		var_dump($test);

	}
}