<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('usermodel'));
		$this->load->helper('cookie');
	}

	public function index()
	{
			
		$data['header'] = array(
			'title' => "Contact Us - Subnet data", 
			'description' => "We are a data and airtime vtu company", 
			'keywords' => "Mobile data, mtn data, airtel data, glo data, 9mobile data, vtu, airtime, About us", 
		);
        $this->load->view('_template/header',$data);
		$this->load->view('contactus',$data);
		$this->load->view('_template/footer');
	}
}
