<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Giveaway extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('usermodel','mazidata_m'=>'mzd','giveawaym'));
	}

	public function index()
	{
		$data['message'] = "";

		if (isset($_GET['gift_id'])) {
		   $data['giveaway_id'] = $givid = $_GET['gift_id'];
           $data['giv'] = $giv = $this->giveawaym->get_gift($givid);
		}

        
		if (isset($_POST['redeem'])) {

			$phone_number = $this->input->post('phone_number');


			if ($this->giveawaym->check_validity($givid)==true) {
				# code...
				if ($this->giveawaym->has_benefited($phone_number,$givid)==false) {
					# code...
					$redeem = $this->giveawaym->redeem_it($giv->network_id,$phone_number,$giv->gift_value,$giv->gvid);
					//if ($redeem) {
						$data['message'] = "Congratulation, Successfully redeemed the Give away <i class='fa fa-check'></i>";
					//}
				}else{
					$data['message'] = "You have benefited";
				}
			}else{
				$data['message'] = "Give away not available";
			}
		}

		$data['header'] = array(
			'title' => "Give Away - Subnet", 
			'description' => "Subnet data is one of the largest mobile data and airtime resellers in Nigeria, we are 
                        determined to help you stay connected on your terms. Offering you the best deals, bonuses and more", 
			'keywords' => "Mobile data, mtn data, airtel data, glo data, 9mobile data, vtu, airtime", 
		);
		

        $this->load->view('_template/header',$data);
		$this->load->view('giveaway',$data);
		$this->load->view('_template/footer');

	}
	

	
}
