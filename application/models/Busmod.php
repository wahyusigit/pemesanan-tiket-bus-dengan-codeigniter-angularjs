<?php
class Busmod extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getDatas(){
		$que = $this->db->get('bus');
		return $que->result_array();
	}
}
?>