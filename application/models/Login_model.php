<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
    public $table = 'user';

	
    public function get_all()
    {
		return $this->db->get($this->table)->result();		
    }
	function login($email, $password)
	{
	   $this->db->select('kd_user, email, nm_user, jns_user');
	   $this->db->from('user');
	   $this->db->where('email', $email);
	   $this->db->where('password', $password);
	   $this->db->limit(1);
	 
	   $query = $this -> db -> get();
	 
	   if($query -> num_rows() == 1)
	   {
	     return $query->row();
	   }
	   else
	   {
	     return false;
	   }
	}
	 // public function getRoleName($roleName)
  //   {
  //       return $this->db->where('jns_user', $roleName)->get('Roles')->row();
  //   }
}

?>