<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodel extends CI_Model
{
	

	public function __construct()
	{
	
		$this->load->helper('date');
		$this->load->helper('string');


		$this->load->library('email');
	 //     $config['protocol'] = 'smtp';
	 //     $config['smtp_host'] = 'smtp.gmail.com';
	 //     $config['smtp_user'] = 'glasscupenterprise@gmail.com';
	 //     $config['smtp_pass'] = '7t87';
	  //     $config['smtp_port'] = '25';
	 //    $config['dsn'] = TRUE;
	 //    $config['protocol'] = 'sendmail';
     //    $config['mailtype'] = 'text';
	 // $config['mailpath'] = '/usr/sbin/sendmail';
	    $config['charset'] = 'iso-8859-1';
		// $config['wordwrap'] = TRUE;
		 $this->email->initialize($config);
	}


	public function createuser()
	{

   // $username = $this->input->post('username');
    $pass_word = $this->input->post('password');
    $hashed_password = $this->encrypt_password($pass_word);
    $vcode = random_string('alnum',5);
    $phone = $this->input->post('phone_number');
    $userid = $this->genuid();
		$user = array(
			'userid' => $userid, 
			'username' => $userid, 
			'email' => $this->input->post('email'),  
			'phone' => $phone,  
			// 'bank_code' => $this->input->post('bank_code'),  
			// 'account_number' => $this->input->post('account_number'),  
			// 'account_name' => $this->input->post('account_name'),  
			'full_name' => $this->input->post('full_name'), 
			'activation_code' => $vcode, 
			'password' => $hashed_password, 
			'created_on' => date("d-m-Y H:i:s"), 
			
		);
		$query = $this->db->insert('users',$user);
		if ($query) {
            $email = $this->input->post('email');  
			$first_name = $this->input->post('firstname');
			//$this->smscode($phone,$vcode);
			$this->welcomemail($email,$first_name);
			$this->createwallet($userid);
			$this->createloyalty($userid);
		}
		
	}

	public function createwallet($userid)
	{
		$user = $this->db->select('uid,userid,email')->from('users')->where('userid',$userid)->get()->row();
		$data = array('user_id' => $user->uid,);
		$this->db->insert('wallet',$data);
	}

	public function createloyalty($userid)
	{
		$user = $this->db->select('uid,userid,email')->from('users')->where('userid',$userid)->get()->row();
		$data = array(
			'user_id' => $user->uid,
			'points' => 0.0,
	    );
		$this->db->insert('loyalty',$data);
	}



	public function checkusername($username)
	{
		$this->db->select('username');
		$this->db->from('users');
		$this->db->where('username',$username);
		$query = $this->db->get()->row();
		
		if ($query) {
			return $query;
		}
	}
	
	public function getuser($username)
	{
		$this->db->select('username');
		$this->db->from('users');
		$this->db->where('username',$username);
		$this->db->join('banks','banks.bank_code=users.bank_code');
		$query = $this->db->get()->row();
		
		if ($query) {
			return $query;
		}
	}

	public function checkemail($email)
	{
		$this->db->select('email');
		$this->db->from('users');
		$this->db->where('email',$email);
		$query = $this->db->get()->row();
		if ($query) {
			return $query;
		}
	}

	public function log_out()
	{
		$data = array(
			'email', 
			'username', 
			//'role', 
			'loggedin'
		);
		$this->session->unset_userdata($data);
		
	}

	public function genuid()
	{
	  // $uid = substr($username, 0,3);
	   $uid = random_string('alnum',7);
	   return $uid;
	}

	public function forgot_password()
	{
		$code = random_string('alnum',12);
		$email = $this->input->post('email');
		$data = array(
			'forgotten_password_code' => $code,
			'forgotten_password_time' => date('d-m-Y h:i:s'),
			 );
		$where = array(
			'email' => $email, 
		    );
		$save = $this->db->update('users',$data,$where);
		if ($save) {
		   $this->mailcode($email,$code);
		 }
	}

	public function mailcode($email,$fgcode)
	{
		$this->load->library('email');

	  //send forgotten password reset link
		$link = "<a href='https://subnet.com.ng/auth/reset_password?rscd=".$fgcode."'>Reset</a>";

		$message = "Follow the link to reset password or ignore if you didn't initialize it.";
		$message = "/n" .$link;

		

		$this->email->from('account@subnet.com.ng', 'Subnet Data');
		$this->email->to($email);
		//$this->email->cc('another@another-example.com');
		$this->email->bcc('support@subnet.com.ng');

		$this->email->subject('Reset Password');
		$this->email->message($message);

		$q = $this->email->send();
		if ($q) {
			return TRUE;
		}
	}

	public function welcomemail($email,$firstname)
	{
		$this->load->library('email');

		$data['email'] = $email;
		$data['firstname'] = $firstname;

	    
	 	$this->email->from('auth@glasscup.com', 'Subnet Data');
		$this->email->to($email);
		//$this->email->cc('another@another-example.com');
		$this->email->bcc($email);

		$this->email->subject('Reset Password');
		$this->email->message($this->load->view('email/welcome_ms',$data,TRUE));

		$q = $this->email->send();
		if ($q) {
			return TRUE;
		}
	}

	

	public function mailpassword($email,$firstname)
	{		

		$this->email->from('account@subnet.com.ng', 'Subnet Data');
		$this->email->to($email);
		//$this->email->cc('another@another-example.com');
		$this->email->bcc($email);

		$this->email->subject('Reset Password');
		$this->email->message($this->load->view('email/welcome_ms',$data, TRUE));

		$q = $this->email->send();
		if ($q) {
			return TRUE;
		}
	}


	public function islogged()
	{
		return $this->session->userdata('username');
	}

	public function get_user()
	{
		$du = $this->islogged();
		$username = $du;

	   $this->db->select('*');	
	   $this->db->from('users');	
	   $this->db->where('username',$username);	
	   $query = $this->db->get()->row();
	   if ($query) {
	   		return $query;
	   	}	
	}

	
	public function encrypt_password($pass_word)
	{
		return md5($pass_word);
	}
	
	###################
	### birthdays #####

	public function coming_birthdays()
	{
		####### select birthdays coming in the next 5 days #######
		$sql = "SELECT * FROM users WHERE STR_TO_DATE(DATE_FORMAT(dob,'%m-%d'),'%m-%d') >= STR_TO_DATE(DATE_FORMAT(now(),'%m-%d'),'%m-%d') AND STR_TO_DATE(DATE_FORMAT(dob,'%m-%d'),'%m-%d') < STR_TO_DATE(DATE_FORMAT(now()+INTERVAL 7 DAY,'%m-%d'),'%m-%d') ORDER BY STR_TO_DATE(DATE_FORMAT(dob,'%m-%d'),'%m-%d') ASC";
	   $query = $this->db->query($sql)->result();
	   if ($query) {
	   		return $query;
	   	}	

	}

	public function today_birthdays()
	{
	    $sql = "SELECT * FROM users WHERE STR_TO_DATE(DATE_FORMAT(dob,'%m-%d'),'%m-%d') = STR_TO_DATE(DATE_FORMAT(now(),'%m-%d'),'%m-%d')";
	   
	   $query = $this->db->query($sql)->result();
	   if ($query) {
	   		return $query;
	   	}		
	}


}