<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('usermodel'));
		$this->load->helper('string');
	}

	
	public function index()
	{
		$data['message'] = "";
		
		if (!$this->usermodel->islogged()) {
			redirect('auth/login');
		}
		if (isset($_POST['sendticket'])) {
			$data = array(
				'user_id' => $this->input->post('user_id'),
				'ticket_id' => rand(111111,999999),
				'ticket_title' => $this->input->post('ticket_title'),
				'message' => $this->input->post('message'),
				'status' => 'open',
				'created' => date('d-m-Y H:i:s'),
				 );
			$query = $this->db->insert('supports',$data);
			if ($query) {
				$data['message'] = '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Sent Successfully</span>
                        </div>';
			}
		}
		 $data['user'] = $user = $this->usermodel->get_user();
		 $data['tickets'] = $this->db->query("SELECT * FROM supports WHERE user_id='$user->uid'")->result();
		$data['header'] = array(
			'title' => "Support - Subnet", 
		);
		//$this->cookie->
        $this->load->view('dashboard/_template/header',$data);
        $this->load->view('dashboard/_template/navbar',$data);
		$this->load->view('dashboard/support/home',$data);
		$this->load->view('dashboard/_template/footer');
	}

	public function v($ticket_id)
	{
		if (!$this->usermodel->islogged()) {
			redirect('auth/login');
		}

		$data['message'] = "";

		$data['user'] = $user = $this->usermodel->get_user();
		 $data['ticket'] = $this->db->query("SELECT * FROM supports WHERE ticket_id='$ticket_id'")->row();
		$data['header'] = array(
			'title' => "Support", 
		);

		$this->load->view('dashboard/_template/header',$data);
        $this->load->view('dashboard/_template/navbar',$data);
		$this->load->view('dashboard/support/view',$data);
		$this->load->view('dashboard/_template/footer');
	}
}
