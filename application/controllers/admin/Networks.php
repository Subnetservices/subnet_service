<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Networks extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('adminm'));
	}

	
	public function index()
	{
		if (!$this->adminm->is_admin()=='admin') {
			redirect('admin/auth/login');
		}
		$data['user'] = $user = $this->adminm->get_user();
       $data['header'] = array(
			'title' => " Data Plans", 
		);
	//	$data['tickets'] = $this->supportm->listsupport();
        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/dataplans',$data);
		$this->load->view('admin/_template/footer');
		
	}

	public function v($ticket_id)
	{
		if (!$this->adminm->is_admin()=='admin') {
			redirect('admin/auth/login');
		}
		$data['user'] = $user = $this->adminm->get_user();
       $data['header'] = array(
			'title' => " Data Plans", 
		);
		$data['ticket'] = $this->supportm->getsupport($ticket_id);
        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/support/view',$data);
		$this->load->view('admin/_template/footer');
		
	}


	
}
