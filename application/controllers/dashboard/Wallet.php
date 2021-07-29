<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ob_start();
class Wallet extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('usermodel','walletm','paystackm'));
	}

	
	public function index()
	{
		if (!$this->usermodel->islogged()) {
			redirect('auth/login');
		}
		$data['couponmessage'] = "";

        $data['user'] = $user = $this->usermodel->get_user();

        if (isset($_POST['coupon'])) {
        	$couponcode = $this->input->post('coupon_code');
        	$getcoupon = $this->db->select('*')->from('coupon')->where('coupon_code', $couponcode)->get()->row();
        	if ($getcoupon){
        		# check if user has used coupon
        		$cpuse = $this->db->select('count(*) tcp')->from('coupon_used')->where('coupon_id',$getcoupon->cpid)->where('user_id',$user->uid)->get()->row();
        		if ($cpuse->tcp==0 && $getcoupon->available>0) {
        		    $this->walletm->updatewallet($user->uid, $getcoupon->coupon_amount,$op='cr');
        		    $this->walletm->updatecoupon($getcoupon->cpid);
        		    $this->walletm->logcoupon($getcoupon->cpid,$user->uid);
        		    $data['couponmessage'] = '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Coupon Successfully Applied</span>
                        </div>';
        		}else{
                     $data['couponmessage'] = '<div class="alert alert-warning alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Coupon Already Used by you</span>
                        </div>';
        		}

        		
        	}else{
        		$data['couponmessage'] = $data['profile_message'] = '<div class="alert alert-warning alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Coupon Not a available</span>
                        </div>';
        	}
        	
        }
        
        if(isset($_GET['trxref'])){
            $this->confirm_payment($_GET['trxref']);
            redirect('https://www.subnet.com.ng/dashboard/wallet/');
        }
        
		if (isset($_POST['fundwallet'])) {
            $ref = rand(1111,99999);
            $prid = 'wallet';
            $user_id = $user->uid;
            $email = $user->email;
            $plan = 'wallet';
            $paymethod = 'card';
            $phone = $user->phone;
            $amount = $this->input->post('amount');
            $callback_url ='https://www.subnet.com.ng/dashboard/wallet/';

            $this->walletm->logtx($paymethod,$amount,$user_id,$status='pending',$phone,$plan,$ref);
            $this->paystackm->paynow($amount,$email,$ref,$phone,$callback_url);

		}


	    $data['wallet'] = $this->walletm->walletbal($user->uid);
		$data['user'] = $user = $this->usermodel->get_user();
		$data['header'] = array(
			'title' => "Wallet - Subnet", 
		);

        $this->load->view('dashboard/_template/header',$data);
        $this->load->view('dashboard/_template/navbar',$data);
		$this->load->view('dashboard/wallet',$data);
		$this->load->view('dashboard/_template/footer');
	}


  public function confirm_payment($ref)
    {
       ##paystack or ravepay;
       
       $transaction = $this->paystackm->verify_payment($ref);
     //  print_r($transaction);
      if ($transaction['status']=='success' || $transaction['status']=='1') {
        // $txid = $transaction['reference'];
         $checktxn = $this->db->select('*')->from('transactions')->where('referrence',$ref)->get()->row();
         $amount = $checktxn->amount;
       //  print_r($checktxn);
         $user_id = $checktxn->user_id;
         #update transaction status and update wallet
       if(!$checktxn->status=='success'){
         $this->walletm->updatewallet($user_id,$amount,'cr');
         $updated = $this->update_transaction($ref);
        }
         //  redirect('/dashboard/wallet', 'refresh');
        

      }

    }
    
     public function update_transaction($ref)
    {
       $data = array('status' => 'success', );
       $where = array('referrence' => $ref, );
       $this->db->update('transactions',$data,$where);
    }


}
