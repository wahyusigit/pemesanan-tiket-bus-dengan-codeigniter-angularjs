<?php
class Supirmod extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getDatas(){
		$que = $this->db->get('supir');
		return $que->result_array();
	}
}
?>