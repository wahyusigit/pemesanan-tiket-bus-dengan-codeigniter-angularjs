<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('rute_model');
		$this->load->helper('url_helper');
	}

	public function handler($model = null,$param = null,$search_val = null){
		if(is_null($model && $param)){
			print_r('null');
		} else {
			switch ($model) {
			    case 'rute':
			    	if (!is_null($param) && $param == 'search') {
			    		$this->searchRute($search_val);
			    	} else {
			    		$this->getRute();	
			    	}
			        
			        break;
			    case 'rute2':
			        echo 'code to be executed if n=label2';
			        break;
			    case 'rute3':
			        echo 'code to be executed if n=label3';
			        break;

			    default:
			        echo 'swirch default ' . $model;
			}
		}
	}

	public function getRute(){
		$que = $this->rute_model->getDatas();
		return print_r(json_encode($que));
	}

	public function findRute($kd_rute){
		$que = $this->rute_model->getDatas();
		return print_r(json_encode($que));
	}

	public function searchRute($search_val){
		$que = $this->rute_model->search($search_val);
		return print_r(json_encode($que));
	}
}
