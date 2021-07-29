<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Birthdays extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('adminm','usermodel'));
	}

	
	public function index()
	{
		if (!$this->adminm->is_admin()=='admin') {
			redirect('admin/auth/login');
		}

		
	   $data['upcoming_birthdays'] = $this->usermodel->coming_birthdays();
	   $data['today_birthdays'] = $this->usermodel->today_birthdays();

	   
     
       $data['header'] = array(
			'title' => " Staff", 
		);
	
        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/birthdays/home',$data);
		$this->load->view('admin/_template/footer');
		
	}
	
    
   

	
}
