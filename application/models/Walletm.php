<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Walletm extends CI_Model
{
	

	public function __construct()
	{
		$this->load->helper('date');
		$this->load->model(array('walletm','referralm'));
	}

	
	public function balance($user_id)
	{
		$this->db->select('*, sum(output) balance');
		$this->db->from('wallet');
		$this->db->where('user_id',$user_id);
	//	$this->db->where('requested','1');
		$query = $this->db->get()->row();
		if ($query) {
			return $query;
		}
	}

	 public function updatewallet($user_id,$amount,$op)
    {
      if ($op=='cr' || $op=='dr') {
       
           $curbal = $this->walletbal($user_id);
           if ($op=='cr') {
           	$newbal = $curbal->amount + $amount;
           }elseif ($op=='dr') {
           	$newbal = $curbal->amount - $amount;
           }
           
           $where = array('user_id' => $user_id);
           $data = array('amount' => $newbal);
           $this->db->update('wallet',$data,$where);
      }
    }

    public function walletbal($user_id)
    {
       return $this->db->select('*')->from('wallet')->where('user_id',$user_id)->get()->row();
    }

     public function coupons()
    {
       return $this->db->select('*')->from('coupon')->get()->result();
    }
    public function logcoupon($cpid, $user_id)
    {
       $data = array(
       	'user_id' => $user_id, 
       	'coupon_id' => $cpid,
       	'time_applied'=> date("d-m-Y h:i:s") 
       );
       $this->db->insert('coupon_used',$data);
    }
    public function updatecoupon($cpid)
    {
       $getcp = $this->db->select('*')->from('coupon')->where('cpid',$cpid)->get()->row();
       $avail = $getcp->available - 1;
       $where = array('cpid' => $cpid, );
       $data = array('available' => $avail, );
       $this->db->update('coupon',$data,$where);
    }

    public function logtx($paymethod,$amount,$user_id,$status,$phone,$plan,$ref)
    {
      $data = array(
            'plan' => $plan, 
            'amount' => $amount, 
            'user_id' => $user_id, 
            'payment_method' => $paymethod, 
            'status' => $status, 
            'phone_number' => $phone, 
            'referrence' => $ref, 
        );
      $this->db->insert('transactions',$data);
    }


	

	
}
