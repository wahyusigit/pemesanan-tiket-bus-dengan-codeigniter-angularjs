<?php
class Rute_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function getDatas(){
		$que = $this->db->get('rute');
		return $que->result();
	}

	public function getData($kd_rute){
		$this->db->where('kd_rute', $kd_rute);
		return $this->db->get('rute')->result();
	}

	public function search($search_val){
		$this->db->like('kota_asal', $search_val);
		return $this->db->get('rute')->result();
	}
}
?>