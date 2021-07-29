<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transactionsm extends CI_Model
{
	

	public function __construct()
	{
		$this->load->helper('date');
		$this->load->model(array('walletm','referralm'));
	}

	
	public function alltxn()
	{
		$this->db->select('*');
		$this->db->from('transactions');
	
		$query = $this->db->get()->result();
		if ($query) {
			return $query;
		}
	}
	public function mytxn($user_id)
	{
		$this->db->select('*');
		$this->db->from('transactions');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get()->result();
		if ($query) {
			return $query;
		}
	}

	

	
}
