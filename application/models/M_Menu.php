<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Menu extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function show_menu()
	{
 		$this->db->select('*');
		$this->db->from('menu');

		$query = $this->db->get();

		return $query;
	}

	public function show_menu_available()
	{
 		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where('Status','1');
		$query = $this->db->get();

		return $query;
	}

	public function show_food()
	{
 		$this->db->select('*');
		$this->db->from('menu');
		$this->db->or_where('Kind','Paket');
		$this->db->or_where('Kind','Makanan');
		$query = $this->db->get();

		return $query;
	}

	public function show_drink()
	{
 		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where('Kind','Minuman');
		$query = $this->db->get();

		return $query;
	}

	public function show_vegetable()
	{
 		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where('Kind','Sayuran');
		$query = $this->db->get();

		return $query;
	}

	public function Check_unique_Name($Name) {
        $this->db->where_in('Name', $Name);
        return $this->db->get('menu')->num_rows();
    }

    public function Add_Menu($data)
    {
        $this->db->insert('menu',$data); //insert data
    }

    public function show_menu_one($id){
	    $this->db->where('ID',$id);
	    return $this->db->get('menu');
    }    

    public function update_menu($data , $id){
        //where username != user
    	$this->db->where('ID', $id);
    	if($this->db->update('menu',$data)){
        	return true;
        }
        else{
        	return false;
        }
    }

    public function delete_menu($id){
        $this->db->where('ID', $id);
        $this->db->delete('menu');
    }
}

/* End of file m_login.php */
/* Location: ./application/models/m_login.php */