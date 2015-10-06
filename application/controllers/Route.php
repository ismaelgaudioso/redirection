<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route extends CI_Controller {

	public function index()
	{
		$this->load->model("data_model");

		$test = $this->data_model->getTestData();
		echo "<h1>MAIN VIEW</h1>";
		echo "<pre>";
		var_dump($test);

	}

	public function transmission()
	{
		header("Location:http://www.google.ru");
	}
}