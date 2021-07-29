<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('adminm','walletm'));
	}

	
	public function index()
	{
		if (!$this->adminm->is_admin()=='admin') {
			redirect('admin/auth/login');
		}

		if (isset($_POST['block'])) {
			$where = array('uid' => $this->input->post('user_id'), );
			$data = array('blocked' => 'yes', );
			$query = $this->db->update('users',$data,$where);
			if ($query) {
				
			}
		}
		$data['user'] = $user = $this->adminm->get_user();
       $data['header'] = array(
			'title' => " Users", 
		);
		$data['allusers'] = $this->adminm->allusers();

        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/users/home',$data);
		$this->load->view('admin/_template/footer');
		
	}
	public function vw($user_id)
	{
	    $data['message'] = '';
		if (!$this->adminm->is_admin()=='admin') {
			redirect('admin/auth/login');
		}
		$data['user'] = $user = $this->adminm->get_user();
       $data['header'] = array(
			'title' => " Users", 
		);
		
		if (isset($_POST['fundwallet'])) {
         	# code...
         	$user_id = $this->input->post('client_id');
         	$amount = $this->input->post('amount');
         	$fund = $this->walletm->updatewallet($user_id,$amount,'cr');
         	
         		$data['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <p class="mb-0">
                                                Successfully Funded Wallet
                                            </p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
         
         }
		$data['clients'] = $this->adminm->_getuser($user_id);

        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/users/view',$data);
		$this->load->view('admin/_template/footer');
		
	}

	public function blocked()
	{
		if (!$this->adminm->is_admin()=='admin') {
			redirect('admin/auth/login');
		}

		if (isset($_POST['unblock'])) {
			$where = array('uid' => $this->input->post('user_id'), );
			$data = array('blocked' => 'no', );
			$query = $this->db->update('users',$data,$where);
			if ($query) {
				
			}
		}

		$data['user'] = $user = $this->adminm->get_user();
       $data['header'] = array(
			'title' => "Blocked Users", 
		);
		$data['blockedusers'] = $this->adminm->blocked();
        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/users/blockedusers',$data);
		$this->load->view('admin/_template/footer');
		
	}
}