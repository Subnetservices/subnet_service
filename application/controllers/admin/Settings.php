<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('adminm'));
	}

	
	public function index()
	{
		if (!$this->adminm->islogged()) {
			redirect('auth/login');
		}
		$data['user'] = $user = $this->adminm->get_user();

       $data['header'] = array(
			'title' => " Settings", 
		);
		//$this->cookie->
        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/settings',$data);
		$this->load->view('admin/_template/footer');
		
	}


	
}
