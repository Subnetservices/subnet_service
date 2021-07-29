<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notificationsm extends CI_Model
{
	

	public function __construct()
	{
		$this->load->helper('date');
		}

	
	public function allnotifs($user_id)
	{
        $this->db->select('*');
		$this->db->from('notifications');
		$this->db->where('user_id',$user_id);
		$this->db->order_by('ntid','DESC');
		$this->db->limit('4');
		$query = $this->db->get();
		if ($query) {
			return $query->result();
		}
	}
	public function getnotif($notif_id)
	{
        $this->db->select('*');
		$this->db->from('notifications');
		$this->db->where('_id',$notif_id);
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		}
	}

	public function sendnotif()
	{
		$data = array(
			'user_id' => $user_id, 
			'title' => $title, 
			'note_time' => $note_time, 
		);
		$this->db->insert('notifications',$data);
	}
}
