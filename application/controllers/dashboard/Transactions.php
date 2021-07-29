<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('usermodel','transactionsm'=>'tranx'));
	}

	
	public function index()
	{
		if (!$this->usermodel->islogged()) {
			redirect('auth/login');
		}
		
        if(isset($_POST['invest'])) {
        	$this->investmentm->invest($user_id);
        }
        $data['user'] = $user = $this->usermodel->get_user();

        $data['transactions'] = $this->tranx->mytxn($user->uid);
		$data['header'] = array(
			'title' => "Transactions - Subnet", 
		);
		
        $this->load->view('dashboard/_template/header',$data);
        $this->load->view('dashboard/_template/navbar',$data);
		$this->load->view('dashboard/transactions',$data);
		$this->load->view('dashboard/_template/footer');
		
	}
}
