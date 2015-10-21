<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller {

	public function __construct()
    {
                parent::__construct();
                header('Content-Type: application/json');
                $this->load->model("apikey");
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

    public function createRedirection()
    {

        $ssl = $this->input->post("ssl", TRUE);
        $ssl = $ssl === 'true'? true: false;

        $name = $this->input->post("name", TRUE);
        $description = $this->input->post("description", TRUE);
        $port = $this->input->post("port", TRUE);

        echo json_encode($this->config_data->insert_redirection($name,$description,$port,$ssl));

    }

    public function updateRedirection()
    {

        $ssl = $this->input->post("ssl", TRUE);
        $ssl = $ssl === 'true'? true: false;

        $name = $this->input->post("name", TRUE);
        $description = $this->input->post("description", TRUE);
        $port = $this->input->post("port", TRUE);
        $id = $this->input->post("id", TRUE);

        echo json_encode($this->config_data->update_redirection($id,$name,$description,$port,$ssl));

    }

    public function forceIp()
    {

        $ip = $this->input->post("ip", TRUE);
        echo json_encode($this->config_data->updateIp($ip));

    }

    public function updateIp()
    {
        $this->config_data->updateIp($this->input->ip_address());
        echo json_encode($this->input->ip_address());
    }


    public function createApikey()
    {

        $name = $this->input->post("name", TRUE);

        echo json_encode($this->apikey->insert_apikey($name));

    }

    public function deleteApikey($id)
    {
        if(!isset($id))
            echo FALSE;
        else
            echo json_encode($this->apikey->delete_apikey($id));
    }

    public function regenerateApikey($id)
    {
        if(!isset($id))
            echo FALSE;
        else
            echo json_encode($this->apikey->regenerate_apikey($id));
    }

    public function goRedirection($id)
    {
        if(!isset($id))
            echo FALSE;
        else
            echo json_encode($this->config_data->goRedirection($id));
    }
    

}