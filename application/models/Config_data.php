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

	public function get_current_ip()
	{
		$sql = 'SELECT * FROM config WHERE config_id=1 LIMIT 1';
		$query_result = $this->db->query($sql)->result();
		
		$ip 			= $query_result[0]->config_value;
		$last_update 	= $query_result[0]->last_date;
		
		$result = array("address"=>$ip,"last_update"=>$last_update);

		return $result;	
	}

	public function get_redirections()
	{
		$sql = 'SELECT * FROM config WHERE (config_type="redirection" OR config_type="redirection_ssl")';
		$query_result = $this->db->query($sql)->result();

		return $query_result;
	}

	public function get_redirection_with_id($id)
	{
		$sql = 'SELECT * FROM config WHERE (config_type="redirection" OR config_type="redirection_ssl") and (config_id = '.$id.')';
		$query_result = $this->db->query($sql)->result();

		return $query_result;
	}

	public function updateIp($ip)
	{
		$this->load->helper("date");

		$data = array(
        	'config_value'  => $ip,
        	'lasta_date' => time()
		);
		$this->db->where('config_id',1);
		$this->db->update("config",$data);
	}

	public function delete_redirection($id)
	{
		$this->db->where('config_id',$id);
		$this->db->delete("config");
	}

	public function insert_redirection($name,$description,$port,$ssl)
	{

		if($ssl)
			$type = "redirection_ssl";
		else
			$type = "redirection";

		$data = array(
			'config_type' => $type,
			'config_name' => $name,
			'config_description' => $description,
			'config_value' => $port
		);

		$this->db->insert("config",$data);

	}

}