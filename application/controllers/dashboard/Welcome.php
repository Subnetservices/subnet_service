<?php
//ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
 public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url'));
    $this->load->model(array('usermodel','walletm','loyaltym','paystackm','smsm'));

    
  }

   
  public function index()
  {
      if (!$this->usermodel->islogged()) {
        redirect('auth/login');
      }
       $data['user'] = $user = $this->usermodel->get_user();
           
            
       if (isset($_POST['purchase'])) {
            $ref = rand(1111,99999);
            $prid = $this->input->post('plan');
            $user_id = $user->uid;
            $email = $user->email;
            $plan = $this->plandetails($prid);
            $paymethod = $this->input->post('payment_method');
            $phone = $this->input->post('phone_number');
            $amount = $plan->current_price;
            
            $message = 'Ref:'.$ref.',\n User:'.$user_id.',\n Phone:'.$phone.',\n Data Amount:'.$plan->product_value.'MB,\n Network:'.$plan->network.'.';
            
            if ($paymethod=='wallet') {
                $wal =  $this->walletm->walletbal($user->uid);
              //  print_r($wal);
               $amount = $this->discount($amount);
                if($wal->amount>=$amount){
                 $save = $this->walletm->logtx($paymethod,$amount,$user_id,$status='success',$phone,$plan->product_value,$ref);
                  // $sm = $this->simhost->smsgateway($phone,$plan->product_value,$plan->network);
                  $sms = $this->smsm->sendsms($message);
                   // print_r($sms);
                   // print_r($sms);
                  $this->walletm->updatewallet($user->uid,$amount,$op='dr');
                 redirect('/dashboard/');
                }
               
               
            }elseif ($paymethod=='card') {
                $callback_url ='https://www.subnet.com.ng/dashboard/welcome/confirm_payment/'.$ref;
                $this->walletm->logtx($paymethod,$amount,$user_id,$status='pending',$phone,$plan->product_value,$ref);
                $this->paystackm->paynow($amount,$email,$ref,$phone,$callback_url);
            }
        }
       
           $data['wallet'] = $this->walletm->walletbal($user->uid);
           $data['loyalty'] = $this->loyaltym->user_points($user->uid);
           $data['header'] = array(
            'title' => "Dashboard - Subnet", 
         );

        $this->load->view('dashboard/_template/header',$data);
        $this->load->view('dashboard/_template/navbar',$data);
        $this->load->view('dashboard/home',$data);
        $this->load->view('dashboard/_template/footer');
  }

    public function discount($amount)
    {
      return $amount - $amount*10/100;
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

        // $this->walletm->updatewallet($user_id,$amount);
         $updated = $this->update_transaction($ref);
         redirect('https://www.subnet.com.ng/dashboard');


      }

    }
    public function plandetails($prid)
    {
       return $this->db->select('*')->from('products')->where('prid',$prid)->get()->row();
    }

     public function update_transaction($ref)
    {
       $data = array('status' => 'success', );
       $where = array('referrence' => $ref, );
       $this->db->update('transactions',$data,$where);
    }

    public function ajax_dataplans($network)
    {
      $query = $this->db->select('*')->from('products')->where('network',$network)->get()->result();
      echo json_encode($query);
    }
    
    public function ajax_plan($pid)
    {
      $query = $this->db->select('*')->from('products')->where('prid',$pid)->get()->row();
      echo json_encode($query);
    }

   
}