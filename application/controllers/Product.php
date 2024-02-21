<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct() {
        parent::__construct();
		
		$this->load->model('Base_model');
    }
	
	public function index()
	{	
		$phparray = $this->Base_model->company_contact();
		$this->load->view('/Template/Header',$phparray);	
		$this->load->view('/Product/Product');
		$this->load->view('/Template/Footer',$phparray);
	}
	
	public function detail($id)
	{	
			
		$data = $this->Base_model->product_details($id);
		//var_dump($data);
				
		$phparray = $this->Base_model->company_contact();
		
		$this->load->view('/Template/Header',$phparray);	
		$this->load->view('/Product/Product',$data);
		$this->load->view('/Template/Footer',$phparray);
	}
		
	
}
