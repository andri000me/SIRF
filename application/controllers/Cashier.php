<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * summary
 */
class Cashier extends CI_Controller
{
    /**
     * summary
     */

    public $data= [];
	var $username = "";
	var $error = "e";

    public function __construct()
    {
 		parent::__construct();
		$username = $this->session->userdata('username');
		$password = $this->session->userdata('password');
		$this->username = $username;
		$this->pwd = $password;
		// echo $username.$password;

		$this->load->library('session');
		$this->load->model('M_Menu');
		$this->load->model('M_Order');
		$this->load->model('M_Login');     
    }

    public function order($username = ''){
		$data = array(
			'username' => $username, 

		);
		$this->username = $username;
		$query = $this->M_Order->count_order();
		$count=0;
		foreach($query->result_array() as $key){
			$count = $count+1;
		}
		$curdate = Date("d/m/Y");
		$cudat = str_replace('/','',(string)$curdate);
		$id = 'ERP'.$cudat.'-00'.(string)($count+1);
		$data['ID_Reservation'] = $id;
		$data['content'] = $this->M_Menu->show_menu_available();
		$data['content1'] = $this->M_Order->details_order($id);	
        $this->load->view('Cashier/Dashboard',$data);
      	$this->load->view('Cashier/Order',$data);
	}

	public function Menu_List($username = ''){
		$data = array(
			'username' => $username, 
		);
		$data['content'] = $this->M_Menu->show_food();
		$data['content1'] = $this->M_Menu->show_drink();
		$data['content2'] = $this->M_Menu->show_vegetable();
        $this->load->view('Cashier/Dashboard',$data);
      	$this->load->view('Cashier/Menu_List');
	}

	public function Order_List($username = ''){
		$data = array(
			'username' => $username, 
		);
		$data['content'] = $this->M_Order->show_order();
		
        $this->load->view('Cashier/Dashboard',$data);
      	$this->load->view('Cashier/Order_List');
	}

	public function action_add_order($username = '',$ID_Reservation=''){
		$data = array(
			'order_id' => $ID_Reservation,
			'Name' => $this->input->post('nama_paket'),
			'quantity' => $this->input->post('Jumlah')
		);

		if($this->M_Order->add_details_order($data)){
			echo '<script language="javascript">';
			echo 'alert("Data Successfully Added")';
			echo '</script>';
			
			$data['username'] = $username;
			$data['ID_Reservation'] = $ID_Reservation;
			$data['content'] = $this->M_Menu->show_menu_available();
			$data['content1'] = $this->M_Order->details_order($ID_Reservation);
			$this->load->view('Cashier/Dashboard',$data);
 	     	$this->load->view('Cashier/Order');
		}
	}

	public function action_delete_pesanan($id='',$ID_Reservation='',$username=''){
		if($this->M_Order->delete_detail_order($id)){
			echo '<script language="javascript">';
			echo 'alert("Data successfully deleted")';
			echo '</script>';

			$data['ID_Reservation'] = $ID_Reservation;
			$data['username'] = $username;
			$data['content'] = $this->M_Menu->show_menu_available();
			$data['content1'] = $this->M_Order->details_order($ID_Reservation);
			$this->load->view('Cashier/Dashboard',$data);
	 	   	$this->load->view('Cashier/Order');
		}
	}
	
	public function action_ubah_order_detail($username='',$ID_Reservation=''){
		$id = $this->input->post('ID');
		$data = array(
			'Name' => $this->input->post('nama_paket_baru'),
			'quantity' => $this->input->post('Jumlah_Baru')
		);
		// echo "ID = ".$id;
		if($this->M_Order->action_ubah_order_detail($data,$id)){
			echo '<script language="javascript">';
			echo 'alert("Data successfully changed")';
			echo '</script>';

			$data['username'] = $username;
			$data['ID_Reservation'] = $ID_Reservation;
			$data['content'] = $this->M_Menu->show_menu_available();
			$data['content1'] = $this->M_Order->details_order($ID_Reservation);

        	$this->load->view('Cashier/Dashboard',$data);
	 	   	$this->load->view('Cashier/Order');

		}else{
			echo '<script language="javascript">';
			echo 'alert("Failed Data Changed")';
			echo '</script>';
		}
	}

	public function add_order($username='',$ID_Reservation='')
	{
		$now = date("Y-m-d H:i:s");

		$detail = $this->M_Order->get_detail($ID_Reservation);

		$total =0;
		$price = 0;
		foreach($detail->result_array() as $key){
			$quantity = $key['quantity'];
			$name = $key['Name'];

			$query = $this->M_Order->get_price($name);
			$row = $query->row();
			if(isset($row)){
				$price = $row->Price;
			}
			
			$total = $total+ ($quantity*$price);

		}
		// echo $total;
		
		$data = array(
			'ID_Reservation' => $ID_Reservation,
			'user_id'=> $username,
			'no_meja'=> $this->input->post('no_meja'),
			'note' => $this->input->post('note'),
			'date' => $now,
			'total' => $total,
			'status' => "0"
		);

		if($this->M_Order->add_order($data)){
			echo '<script language="javascript">';
			echo 'alert("Data successfully added")';
			echo '</script>';
			
			$log = array(
        		'ID_User' => $username,
        		'Activity' => "Add Order",
        		'Date' => $now
        	);
			$this->M_Login->add_logs($log);
			
			$data['username'] = $username;
			$data['content'] = $this->M_Order->show_order();
			$this->load->view('Cashier/Dashboard',$data);
 	     	$this->load->view('Cashier/Order_List');
		}
	}


	public function Add_Menu($username = ''){
		$data = array(
			'username' => $username, 
		);

		$this->load->view('Cashier/Dashboard',$data);
        $this->load->view('Cashier/Add_Menu');
	}

	public function Action_add_menu($username='')
	{
		//get input from view add_Cashier
		$data = array(
			'Kind' => $this->input->post('Kind'), 
			'Name' => $this->input->post('Name'), 
			'Description' => $this->input->post('Description'), 
			'Price' => $this->input->post('Price'), 
			'Status' => $this->input->post('Status') 
		);

		if($this->M_Menu->Check_unique_Name($data['Name'])){
			echo '<script language="javascript">';
			echo 'alert("Name No Unique")';
			echo '</script>';

			$data['username'] = $username;
			$this->load->view('Cashier/Dashboard',$data);
	        $this->load->view('Cashier/Add_Menu');

		}else{
			if($this->M_Menu->Add_Menu($data)){ //return 1 jika gagal
				echo '<script language="javascript">';
				echo 'alert("Data not added successfully")';
				echo '</script>';
				$data['username'] = $username;

				$this->load->view('Cashier/Dashboard',$data);
	      		$this->load->view('Cashier/Add_Menu');
			}
			else{ //jika return 0 berati tidak ada baris yg terubah
				echo '<script language="javascript">';
				echo 'alert("Data successfully added")';
				echo '</script>';
				$data['username'] = $username;
				$data['content'] = $this->M_Menu->show_food();
				$data['content1'] = $this->M_Menu->show_drink();
				$data['content2'] = $this->M_Menu->show_vegetable();
		        $this->load->view('Cashier/Dashboard',$data);
		      	$this->load->view('Cashier/Menu_List');
			}

		}
	}

	public function Change_Menu($username='',$id='')
	{
		$data = array(
			'username' => $username,
			'ID' => $id
		);

		$data['content'] = $this->M_Menu->show_menu_one($id);

		$this->load->view('Cashier/Dashboard',$data);
      	$this->load->view('Cashier/Change_Menu');
	}

	public function Action_Change_Menu($username='',$id='')
	{
		$data = array(
			'Kind' => $this->input->post('Kind'), 
			'Name' => $this->input->post('Name'), 
			'Description' => $this->input->post('Description'), 
			'Price' => $this->input->post('Price'), 
			'Status' => $this->input->post('Status') 
		);

		if($this->M_Menu->update_menu($data,$id)){
			echo '<script language="javascript">';
			echo 'alert("Data was Successfully Changed")';
			echo '</script>';
			
			$data['username'] = $username; 
			$data['content'] = $this->M_Menu->show_food();
			$data['content1'] = $this->M_Menu->show_drink();
			$data['content2'] = $this->M_Menu->show_vegetable();
			$this->load->view('Cashier/Dashboard',$data);
      		$this->load->view('Cashier/Menu_List');
		}
		
	}

	public function Action_delete_menu($username ='',$id='')
    {
        	$this->M_Menu->delete_menu($id);
            
            echo '<script language="javascript">';
			echo 'alert("Data was Successfully Removed")';
			echo '</script>';

            $data['username'] = $username; 
			$data['content'] = $this->M_Menu->show_food();
			$data['content1'] = $this->M_Menu->show_drink();
			$data['content2'] = $this->M_Menu->show_vegetable();
			$this->load->view('Cashier/Dashboard',$data);
      		$this->load->view('Cashier/Menu_List');
        
    }

    public function Transaction($username='',$ID_Reservation='')
    {
    	$data['Status'] = 1;

    	if($this->M_Order->update_order($data,$ID_Reservation)){
			echo '<script language="javascript">';
			echo 'alert("Data was Successfully Update")';
			echo '</script>';
			
			$detail = $this->M_Order->details_order($ID_Reservation);
			$data['content'] = $detail; 

			$harga = array();
			$total_row = array();
			$total =0;
			$price = 0;

			$i=0;
			foreach($detail->result_array() as $key){
				$quantity = $key['quantity'];
				$name = $key['Name'];

				$query = $this->M_Order->get_price($name);
				$row = $query->row();
				if(isset($row)){
					$price = $row->Price;
					$harga[$i] = $price;
				}
				$total_row[$i] =($quantity*$price); 
				$total = $total+ ($quantity*$price);
				$i++;
			}
			$now = date("Y-m-d H:i:s");
			$data = array(
				'Harga' => $harga, 
				'Total_row' => $total_row, 
				'total' => $total,
				'username' => $username,
				'detail' => $detail,
				'ID_Reservation' => $ID_Reservation,
				'Date' => $now
			);

			$log = array(
        		'ID_User' => $username,
        		'Activity' => "Add Payment + Print Out Transaction",
        		'Date' => $now
        	);
			$this->M_Login->add_logs($log);

			$this->load->view('Cashier/Dashboard',$data);
      		$this->load->view('Cashier/Transaction');
		}
		
    }

}