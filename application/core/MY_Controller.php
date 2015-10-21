<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{

		parent::__construct();

		$this->lang->load('general');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
		
	}

}