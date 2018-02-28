<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	private $user;

	public function __construct(){
		parent::__construct();
		$this->load->model('rute_model');
		$this->load->model('user_model');
		$this->load->model('pemesanan_model');
		$this->load->helper('url_helper');
		$this->load->library('session');

		if ($this->session->userdata('login_state')) {
			$this->user = $this->session->userdata();
			$this->user = $this->user['user'];
		}
	}

	public function view(){
		return $this->view('pages/pelanggan');
	}

	public function pemesanan(){
		echo json_encode($this->pemesanan_model->getData($this->user->kd_user));
	}

	public function konfirmasi(){

	}

	public function tiket(){

	}

	public function checkAuth(){
		return $this->session->userdata('login_state');
	}
}
