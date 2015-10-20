<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends MY_Controller {

	public function __construct()
        {
                parent::__construct();
        }

	public function index()
	{
		$this->load->helper("date");
		$this->load->model("apikey");
		$data = array(
				"page_title"=>"Configuration",
				"js" => array(base_url("assets/js/clients-view.js")),
				"apikeys" => $this->apikey->get_apikeys(),

			);

		$this->load->template("clients",$data);
	}

	
}