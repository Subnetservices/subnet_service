<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Giveawaym extends CI_Model
{
	

	public function __construct()
	{
		$this->load->helper('date');
		$this->load->model(array('walletm'));
	}

	

public function redeem_it($network,$phone,$amount,$giveaway_id)
  {
    #credit user phone number and record that it has been redeemed

    $buy = $this->mzd->buyairtime($network,$phone,$amount);
    $user_ = $this->get_gift($giveaway_id);
    //if ($buy) {

      $data = array(
        'phone_number' => $phone, 
        'giveaway_id' => $giveaway_id, 
        'redeemed_at' => date("d-m-Y H:i:s"), 
      );
      $this->db->insert('giveaway_beneficiary', $data); 

      $this->walletm->updatewallet($user_->user_id,$amount,'dr');
      $this->update_giveaway($giveaway_id);
    //}
  }

  public function update_giveaway($giveaway_id)
  {
    $giv = $this->get_gift($giveaway_id);

    $new_quantity = $giv->quantity - 1;

    $where = array('gvid' => $giveaway_id, );
    $data = array(
             'quantity' => $new_quantity, 
            );
    $this->db->update('giveaway',$data,$where);
  }

  public function check_validity($giveaway_id)
  {
    #check if the give away is valid
    $this->db->select('*');
    $this->db->from('giveaway');
    $this->db->where('gvid', $giveaway_id);
  //  $this->db->join('users','users.uid=giveaway.user_id');
    $this->db->join('wallet','wallet.user_id=giveaway.user_id');

    $query = $this->db->get()->row();
    if ($query->quantity>0 && $query->amount>$query->gift_value) {
      return true;
    }else{
      return false;
    }
       
  }

  public function get_gift($giveaway_id)
  {

    #check if the give away is valid
    $this->db->select('*');
    $this->db->from('giveaway');
    $this->db->where('gvid', $giveaway_id);
    $this->db->join('users','users.uid=giveaway.user_id');

    $query = $this->db->get()->row();
    return $query;

       
  }

  public function has_benefited($phone_number,$giveaway_id)
  {
    #check if the numbeer has benefited
    $this->db->select('count(*) total');
    $this->db->from('giveaway_beneficiary');
    $this->db->where('giveaway_id', $giveaway_id);
    $this->db->where('phone_number', $phone_number);
    $query = $this->db->get()->row();
    if ($query->total>0) {
      return true;
    }else{
      return false;
    }

  }

	
}
