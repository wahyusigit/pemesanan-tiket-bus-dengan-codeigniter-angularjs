<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller {
	public function index()
	{
		$this->load->view('pages/test');
	}

	public function view($halaman = 'test')
	{
		$this->load->view('partials/header');

		$this->load->view('pages/'.$halaman);

		$this->load->view('partials/footer');
	}
}
