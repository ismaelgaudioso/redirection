<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_data extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function getTestData()
	{
		return $this->db->get("config")->result();
	}

	public function check_redirection($redirection)
	{
		$sql = 'SELECT * FROM config WHERE (config_type="redirection" OR config_type="redirection_ssl") AND config_name="'.$redirection.'" LIMIT 1';
		$query_result = $this->db->query($sql)->result();

		if(count($query_result))
			return True;
		else 
			return False;
	}

	public function get_data_connection($redirection)
	{
		$data_connection = array();

		$sql = 'SELECT * FROM config WHERE config_id=1 LIMIT 1';
		$query_result = $this->db->query($sql)->result();
		$ip = $query_result[0]->config_value;

		$sql = 'SELECT * FROM config WHERE (config_type="redirection" OR config_type="redirection_ssl") AND config_name="'.$redirection.'" LIMIT 1';
		$query_result = $this->db->query($sql)->result();

		if($query_result[0]->config_type == "redirection_ssl")
			$data_connection["protocol"] = "https://";
		else
			$data_connection["protocol"] = "http://";
		$data_connection["ip"] = $ip;
		$data_connection["port"] = ":".$query_result[0]->config_value;
		

		return $data_connection;
	}

	public function updateIp($ip)
	{
		$update = "UPDATE config SET config_value=".$ip." WHERE config_id=1";
	}

}