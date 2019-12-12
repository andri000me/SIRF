<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * summary
 */
class Login extends CI_Controller
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
		$this->load->model('M_Login');
		$this->load->model('M_Menu');
    }

    public function index()
	{
		$data = array(
            'user' => $this->username,
        );
		$this->load->view('login/login',$data);
	}

	public function process(){	
	    $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        
        $now = date("Y-m-d H:i:s");
        $log = array(
        	'ID_User' => $data['username'],
        	'Activity' => "Login",
        	'Date' => $now
        );

        $results = $this->M_Login->can_login($data);

        if($results->num_rows()==1){
			foreach ($results->result() as $row) {
				$data['role'] = $row->Role;
				
			}
			if($data['role'] == '1'){
				$this->M_Login->add_logs($log);
				$data['content'] = $this->M_Menu->show_food();
				$data['content1'] = $this->M_Menu->show_drink();
				$data['content2'] = $this->M_Menu->show_vegetable();
				$this->load->view('Waiters/Dashboard',$data);
				$this->load->view('Waiters/Menu_List',$data);
			}
			else if($data['role'] == '2'){
				$this->M_Login->add_logs($log);
				$data['content'] = $this->M_Menu->show_food();
				$data['content1'] = $this->M_Menu->show_drink();
				$data['content2'] = $this->M_Menu->show_vegetable();
				$this->load->view('Cashier/Dashboard',$data);
				$this->load->view('Cashier/Menu_List',$data);
			}
		}else
		{
			redirect('Login?msg=1');
		}
	}
	
	public function Logout($username=''){
		$now = date("Y-m-d H:i:s");
		$log = array(
        	'ID_User' => $username,
        	'Activity' => "Logout",
        	'Date' => $now
        );
		$this->M_Login->add_logs($log);
	    
	    $this->session->sess_destroy();
		redirect(base_url());
		exit;
	}
}