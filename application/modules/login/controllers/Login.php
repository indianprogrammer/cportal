<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

    private $uamsecret = '123456';
    private $userpassword = 1;
    private $loginpath = '/';

    public function __Construct() {
        parent::__Construct();
        $this->load->model('Login_model');
    }

    public function index() {
        # Read form parameters which we care about
        $username = $this->input->post('UserName');
        $password = $this->input->post('Password');
        $challenge = $this->input->post('challenge');
        $button = $this->input->post('button');
        $logout = $this->input->post('logout');
        $prelogin = $this->input->post('prelogin');
        $res = $this->input->post('res');
        $uamip = $this->input->post('uamip');
        $uamport = $this->input->post('uamport');
        $userurl = $this->input->post('userurl');
        $timeleft = $this->input->post('timeleft');
        $redirurl = $this->input->post('redirurl');

        # Read query parameters which we care about
        $res = $this->input->get('res');
        $challenge = $this->input->get('challenge');
        $uamip = $this->input->get('uamip');
        $uamport = $this->input->get('uamport');
        $reply = $this->input->get('reply');
        $userurl = $this->input->get('userurl');
        $timeleft = $this->input->get('timeleft');
        $redirurl = $this->input->get('redirurl');



        $formData = array(
            'chillispot' => 'ChilliSpot',
            'title' => 'title here',
            'wait_msg' => 'ChilliSpot',
            'login' => 'Login',
            'logout' => 'Logout'
        );
        $this->load->view('p1_mobile');
    }

    public function login() {
        $this->load->view('login');
    }

    public function action_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $authData = $this->Login_model->checkAuth($username, $password);
        if (!is_null($authData)) {
            switch ($authData->type) {
                case 'manager':
                    echo "manager";
                    break;
            }

            #set session data
            #redirect user
            redirect('/user');
        } else {
            echo "not found";
        }
    }

    public function user() {
        $this->load->view('login_user');
    }

    public function admin() {
        $this->load->view('login_admin');
    }

}

?>