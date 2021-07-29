<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
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

		    $data['user'] = $user = $this->adminm->get_user();

		   
		
            $data['header'] = array(
			 'title' => "Admin Dashboard",
		    );
		    
	
		    $data['total_tx'] = $this->db->select('*, count(*) as total')->from('transactions')->get()->row();
		    $data['transactions'] = $this->transactions();
		    $data['earnings'] = $this->earnings();
		    $data['totalusers'] = $this->adminm->listusers();
		    $data['blockedusers'] = $this->adminm->blockedusers();
		    $data['activeusers'] = $this->adminm->activeusers();

            $this->load->view('admin/_template/header',$data);
     		$this->load->view('admin/_template/navbar');
     		$this->load->view('admin/home',$data);
     		$this->load->view('admin/_template/footer');
	}

	public function transactions()
    {
    	return $this->db->select('*')->from('transactions')->get()->result();
    }
    public function earnings()
    {
    	return $this->db->select('*,sum(amount) total_earned')->from('transactions')->where('status','success')->get()->row();
    }
}
