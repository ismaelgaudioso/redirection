<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller {

	public function __construct()
    {
                parent::__construct();
                header('Content-Type: application/json');
    }

	
    public function redirection($id)
    {
    	if(!isset($id))
    		echo FALSE;
    	else
    		echo json_encode($this->config_data->get_redirection_with_id($id));
    }

    public function deleteRedirection($id)
    {
        if(!isset($id))
            echo FALSE;
        else
            echo json_encode($this->config_data->delete_redirection($id));
    }

    public function createRedirection($name,$description,$port,$ssl)
    {

        echo json_encode($this->config_data->insert_redirection($name,$description,$port,$ssl));

    }

}