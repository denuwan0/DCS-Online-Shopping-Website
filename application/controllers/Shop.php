<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

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
		$this->load->view('/Shop/Shop',$data);
		$this->load->view('/Template/Footer',$phparray);
	}
		
	
}
