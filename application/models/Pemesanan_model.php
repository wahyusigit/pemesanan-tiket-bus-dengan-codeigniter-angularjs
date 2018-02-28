<?php
class Pemesanan_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getDatas(){
		$que = $this->db->get('pemesanan');
		return $que->result_array();
	}

	public function getData($kd_user){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('pemesanan', 'pemesanan.kd_user = user.kd_user');
		$this->db->join('rute', 'rute.kd_rute = pemesanan.kd_rute');
		return $this->db->get()->result();

		// $this->db->where('kd_user',$kd_user);
		// return $this->db->get('pemesanan')->result();
	}
}
?>