<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('usermodel'));
	}

	public function index()
	{
		
		
		$data['header'] = array(
			'title' => "Welcome - Subnet data", 
			'description' => "Subnet data is one of the largest mobile data and airtime resellers in Nigeria, we are 
                        determined to help you stay connected on your terms. Offering you the best deals, bonuses and more", 
			'keywords' => "Mobile data, mtn data, airtel data, glo data, 9mobile data, vtu, airtime", 
		);
        $this->load->view('_template/header',$data);
		$this->load->view('home',$data);
		$this->load->view('_template/footer');


	}

	public function home()
	{
		
		
		$data['header'] = array(
			'title' => "welcome - Subnet data", 
			'description' => "Subnet data is one of the largest mobile data and airtime resellers in Nigeria, we are 
                        determined to help you stay connected on your terms. Offering you the best deals, bonuses and more", 
			'keywords' => "Mobile data, mtn data, airtel data, glo data, 9mobile data, vtu, airtime", 
		);
        $this->load->view('_template/header',$data);
		$this->load->view('home',$data);
		$this->load->view('_template/footer');

	}
	
}
