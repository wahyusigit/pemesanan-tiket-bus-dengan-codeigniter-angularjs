<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('rute_model');
		$this->load->model('user_model');
		$this->load->helper('url_helper');
	}

	public function index($page = 'index'){
		$this->load->view('pages/landing/' . $page);
	}

	public function pesan(){
		$this->load->view('pages/landing/pesan');
	}

	public function postPesan(){
		// return $this->user_model->store($_POST['user']);
		$user_count = $this->user_model->count();
		$kd_user = "USR" . sprintf('%05d', $user_count + 1);
	
		$data = $_POST['user'];
		$data['kd_user'] = $kd_user;
		$data['jns_user'] = 'pelanggan';
		$data['alamat'] = 'asd';


		header('Content-Type: application/json');
		
		if ($this->user_model->store($data)) {
			echo json_encode(['status'=>'success']);
		} else {
			echo json_encode(['status'=>'error']);
		};
	}
}
