<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataplans extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('adminm','plansm'));
	}

	
	public function index()
	{
		$data['message'] = "";
		if (!$this->adminm->is_admin()=='admin') {
			redirect('admin/auth/login');
		}
       
	       if (isset($_POST['addplan'])) {
	       	$data = array(
	       		'product_value' => $this->input->post('product_value'), 
	       		'old_price' => $this->input->post('old_price'), 
	       		'current_price' => $this->input->post('current_price'), 
	       		'wallet_price' => $this->input->post('wallet_price'), 
	       		'product_type' => 'data', 
	       		'product_id' => $this->input->post('product_id'), 
	       		'network_id' => $this->input->post('network_id'),
	       		'network' => $this->input->post('network'), 
	       		'plan_code' => $this->input->post('plan_code'), 
	       	);
	       	$query = $this->db->insert('products',$data);
		       	if ($query) {
		       		# code...
		       	}
	       }

	       if (isset($_POST['rmp'])) {
	       	$where = array('prid' => $this->input->post('plid'), );
	       	$this->db->delete('products',$where);

	       	$data['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <p class="mb-0">
                                                Successfully Deleted Plan
                                            </p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
         

	       }


	   $data['dataplans'] = $this->plansm->allplans();
	   $data['user'] = $user = $this->adminm->get_user();
       $data['header'] = array(
			'title' => " Data Plans", 
		);

        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/plans/home',$data);
		$this->load->view('admin/_template/footer');
		
	}

	public function edit($plid)
	{
		if (!$this->adminm->is_admin()=='admin') {
			redirect('admin/auth/login');
		}

		if (isset($_POST['updateplan'])) {
			$where = array('prid' => $this->input->post('plid'), );
	       	$data = array(
	       		'product_value' => $this->input->post('product_value'), 
	       		'old_price' => $this->input->post('old_price'), 
	       		'current_price' => $this->input->post('current_price'), 
	       		'wallet_price' => $this->input->post('wallet_price'), 
	       		'product_id' => $this->input->post('product_id'),
	       		'network' => $this->input->post('network'), 
	       		'network_id' => $this->input->post('network_id'), 
	       		'plan_code' => $this->input->post('plan_code'), 

	       		
	       		
	       	);
	       	$query = $this->db->update('products',$data,$where);
		       	if ($query) {
		       		# code...
		       	}
	       }
		$data['user'] = $user = $this->adminm->get_user();
        $data['header'] = array(
			'title' => "Data Plans", 
		);
		$data['plan'] = $this->db->select('*')->from('products')->where('prid',$plid)->get()->row();
        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/plans/edit',$data);
		$this->load->view('admin/_template/footer');
		
	}


	
}
