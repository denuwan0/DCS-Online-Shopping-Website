<?php

class Base_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
	public function is_logged_in(){
		if(!$this->session->userdata('user_id')){
			redirect(base_url().'login');
		}
	}
	
	public function company_contact(){
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
		return $phparray;
	}
    
}//end user model
