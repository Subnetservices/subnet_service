<?php
//ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Buydata extends CI_Controller {
 public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url'));
    $this->load->model(array('usermodel','walletm','mazidata_m'=>'mzd','paystackm','smsm','loyaltym','payscribem'=>'psm'));

    
  }

   
  public function index()
  {
      $data['message'] = "";

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
            
            $wallet_price = $plan->wallet_price;
            
          //  $message = 'Ref:'.$ref.',\n User:'.$user_id.',\n Phone:'.$phone.',\n Data Amount:'.$plan->product_value.'MB,\n Network:'.$plan->network.'.';
            
            if ($paymethod=='wallet') {
              
              $wal =  $this->walletm->walletbal($user->uid);
              //  print_r($wal);
               $amount = $wallet_price;
                if($wal->amount>=$amount){

                 $save = $this->walletm->logtx($paymethod,$amount,$user_id,$status='success',$phone,$plan->product_value,$ref);
                  // $sm = $this->simhost->smsgateway($phone,$plan->product_value,$plan->network);
                  // $sms = $this->smsm->sendsms($message);

                  // $sms = $this->mzd->buydata($plan->network_id,$phone,$plan->product_id);
                   $sms = $this->psm->buydata($plan->network,$phone,$plan->product_value); //payscribe
                   var_dump($sms);
                   echo $sms;
       
                   if ($sms) {   
                    $this->walletm->updatewallet($user->uid,$amount,$op='dr');
                    // reward with points
                    $this->loyaltym->gain_point($user_id,$amount);

                   //success message
                    $data['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <p class="mb-0">
                                                Successfully Purchased Data
                                            </p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                   }


                  
                }else{
                  $data['message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <p class="mb-0">
                                                Insufficient Wallet Balance
                                            </p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                }
               
               
            }elseif ($paymethod=='card') {
                $amount = $plan->current_price;
                $callback_url ='https://www.subnet.com.ng/dashboard/welcome/confirm_payment/'.$ref;
                $this->walletm->logtx($paymethod,$amount,$user_id,$status='pending',$phone,$plan->product_value,$ref);
                $this->paystackm->paynow($amount,$email,$ref,$phone,$callback_url);
            }
        }
       
           $data['wallet'] = $this->walletm->walletbal($user->uid);
           $data['header'] = array(
      'title' => "Buydata - Subnet", 
         );

    $this->load->view('dashboard/_template/header',$data);
    $this->load->view('dashboard/_template/navbar',$data);
    $this->load->view('dashboard/buydata',$data);
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

    public function users($network,$phone,$plan)
    {
     // $users = $this->mzd->data_transactions();
      $users = $this->psm->buyairtime($network,$phone,$plan);
     // var_dump($users);
      print_r($users);
    }

   
}