<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Not_found extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('usermodel'));
	}

	
	public function index()
	{
		          
			$data['header'] = array(
			'title' => "Page Not Found", 
		);
       // $this->load->view('dashboard/_template/header',$data);
		$this->load->view('not_found',$data);
		//$this->load->view('dashboard/_template/footer');
	}
}