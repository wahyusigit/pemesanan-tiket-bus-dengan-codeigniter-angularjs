<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct() {
		parent::__construct();		
		$this->load->database();   
		$this->load->helper('url');
		$this->load->model('login_model','model');
		$this->load->library('session');
		$this->load->helper('jwt_helper');
	}

	public function handler($slug){
		switch ($slug) {
			case 'checkLoggedIn':
				return $this->checkLoggedIn();
				break;
			
			default:
				# code...
				break;
		}
	}

	public function login(){
		$this->logout();

		$email = $this->input->post('email');
		$password = $this->input->post('password');	
		
		$result = $this->model->login($email, $password );
		
		if ($result)  {
			$token = array();
			$token['id'] = $result->kd_user;

			$this->session->set_userdata('login_state', TRUE);
			$this->session->set_userdata('auth', 'pelanggan');
			$this->session->set_userdata('user', $result);

			$user_data = [
							'token' => JWT::encode($token, 'secret_server_key'),
							'user' => ['kd_user'=>$result->kd_user,
									   'jns_user'=>$result->jns_user
									  ]
						];
			// echo json_encode($user_data);
			print_r($_POST);
		} else {
			print_r($_POST);
			// return http_response_code(401);
		}
	}

	public function login2(){
		$this->logout();

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->model->login($email, $password);
        
        if ($user){
        	$token = array();
			$token['id'] = $user->kd_user;
			$data_user = [
							'token' => JWT::encode($token, 'secret_server_key'),
							'kd_user' => $user->kd_user,
							'email' => $user->email,
							'nm_user' => $user->nm_user,
							'role' => strtoupper($user->jns_user),
						 ];
						 
            echo json_encode($data_user);
        } else {
        	echo json_encode(['message' => 'Wrong email and/or password'], 401);
        }
    }

	public function checkLoggedIn(){
		if (!is_null($this->session->userdata('login_state') && $this->session->userdata('login_state'))) {
			echo(json_encode([true]));
		} else {
			echo(json_encode([false]));
		}
	}

	public function logout(){
		$this->session->unset_userdata('login_state');
		$this->session->unset_userdata('auth');
		$this->session->unset_userdata('user');
		$this->session->sess_destroy();
	}
}
