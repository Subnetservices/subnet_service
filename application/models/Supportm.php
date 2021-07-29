<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SupportM extends CI_Model
{
	

	public function __construct()
	{
		$this->load->helper('date');
		}

	
	public function listsupport()
	{
        $this->db->select('*');
		$this->db->from('supports');
		$this->db->join('users', 'users.uid=supports.user_id');
		$this->db->order_by('spid','DESC');
		$query = $this->db->get();
		if ($query) {
			return $query->result();
		}
	}

	public function getsupport($support_id)
	{
        $this->db->select('*');
		$this->db->from('supports');
		$this->db->where('spid',$support_id);
		$this->db->join('users','users.uid=supports.user_id');
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		}
	}

	
}
