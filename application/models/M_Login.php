<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}


	public function can_login($data)
	{
 		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('Username',$data['username']);
		$this->db->where('password',$data['password']);
		$query = $this->db->get();

		return $query;
	}

	public function add_logs($data){
    	if($this->db->insert('log_activity',$data)){
        	return true;
        }
        else{
        	return false;
        }
	}

}

/* End of file m_login.php */
/* Location: ./application/models/m_login.php */