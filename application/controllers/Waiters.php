<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * summary
 */
class Waiters extends CI_Controller
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
        $this->load->view('Waiters/Dashboard',$data);
      	$this->load->view('Waiters/Order',$data);
	}

	public function Menu_List($username = ''){
		$data = array(
			'username' => $username, 
		);
		$data['content'] = $this->M_Menu->show_food();
		$data['content1'] = $this->M_Menu->show_drink();
		$data['content2'] = $this->M_Menu->show_vegetable();
        $this->load->view('Waiters/Dashboard',$data);
      	$this->load->view('Waiters/Menu_List');
	}

	public function Order_List($username = ''){
		$data = array(
			'username' => $username, 
		);
		$data['content'] = $this->M_Order->show_order();
		
        $this->load->view('Waiters/Dashboard',$data);
      	$this->load->view('Waiters/Order_List');
	}

	public function action_add_order($username = '',$ID_Reservation=''){
		$data = array(
			'order_id' => $ID_Reservation,
			'Name' => $this->input->post('nama_paket'),
			'quantity' => $this->input->post('Jumlah')
		);

		if($this->M_Order->add_details_order($data)){
			echo '<script language="javascript">';
			echo 'alert("Data Berhasil ditambah")';
			echo '</script>';
			
			$data['username'] = $username;
			$data['ID_Reservation'] = $ID_Reservation;
			$data['content'] = $this->M_Menu->show_menu_available();
			$data['content1'] = $this->M_Order->details_order($ID_Reservation);
			$this->load->view('Waiters/Dashboard',$data);
 	     	$this->load->view('Waiters/Order');
		}
	}

	public function action_delete_pesanan($id='',$ID_Reservation='',$username=''){
		if($this->M_Order->delete_detail_order($id)){
			echo '<script language="javascript">';
			echo 'alert("Data Berhasil Dihapus")';
			echo '</script>';

			$data['ID_Reservation'] = $ID_Reservation;
			$data['username'] = $username;
			$data['content'] = $this->M_Menu->show_menu_available();
			$data['content1'] = $this->M_Order->details_order($ID_Reservation);
			$this->load->view('Waiters/Dashboard',$data);
	 	   	$this->load->view('Waiters/Order');
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
			echo 'alert("Data Berhasil diubah")';
			echo '</script>';

			$data['username'] = $username;
			$data['ID_Reservation'] = $ID_Reservation;
			$data['content'] = $this->M_Menu->show_menu_available();
			$data['content1'] = $this->M_Order->details_order($ID_Reservation);

        	$this->load->view('Waiters/Dashboard',$data);
	 	   	$this->load->view('Waiters/Order');

		}else{
			echo '<script language="javascript">';
			echo 'alert("Data Gagal diubah")';
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
			echo 'alert("Data Berhasil ditambah")';
			echo '</script>';
			$log = array(
        	'ID_User' => $username,
        	'Activity' => "Add_Order",
        	'Date' => $now
    	    );
			$this->M_Login->add_logs($log);
	    

			$data['content'] = $this->M_Order->show_order();
			$data['username'] = $username;
			$this->load->view('Waiters/Dashboard',$data);
 	     	$this->load->view('Waiters/Order_List');
		}
	}
}