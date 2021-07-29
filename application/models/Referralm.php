<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Referralm extends CI_Model
{
	

	public function __construct()
	{
		$this->load->helper('date');
		}

	
	public function myreferrals($user_id)
	{
        $this->db->select('*');
		$this->db->from('users');
		$this->db->where('ref',$user_id);
		
		$query = $this->db->get();
		if ($query) {
			return $query->result();
		}
	}

	public function amounts($user_id)
	{
        $this->db->select('*');
		$this->db->from('supports');
		$this->db->where('spid',$user_id);
		$this->db->join('users','users.uid=supports.user_id');
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		}
	}

	public function refbonus($user_id)
	{
        $this->db->select('*, invested_amount as bonus');
		$this->db->from('users');
		$this->db->where('referrer',$user_id);
		$this->db->join('investments','investments.user_id=users.uid','right');
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		}
	}



	
}
