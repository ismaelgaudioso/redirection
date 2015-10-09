<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	public function __construct()
        {
                parent::__construct();
        }

	public function index()
	{
		$this->load->helper("date");

		$ip = $this->config_data->get_current_ip();
		$redirections = $this->config_data->get_redirections();
		$data = array(
				"current_ip" =>array("ip" => $ip["address"],
									"last_date" => nice_date(unix_to_human($ip["last_update"],TRUE,'eu'),'d-m-Y h:m:s')),
				"redirections" => $redirections
			);

		$this->load->helper("url");
		$this->load->template("main",$data);
	}
}