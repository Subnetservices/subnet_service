<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loyalties extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('usermodel','loyaltym'));
	}

	
	public function index()
	{
		$data['message'] = "";
		if (!$this->usermodel->islogged()) {
			redirect('auth/login');
		}

		$data['user'] = $user = $this->usermodel->get_user();
         
        if (isset($_POST['redeem'])) {
        	$points = $this->input->post("points");
        	$phone = $this->input->post("phone_number");
        	$network = $this->input->post("network_id");
        	$user_id = $user->uid;
        	$rd  = $this->loyaltym->point_purchase($user_id, $points, $phone, $network);
        	if ($rd=='success') {
        		$data['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <p class="mb-0">
                                                Successfully Redeemed Points
                                            </p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                }else{
                  $data['message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <p class="mb-0">
                                                Operation Unsuccessful
                                            </p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                }
        	//$this->loyaltym->credit_wallet($user_id,$points);
        }
		
		

		$data['loyalty'] = $this->loyaltym->user_points($user->uid);
		$data['header'] = array(
			'title' => "Loyalties - Subnet", 
		);
		//$this->cookie->
        $this->load->view('dashboard/_template/header',$data);
        $this->load->view('dashboard/_template/navbar',$data);
		$this->load->view('dashboard/loyalty/home',$data);
		$this->load->view('dashboard/_template/footer');
	}

	
}
