<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activation extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }
	
	public function index()
	{		
		
		
	}
	
	public function prof($id = 0)
	{
		$rest_api_base_url = 'http://localhost/API/';
		
		$post_endpoint = 'Online/accountActivation'; 
		
		$request_data = json_encode(array("id" => $id));
		
		$response = perform_http_request('POST', $rest_api_base_url . $post_endpoint, $request_data);
				
		//var_dump($response);
		
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
		$this->load->view('/Activation/Activation', $data);
		$this->load->view('/Template/Footer',$phparray);
	}
	
}
