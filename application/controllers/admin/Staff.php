<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {
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

		if (isset($_POST['rmu'])) {
			$where = array('uid' => $this->input->post('user_id'), );
			//$where = array('' => $this->input->post('user_id'), );
			$query = $this->db->delete('admin',$where);
			if ($query) {
				# code...
			}
		}
		$data['user'] = $user = $this->adminm->get_user();
       $data['header'] = array(
			'title' => " Staff", 
		);
		$data['allstaff'] = $this->adminm->allstaff();
        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/staff/home',$data);
		$this->load->view('admin/_template/footer');
		
	}
	public function vw($staff_id)
	{
		if (!$this->adminm->is_admin()=='admin') {
			redirect('admin/auth/login');
		}


		$data['user'] = $user = $this->adminm->get_user();
       $data['header'] = array(
			'title' => " Staff", 
		);
		$data['staff'] = $this->adminm->getstaff($staff_id);
        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/staff/view',$data);
		$this->load->view('admin/_template/footer');
		
	}
    
    public function addnew()
	{
		if (!$this->adminm->is_admin()=='admin') {
			redirect('admin/auth/login');
		}
		if (isset($_POST['addstaff'])) {
			# code...
			// $data = array(
			// 	'full_name' => $this->input->post('full_name'), 
			// 	'email' => $this->input->post('email'), 
			// 	'phone' => $this->input->post('phone'), 
			// 	'password' => md5($this->input->post('password')), 
			// );
			// $query = $this->db->insert('admin',$data);

			$create = $this->adminm->createuser();
			if ($create) {
				# code...
			}
		}
		$data['user'] = $user = $this->adminm->get_user();
        $data['header'] = array(
			'title' => " Staff", 
		);
		$data['allstaff'] = $this->adminm->allstaff();
        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/staff/new',$data);
		$this->load->view('admin/_template/footer');
		
	}


	
}
