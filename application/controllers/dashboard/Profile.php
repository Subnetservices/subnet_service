<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('usermodel'));
	}

	
	public function index()
	{
		$data['password_message'] = "";
		$data['profile_message'] = "";
		if (!$this->usermodel->islogged()) {
			redirect('auth/login');
		}
		
		$data['user'] = $user = $this->usermodel->get_user();
		
		if (isset($_POST['updateprofile'])) {
		    
			$where = array('uid' => $user->uid, );
			$data = array(
				'full_name' => $this->input->post('full_name'),
			//	'address' => $this->input->post('address'), 
		    	'dob' => $this->input->post('birthday'), 
				'phone' => $this->input->post('phone'), 
			);
			$query = $this->db->update('users',$data,$where);
			if ($query) {
			    $data['password_message'] = "";
					$data['profile_message'] = '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Profile Updated Successfully</span>
                        </div>';
				}
		}

		if (isset($_POST['updatepassword'])) {
		    
			$p1 = $this->input->post('password');
			$p2 = $this->input->post('password2');
			if ($p1==$p2) {

				$where = array('uid' => $_POST['user_id'], );
				$data = array(
					'password' => md5($p1), 
					);
				$query = $this->db->update('users',$data,$where);
				if ($query) {
					$data['profile_message'] = "";
					$data['password_message'] = '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Password Changed Successfully</span>
                        </div>'; 
				}
			}else{
				$data['password_message'] = '<div class="alert alert-danger alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Password Do not match</span>
                        </div>';
			}
			
		}

        $data['user'] = $user = $this->usermodel->get_user();

        		$data['header'] = array(
			'title' => "Profile - Subnet", 
		);
		//$this->cookie->
        $this->load->view('dashboard/_template/header',$data);
		$this->load->view('dashboard/_template/navbar');
		$this->load->view('dashboard/profile',$data);
		$this->load->view('dashboard/_template/footer');
	}

	public function edit()
	{
		if (!$this->usermodel->islogged()) {
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

        $data['user'] = $user = $this->usermodel->get_user();
       
        		$data['header'] = array(
			'title' => " Edit Profile", 
		);
		//$this->cookie->
        $this->load->view('dashboard/_template/header',$data);
		$this->load->view('dashboard/_template/navbar');
		$this->load->view('dashboard/edit_profile',$data);
		$this->load->view('dashboard/_template/footer');
	}
}
