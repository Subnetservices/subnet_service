<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('adminm','supportm','plansm','walletm'));
	}

	
	public function index()
	{
		if (!$this->adminm->is_admin()=='admin') {
			redirect('admin/auth/login');
		}
       
	       if (isset($_POST['addcoupon'])) {
	       	$data = array(
	       		'coupon_code' => $this->input->post('coupon_code'), 
	       		'coupon_amount' => $this->input->post('amount'), 
	       		'available' => $this->input->post('limit'), 
	       	);
	       	$query = $this->db->insert('coupon',$data);
		       	if ($query) {
		       		$data['couponmessage'] = "Successfully Added";
		       	}
	       }


	   $data['dataplans'] = $this->plansm->allplans();
	   $data['coupons'] = $this->walletm->coupons();
	   $data['user'] = $user = $this->adminm->get_user();
       $data['header'] = array(
			'title' => "Coupon Codes", 
		);
		$data['tickets'] = $this->supportm->listsupport();
        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/coupon/home',$data);
		$this->load->view('admin/_template/footer');
		
	}

	public function edit($cpid)
	{
		if (!$this->adminm->is_admin()=='admin') {
			redirect('admin/auth/login');
		}
		$data['user'] = $user = $this->adminm->get_user();



		if (isset($_POST['updatecoupon'])) {
			$where = array('cpid' => $this->input->post('cpid') , );
			$data = array(
				'coupon_code' => $this->input->post('coupon_code'), 
				'coupon_amount' => $this->input->post('coupon_amount'), 
				'available' => $this->input->post('available'), 
			);
			$this->db->update('coupon',$data,$where);
		}
        $data['header'] = array(
			'title' => "Data Plans", 
		);
		$data['coupon'] = $this->db->select('*')->from('coupon')->where('cpid',$cpid)->get()->row();
        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/coupon/edit',$data);
		$this->load->view('admin/_template/footer');
		
	}


	
}
