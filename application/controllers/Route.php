<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route extends CI_Controller {

	public function index($redirection=false)
	{
		
		if($redirection)
		{
			if($this->config_data->check_redirection($redirection))
			{
				$data_connection = $this ->config_data->get_data_connection($redirection);
				
				$url = implode($data_connection);
				header("Location:".$url);
			}
			else
			{
				$data = array("heading"=>"REDIRECCIÓN NO VALIDA",
						      "message"=>"La redirección especificada no existe.");
				$this->load->view("errors/html/error_general",$data);
			}
		}
		else
		{
			$data = array("heading"=>"REDIRECCIÓN NO VALIDA",
						  "message"=>"Debe especificar una redirección válida. Debe especificar una redirección obligatoriamente.");
			$this->load->view("errors/html/error_general",$data);
		}
		

	}

}