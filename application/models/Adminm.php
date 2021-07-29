<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminm extends CI_Model
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
	       $config['smtp_port'] = '25';
	 //    $config['dsn'] = TRUE;
	 //    $config['protocol'] = 'sendmail';
     //    $config['mailtype'] = 'text';
	 // $config['mailpath'] = '/usr/sbin/sendmail';
	    $config['charset'] = 'iso-8859-1';
		// $config['wordwrap'] = TRUE;
		 $this->email->initialize($config);
	}

	public function allusers()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('wallet','wallet.user_id=users.uid','left');
		$query = $this->db->get()->result();
		
		if ($query) {
			return $query;
		}
	}
	public function _getuser($user_id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('uid',$user_id);
		$query = $this->db->get()->row();
		if ($query) {
			return $query;
		}
	}

	public function blocked()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('blocked','yes');
		$query = $this->db->get()->result();
		if ($query) {
			return $query;
		}
	}
	public function listusers()
	{
		$this->db->select('*, count(*) as total');
		$this->db->from('users');
		$query = $this->db->get()->row();
		if ($query) {
			return $query;
		}
	}
	public function blockedusers()
	{
		$this->db->select('*, count(*) as total');
		$this->db->from('users');
		$this->db->where('blocked','yes');
		$query = $this->db->get()->row();
		if ($query) {
			return $query;
		}
	}
	public function activeusers()
	{
		$this->db->select('*, count(*) as total');
		$this->db->from('users');
		$this->db->where('active','yes');
		$query = $this->db->get()->row();
		if ($query) {
			return $query;
		}
	}


	public function allstaff()
	{
		$this->db->select('*');
		$this->db->from('admin');
		$query = $this->db->get()->result();
		if ($query) {
			return $query;
		}
	}

	public function getstaff($staff_id)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('uid',$staff_id);
		$query = $this->db->get()->row();
		if ($query) {
			return $query;
		}
	}


	public function createuser()
	{

    $username = $this->input->post('username');
    $pass_word = $this->input->post('password');
    $hashed_password = $this->encrypt_password($pass_word);
    $userid = $this->genuid();
		$user = array(
			'userid' => $userid, 
			'username' => $userid, 
			'email' => $this->input->post('email'),  
			'phone' => $this->input->post('phone'), 
			//'first_name' => $this->input->post('first_name'), 
            //last_name' => $this->input->post('last_name'), 
		//	'role' => $this->input->post('user_role'), 
			'password' => $hashed_password, 
			
		);
		$query = $this->db->insert('admin',$user);
		if ($query) {
            $email = $this->input->post('email');  
			$first_name = $this->input->post('firstname');
			$this->sendmail($email,$first_name);
		}
		
	}

	public function checkusername($username)
	{
		$this->db->select('username');
		$this->db->from('admin');
		$this->db->where('username',$username);
		$query = $this->db->get()->row();
		
		if ($query) {
			return $query;
		}
	}
	
	public function getuser($username)
	{
		$this->db->select('username');
		$this->db->from('admin');
		$this->db->where('username',$username);
		$query = $this->db->get()->row();
		
		if ($query) {
			return $query;
		}
	}

	public function checkemail($email)
	{
		$this->db->select('email');
		$this->db->from('admin');
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
			'role', 
			'loggedin'
		);
		$this->session->unset_userdata($data);
		
	}

	public function genuid()
	{
	 //  $uid = substr($username, 0,3);
	   $uid = random_string('alnum',9);
	   return $uid;
	}

	public function forgot_password()
	{
		$code = random_string('alnum',12);
		$email = $this->input->post('email');
		$data = array(
			'forgotten_password_code' => $code,
			'forgotten_password_time' => time(),
			 );
		$where = array(
			'email' => $email, 
		    );
		$save = $this->db->update('admin',$data,$where);
		if ($save) {
		   $this->mailcode($email,$code);
		 }
	}

	public function mailcode($email,$fgcode)
	{
		$this->load->library('email');

	  //send forgotten password reset link
		$link = "<a href='/reset_password?rscd=".$fgcode."'>Reset</a>";

		

		$this->email->from('auth@glasscup.com', 'Glass Cup Ent');
		$this->email->to('ezekielarin@gmail.com');
		//$this->email->cc('another@another-example.com');
		$this->email->bcc('them@their-example.com');

		$this->email->subject('Reset Password');
		$this->email->message('Follow the link to reset your password'.$link);

		$q = $this->email->send();
		if ($q) {
			return TRUE;
		}
	}

	public function mailwelcome($email,$firstname)
	{
		$this->load->library('email');

	  //send forgotten password reset link
	//	$link = "<a href='/reset_password?rscd=".$fgcode."'>Reset</a>";
		$data['email'] = $email;
		$data['firstname'] = $firstname;

	    
	 	$this->email->from('auth@glasscup.com', 'Glass Cup Ent');
		$this->email->to('ezekielarin@gmail.com');
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
		$this->load->library('email');

	  //send forgotten password reset link
		$link = "<a href='/reset_password?rscd=".$fgcode."'>Reset</a>";
		$data['email'] = $email;
		$data['firstname'] = $firstname;

	    
	     $config['protocol'] = 'smtp';
	     $config['smtp_host'] = 'smtp.gmail.com';
	     $config['smtp_user'] = 'glasscupenterprise@gmail.com';
	     $config['smtp_pass'] = 'shapiro7';
	    // $config['smtp_port'] = '25';
	    // $config['dsn'] = TRUE;
	    $config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		

		$this->email->from('auth@glasscup.com', 'Glass Cup Ent');
		$this->email->to('ezekielarin@gmail.com');
		//$this->email->cc('another@another-example.com');
		$this->email->bcc($email);

		$this->email->subject('Reset Password');
		$this->email->message($this->load->view('email/welcome_ms',$data, TRUE));

		$q = $this->email->send();
		if ($q) {
			return TRUE;
		}
	}



	public function is_admin()
	{
		return $this->session->userdata('role');
	}
	public function islogged()
	{
		return $this->session->userdata('admin_id');
	}
	public function get_user()
	{
		$du = $this->islogged();
		$username = $du;

	   $this->db->select('*');	
	   $this->db->from('admin');	
	   $this->db->where('username',$username);	
	   $query = $this->db->get()->row();
	   if ($query) {
	   		return $query;
	   	}	
	}

	public function logger()
	{
		$data = array(
			'userid' => '',
			'logintime' => '', 
			'ip_address' => '', 
			'browser' => '', 
			'os' => '',  
		    );
		$this->db->insert('login_log',$data);
	}
	
	public function encrypt_password($pass_word)
	{
		return md5($pass_word);
	}
}