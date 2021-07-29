<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('usermodel'));
		$this->load->model(array('coursesm'));
	}

	
	public function index()
	{
		if (!$this->usermodel->islogged()) {
			redirect('auth/login');
		}
		if (isset($_GET['rmc'])) {
			$where = array(
				'lid' => $_GET['rmc'], 
			);
			$rm  = $this->db->delete('lecture_time_table', $where);
			if ($rm) {
				redirect('/dashboard/timetable/');
			}
		}
		if (isset($_POST['add_lecture'])) {
			$data = array(
				'userid' => $this->input->post('user_id'), 
				'course_id' => $this->input->post('course_id'), 
				'day' => $this->input->post('day'),
				'lecture_time' => $this->input->post('lecture_time'),
			);
		  $query = $this->db->insert('lecture_time_table',$data);
		  if ($query) {
		  	# code...
		  }
		}


		$data['user'] = $user = $this->usermodel->get_user();
		if ($user->role=='student') {
			 $data['timetable'] = $this->coursesm->alltimetable($user->id);
		}elseif ($user->role=='lecturer') {
		 $data['timetable'] = $this->coursesm->mytimetable($user->id);
		}
       

       		$data['header'] = array(
			'title' => " Lecturers", 
		);
        $this->load->view('dashboard/_template/header',$data);
		$this->load->view('dashboard/_template/navbar');
		$this->load->view('dashboard/tasks',$data);
		$this->load->view('dashboard/_template/footer');
		
	}


	public function personal()
	{
		if (!$this->usermodel->islogged()) {
			redirect('auth/login');
		}
		$data['user'] = $user = $this->usermodel->get_user();

         $data['timetable'] = $this->coursesm->mytimetable($user->id);
         		$data['header'] = array(
			'title' => " Lecturers", 
		);
		//$this->cookie->
        $this->load->view('dashboard/_template/header',$data);
		$this->load->view('dashboard/_template/navbar');
		$this->load->view('dashboard/timetable',$data);
		$this->load->view('dashboard/_template/footer');
		
	}
}
