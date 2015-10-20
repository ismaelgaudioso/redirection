<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apikey extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

    public function exists_apikey($api_key)
    {

    	$sql = 'SELECT * FROM apikeys WHERE api_key="'.$api_key.'" LIMIT 1';
		$query_result = $this->db->query($sql)->result();

		if(count($query_result))
			return True;
		else 
			return False;


    }

    public function get_apikeys()
    {

    	$sql = 'SELECT * FROM apikeys';
		return $this->db->query($sql)->result();

    }

    public function insert_apikey($name)
    {
        $this->load->helper("security");
        $data = array(
            "api_name" => $name,
            "api_key" => do_hash($name."::$$".time(), 'md5'),
            "api_date" => time()

        );

        $this->db->insert("apikeys",$data);

    }

    public function delete_apikey($id)
    {
        $this->db->where('api_id',$id);
        $this->db->delete("apikeys");
    }

    public function regenerate_apikey($id)
    {
        $sql = 'SELECT api_name FROM apikeys WHERE api_id="'.$id.'" LIMIT 1';
        $query_result = $this->db->query($sql)->result();

        $this->load->helper("security");
        $data = array(
            'api_key'  => do_hash($query_result[0]->api_name."::$$".time(), 'md5'),
            'api_date' => time()
        );
        $this->db->where('api_id',$id);
        $this->db->update("apikeys",$data);
    }

}