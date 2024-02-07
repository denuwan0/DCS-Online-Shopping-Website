<?php

class User_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
	public function is_logged_in(){
		if(!$this->session->userdata('user_id')){
			redirect(base_url().'login');
		}
	}
    
}//end user model
