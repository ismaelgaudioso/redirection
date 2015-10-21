<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
    {
                parent::__construct();
                header('Content-Type: application/json');

                if(!$this->check_apikey($this->input->get("token")))
                	die($this->response(FALSE,"No valid token.",500,true));
                	

    }

    public function test()
    {

    	$this->response(TRUE,"Test passed",200);

    }

    public function updateIp()
    {
        $this->config_data->updateIp($this->input->ip_address());
        $this->response(TRUE,"IP Address updated.",200);
    }


    private function check_apikey($key)
    {
    	$this->load->model("apikey");
    	return $this->apikey->exists_apikey($key);
    }

    private function response($success,$message,$status_code,$return=false)
    {


    	$response = array(
    			"success" => $success,
    			"response" => $message,
    			"status_code" => $status_code,
    		);

    	if($return)
    		return json_encode($response);
    	else
    		echo json_encode($response);

    }


}