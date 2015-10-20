<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader {
    public function template($template_name, $vars = array(), $return = FALSE)
    {
        if(!isset($vars["page_title"]))
            $vars["page_title"] = "Redirector";

        if(!isset($vars["app_name"]))
            $vars["app_name"] = "Redirector";


        $vars["min_loads"] = array(
                                "min_css"=>array(base_url("assets/css/bootstrap.min.css")),
                                "min_js" =>array(
                                        base_url("assets/js/jquery-2.1.4.min.js"),
                                        base_url("assets/js/bootstrap.min.js"), 
                                    ),
                            );

        if($return):
            $content  = $this->view('templates/header', $vars, $return);
            $content .= $this->view('templates/navbar', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('templates/footer', $vars, $return);
            return $content;
        else:
            $this->view('templates/header', $vars);
            $this->view('templates/navbar', $vars);
            $this->view($template_name, $vars);
            $this->view('templates/footer', $vars);
        endif;
    }
}