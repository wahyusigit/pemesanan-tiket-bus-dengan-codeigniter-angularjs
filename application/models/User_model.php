<?php
class User_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getUser(){
		$que = $this->db->get('user');
		return $que->result_array();
	}

	public function store($data){
		$this->db->insert('user', $data);
	}

	public function count(){
		return $this->db->count_all_results('user');
	}
}
?>