<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function getTestData()
	{
		return $this->db->get("config")->result();
	}

}