<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Order extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function count_order()
	{
		$curdate = date("Y-m-d");
 		$this->db->select('*');
		$this->db->from('orders');
		$this->db->where('date',$curdate);
		$query = $this->db->get();

		return $query;
	}

	public function details_order($id_reservation='')
	{
		$this->db->select('*');
		$this->db->from('order_details');
		$this->db->where('order_id',$id_reservation);
		$query = $this->db->get();
		return $query;
	}

	public function add_details_order($data)
	{
		return $this->db->insert('order_details',$data); //insert data
	}

	public function delete_detail_order($id){
		$this->db->where('id', $id);
        return $this->db->delete('order_details');
	}

	public function action_ubah_order_detail($data,$id)
    {
        $this->db->where('id', $id);
        return $this->db->update('order_details',$data);
    }

    public function add_order($data)
    {
        return $this->db->insert('orders',$data); 
        //insert data
    }

    public function get_detail($id_reservation=''){
    	$this->db->select('*');
		$this->db->from('order_details');
		$this->db->where('order_id',$id_reservation);
		$query = $this->db->get();

		return $query;
    }

    public function get_price($name){
		$this->db->select('Price');
		$this->db->from('Menu');
		$this->db->where('Name',$name);
		$query = $this->db->get();

		return $query;
    }

    public function show_order(){
    	$this->db->select('*');
		$this->db->from('orders');
		$this->db->where('Status','0');
		$query = $this->db->get();

		return $query;
    }

    public function update_order($data , $id){
        //where username != user
    	$this->db->where('ID_Reservation', $id);
    	if($this->db->update('orders',$data)){
        	return true;
        }
        else{
        	return false;
        }
    }
}