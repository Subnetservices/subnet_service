<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('adminm','supportm'));
	}

	
	public function index()
	{
		if (!$this->adminm->is_admin()=='admin') {
			redirect('admin/auth/login');
		}
		$data['user'] = $user = $this->adminm->get_user();
       $data['header'] = array(
			'title' => " Support", 
		);
		$data['tickets'] = $this->supportm->listsupport();
        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/support/home',$data);
		$this->load->view('admin/_template/footer');
		
	}

	public function v($ticket_id)
	{
		if (!$this->adminm->is_admin()=='admin') {
			redirect('admin/auth/login');
		}
		$data['user'] = $user = $this->adminm->get_user();
		if (isset($_POST['reply'])) {
			$data = array(
				'support_id'=>$this->input->post('support_id'),
				'user_id'=>$user->uid,
				'reply'=>$this->input->post('message'),
				'created_at'=>date("d-m-Y h:i:s") 
			);

			$this->db->insert('support_replies',$data);
		}



       $data['header'] = array(
			'title' => " Support Ticket", 
		);
		$data['ticket'] = $this->supportm->getsupport($ticket_id);
        $this->load->view('admin/_template/header',$data);
		$this->load->view('admin/_template/navbar');
		$this->load->view('admin/support/view',$data);
		$this->load->view('admin/_template/footer');
		
	}


	
}
