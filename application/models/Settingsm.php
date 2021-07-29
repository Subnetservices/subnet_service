<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingsM extends CI_Model
{
	

	public function __construct()
	{
	
		$this->load->helper('date');
		$this->load->helper('string');
	}

	public function show_phone($user_id)
	{
		$this->db->select('*');
		$this->db->from('messages');
		$this->db->join('users',"users.id=messages.sent_to");
		$this->db->where('sent_to',$user_id);
		$query = $this->db->get()->result();
		
		if ($query) {
			return $query;
		}
	}
	
	public function allow_messages($user_id)
	{
		$data = array(
			'send_to' => $this->input->post('send_to'), 
			'send_from' => $this->input->post('send_from'), 
			'message' => $this->input->post('message') 
		);
		$query = $this->db->insert('messages',$data);
		
		if ($query) {
			
		}
	}

	
	
}