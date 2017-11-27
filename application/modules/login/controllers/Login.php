<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

	public function __Construct()
   	{
        parent::__Construct();
        $this->load->model('Login_model');
    }

	public function index(){
		$this->login();		
	}

  public function login(){
    $this->load->view('login');
  }

  public function action_login(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $authData = $this->Login_model->checkAuth($username,$password);
    if(!is_null($authData)){
      switch ($authData->type) {
      case 'manager':
        echo "manager";
        break; 
      
      }

      #set session data


      #redirect user
      redirect('/user');

    }else{
      echo "not found";
    }
  
  }

  public function user(){
    $this->load->view('login_user');
    
  }

  public function admin(){
    $this->load->view('login_admin');
    
  }

  
}
?>