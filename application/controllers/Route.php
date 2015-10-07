<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route extends CI_Controller {

	public function index()
	{
		
		$test = $this->config_data->getTestData();
		echo "<h1>MAIN VIEW</h1>";
		echo "<pre>";
		var_dump($test);

	}

	public function transmission()
	{
		header("Location:http://www.google.ru");
	}
}