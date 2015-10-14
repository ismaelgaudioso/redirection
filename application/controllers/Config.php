<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends MY_Controller {

	public function __construct()
        {
                parent::__construct();
        }

	public function index()
	{
		$this->load->helper("date");
		$data = array(
				"js" => array(base_url("assets/js/config-view.js")),
				"redirections" => $this->config_data->get_redirections(),
				"current_ip" => $this->config_data->get_current_ip(),

			);
		$this->load->template("config",$data);
	}

	
}