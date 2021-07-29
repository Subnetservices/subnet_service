<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referral extends CI_Controller {
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

		$data['referrals'] = $this->allrefs($user->uid);
		$data['header'] = array(
			'title' => "Referral - Subnet", 
		);
		//$this->cookie->
        $this->load->view('dashboard/_template/header',$data);
        $this->load->view('dashboard/_template/navbar',$data);
		$this->load->view('dashboard/referral',$data);
		$this->load->view('dashboard/_template/footer');
	}

	public function allrefs($user_id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('referrer',$user_id);
		$query = $this->db->get()->result();
		if ($query) {
			return $query;
		}
	}
}
