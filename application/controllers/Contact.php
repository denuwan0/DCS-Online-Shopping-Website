<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct() {
        parent::__construct();
		
		$this->load->model('Base_model');
		
    }
	
	public function index()
	{		
		$phparray = $this->Base_model->company_contact();
		
		
		$this->load->view('/Template/Header',$phparray);	
		$this->load->view('/Contact/Contact',$phparray);
		$this->load->view('/Template/Footer',$phparray);
	}
}
