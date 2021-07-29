<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Plansm extends CI_Model
{
	

	public function __construct()
	{
		$this->load->helper('date');
		$this->load->model(array('walletm','referralm'));
	}

	
	public function allplans()
	{
		$this->db->select('*');
		$this->db->order_by('network','desc');
		$this->db->from('products');
	
		$query = $this->db->get()->result();
		if ($query) {
			return $query;
		}
	}

	

	
}
