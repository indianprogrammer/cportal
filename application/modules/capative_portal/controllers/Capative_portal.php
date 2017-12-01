<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Capative_portal extends MX_Controller {

    public function __Construct() {
        parent::__Construct();
        //$this->load->model('Token_model');
    }

    public function index() {
        $loginData = array(
            'title'=>'Login ISPjet'
        );
        $this->load->view('login',$loginData);
    }

}

?>