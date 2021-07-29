<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Loyaltym extends CI_Model
{
	

	public function __construct()
	{
		$this->load->helper('date');
    $this->load->model(array('walletm','mazidata_m'=>'mzd'));
    
	}

	public function user_points($user_id)
  {
     $this->db->select('*');
     $this->db->from('loyalty');
     $this->db->where('user_id',$user_id);
     $query = $this->db->get()->row();
     return $query;
  }

  public function gain_point($user_id,$amount)
  {
   // $points = $this->point_score($amount);

    if ($amount>100 && $amount<2000) {
      $points = 20;
    }elseif ($amount>2000) {
      $points = 50;
    }

    $current_points = $this->user_points($user_id)->points;
    $new_points = $current_points + $points;
   
    $data = array(
      'points' => $new_points, 
    );
    $where = array(
      'user_id' => $user_id,
    );

    $this->db->update('loyalty',$data,$where);
    
  }

  public function redeem_points($user_id,$points)
  {
    # convert the point to airtime, data, or other services

    $current_points = $this->user_points($user_id)->points;
    $new_points = $current_points - $points;

    $where = array(
      'user_id' => $user_id, 
    );
    $data = array(
      'points' => $new_points, 
    );

    $this->db->update('loyalty',$data,$where);

  }

  public function point_score($amount)
  {

    if ($amount>100 && $amount<2000) {
      echo 20;
    }elseif ($amount>2000) {
      echo 50;
    }
  }

  public function point_purchase($user_id, $points, $phone, $network)
  {

    $user_points = $this->user_points($user_id)->points;
    
      $check = $points/20;
      $amount = $check*100;

      if ($user_points>=$check) {
        $amount = $this->point_value($points);
        $this->mzd->buyairtime($network,$phone,$amount);
        $this->redeem_points($user_id,$points);
        return "success";
      }else{
        return "failed";
      }

    
  }

  public function point_value($points)
  {

    if ($points==20) {
      return 50;
    }elseif ($points==50) {
      return 100;
    }elseif ($points==200) {
      return 500;
    }elseif ($points==1000) {
      return 2000;
    }
  }


  
  public function keep_log($user_id,$phone,$amount,$product)
  {

    $data = array(
      'user_id' => $phone, 
      'points' => $phone, 
      'phone' => $phone, 
 
    );
    $this->db->insert('loyalty_history', $data);
  }


  public function credit_wallet($user_id,$points)
  {
      $user_points = $this->user_points($user_id)->points;
      $check = $points/20;
      $amount = $check*100;
      if ($user_points>=$check) {
        $this->walletm->updatewallet($user_id,$amount,'cr');
        $this->redeem_points($user_id,$check);
        return "successful";
      }else{
        return "failed";
      }
    
  }


    
}
