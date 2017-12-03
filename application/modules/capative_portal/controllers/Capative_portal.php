<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Capative_portal extends MX_Controller {

    private $uamsecret = '123456';
    private $userpassword=1;

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
            'uamport' => $uamport,
            'userurl' => $userurl,
            'challenge' => $challenge
        );
        $this->load->view('login', $loginData);
    }
    
    public function login_action() {
        var_dump($this->input->post());
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $challenge = $this->input->post('challenge');
        $uamip = $this->input->post('uamip');
        $uamport = $this->input->post('uamport');
        $userurl = $this->input->post('userurl');
        $button = $this->input->post('button');
        
        #redirect to uam server with username and papPassword
        $papPassword = $this->encodePap($password, $challenge);
        echo 'http://'.$uamip.':'.$uamport.'/logon?username='.$username.'&password='.$papPassword;
        //redirect('http://'.$uamip.':'.$uamport.'/logon?username='.$username.'&password='.$papPassword, 'refresh');
    }

    public function popup_login($uamip, $uamport) {
        echo 'logging in please wait...' . "$uamip, $uamport";
    }

    private function encodePap($password, $challenge) {
        $newchal = $this->newChalange($challenge);
        //$response = md5("\0" . $password . $newchal);
        $newpwd = pack("a32", $password);
        $pappassword = implode("", unpack("H32", ($newpwd ^ $newchal)));
        return $pappassword;
    }
    
    private function newChalange($challenge) {
        $hexchal = pack("H32", $challenge);
        $newchal = pack("H*", md5($hexchal . $this->uamsecret));
        return $newchal;
    }
    
    private function response($password,$challenge) {
        $newchal = $this->newChalange($challenge);
        $response = md5("\0" . $password . $newchal);
        return $response;
    }

}

?>