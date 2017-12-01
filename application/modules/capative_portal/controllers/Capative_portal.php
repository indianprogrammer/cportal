<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Capative_portal extends MX_Controller {

    private $uamsecret = '123456';

    public function __Construct() {
        parent::__Construct();
        //$this->load->model('Token_model');
    }

    public function index() {
        #collect get requestes
        $res = $this->input->get('res');
        $uamip = $this->input->get('uamip');
        $uamport = $this->input->get('uamport');
        $challenge = $this->input->get('challenge');
        $called = $this->input->get('called');
        $mac = $this->input->get('mac');
        $ip = $this->input->get('ip');
        $nasid = $this->input->get('nasid');
        $userurl = $this->input->get('userurl');
        $md = $this->input->get('md');





        $loginData = array(
            'title' => 'Login ISPjet',
            'uamip' => $uamip,
            'uamport' => $uamport
        );
        $this->load->view('login', $loginData);
    }

}

?>