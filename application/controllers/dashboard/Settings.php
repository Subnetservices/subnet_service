<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('usermodel'));
	}

	
	public function index()
	{
		if (!$this->usermodel->islogged()) {
			redirect('auth/login');
		}
		$data['user'] = $user = $this->usermodel->get_user();
             $data['header'] = array(
			'title' => " Settings", 
		);
		//$this->cookie->
        $this->load->view('dashboard/_template/header',$data);
		$this->load->view('dashboard/_template/navbar');
		$this->load->view('dashboard/settings',$data);
		$this->load->view('dashboard/_template/footer');
		
	}


	
}
