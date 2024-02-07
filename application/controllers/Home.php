<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->helper('url');
    }
	
	public function index()
	{		
		
		$rest_api_base_url = 'http://localhost/API/';
		
		$post_endpoint = 'Company/fetch_active_join'; 
		
		$response = perform_http_request('GET', $rest_api_base_url . $post_endpoint);
				
		$phparray = "";		
		$phpObj = json_decode($response);
		$phparray = (array) $phpObj[0];
		
			$data = array(
			'error'	=>	false,
			'message'	=>	"success"
		);
		
		//json_encode($phparray);
		
		//var_dump($phparray);
		//var_dump($data);
		
		$this->load->view('/Template/Header',$phparray);	
		$this->load->view('/Home/Home',$data);
		$this->load->view('/Template/Footer',$phparray);
	}
		
	public function login()
	{	
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		if($username != null && $password != null){
			$rawCount = 0;
			$query = $this->User_model->validate_user_details($username, $password);
			$rawCount = $query->num_rows();
			$result = $query->result();			
									
			if($rawCount > 0){
				
				$userdata = array(
					'user_id'  => $result[0]->user_id,
					'emp_id'  => $result[0]->emp_id,
					'customer_id'  => $result[0]->customer_id,
					'username'   => $result[0]->username,
					'is_active'   => $result[0]->is_active,
					'logged_in' => TRUE
				);
				
				$this->session->set_userdata($userdata);
				redirect(base_url().'dashboard/', 'refresh');
				
			}
			else{
				$message = "Invalid login details!";
				$this->session->set_flashdata('message',$message);
				$this->session->keep_flashdata('message');
				redirect(base_url(), 'refresh');
			}
						
		}
		else{
			
			$message = "Please fill all required feilds!";
			$this->session->set_flashdata('message',$message);
			$this->session->keep_flashdata('message');
			redirect(base_url(), 'refresh');
			
		}
		
		
	}
}
