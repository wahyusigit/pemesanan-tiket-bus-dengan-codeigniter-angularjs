<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('usermod');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['users'] = $this->usermod->getUser();
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		// $this->load->view('pages/test');
	}

	public function view($halaman = 'test')
	{
		$this->load->view('partials/header');

		$this->load->view('pages/'.$halaman);

		$this->load->view('partials/footer');
	}
}
