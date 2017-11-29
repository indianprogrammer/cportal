<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

    private $uamsecret = '123456';
    private $userpassword = 1;
    private $loginpath = '/';

    public function __Construct() {
        parent::__Construct();
        //$this->load->model('Login_model');
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



        $p1Data = array(
            'chillispot' => 'ChilliSpot',
            'title' => 'title here',
            'wait_msg' => 'ChilliSpot',
            'login' => 'Login',
            'logout' => 'Logout'
        );
        $this->load->view('p1_mobile', $p1Data);
    }

    #@ajax
    public function request_opt() {
        $mobileNo = $this->input->post('mobile_no');
        #generate random number
        $otp = rand(1100, 9999);
        #save it to database with mobile number
        $this->load->model('Otp_model');
        if ($this->Otp_model->saveOtp($mobileNo, $otp)) {
            #send it to mobile
        }
    }

    #@ajax
    public function activate_plan() {
        $mobileNo = $this->input->post('mobile_no');
        $otp = $this->input->post('otp');
        $tokenNo = $this->input->post('token_no');
        #varify otp
        $flagOtp = $this->varifyOtp($mobileNo, $otp);

        if($flagOtp){
            echo 'prob';
            #if correct otp then only varify token
            $flagToken = $this->varifyToken($tokenNo);
            if($flagToken){
                #activate user's plan ()
                $tokenId = $flagToken->id;
                $this->activateUserPlan($mobileNo,$tokenId);
            } 
        }
    }
    
    private function activateUserPlan($mobileNo,$tokenId) {
        #user activation
        echo "user activated $mobileNo $tokenId";
    }

    private function varifyToken($tokenNo) {
        #check if token exist  and unused
        $this->load->model('Token_model');
        return $this->Token_model->varifyToken($tokenNo);        
    }

    private function varifyOtp($mobileNo, $otp) {
        #varify otp and delete
        $this->load->model('Otp_model');
        return $this->Otp_model->varifyOtp($mobileNo, $otp);
    }

    ############################################################################

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

}

?>