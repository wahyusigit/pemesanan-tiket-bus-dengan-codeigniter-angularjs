<?php
class Jadwalmod extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getDatas(){
		$que = $this->db->get('jadwal');
		return $que->result_array();
	}
}
?>