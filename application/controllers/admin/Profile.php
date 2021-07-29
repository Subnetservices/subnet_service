<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
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
        //$data['timetable'] = $this->coursesm->mytimetable($user->id);

        		$data['header'] = array(
			'title' => " Profile", 
		);
		//$this->cookie->
        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/profile',$data);
		$this->load->view('admin/_template/footer');
	}

	public function edit()
	{
		if (!$this->adminm->islogged()) {
			redirect('auth/login');
		}
		
		if (isset($_POST['update'])) {
			$where = array('id' => $_POST['user_id'], );
			$data = array(
				'first_name' => $this->input->post('first_name'), 
				'last_name' => $this->input->post('last_name'), 
				'address' => $this->input->post('address'), 
				'email' => $this->input->post('email'), 
				'phone' => $this->input->post('phone'), 
			);
			$query = $this->db->update('users',$data,$where);
			if ($query) {
				

			}
		}

		if (isset($_POST['update_password'])) {
			$p1 = $this->input->post('password');
			$p2 = $this->input->post('password2');
			if ($p1==$p2) {

				$where = array('id' => $_POST['user_id'], );
				$data = array(
					'password' => md5($p1), 
					);
				$query = $this->db->update('users',$data,$where);
				if ($query) {
					

				}
			}
			
		}

        $data['user'] = $user = $this->adminm->get_user();
       
        		$data['header'] = array(
			'title' => " Edit Profile", 
		);
		//$this->cookie->
        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/edit_profile',$data);
		$this->load->view('admin/_template/footer');
	}
}
