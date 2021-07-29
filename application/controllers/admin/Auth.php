<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('adminm'));
		$this->load->helper('cookie');
	}

	
	public function index()
	{
		if (!$this->adminm->islogged()) {
			redirect('admin/auth/login');
		}

		$this->load->view('home');
	}

	public function login()
	{
		$data['message'] = "";

		if ($this->adminm->islogged()) {
			redirect('admin');
		}
		if (isset($_POST['login'])) {
			$username = $this->input->post('username');
			$pass = $this->input->post('password');
			$password = $this->adminm->encrypt_password($pass);

             $userdata = $this->checkuser($username,$password);
			if ($userdata) {
				    $data = array(
				    	'admin_id' => $userdata->username, 
				    	'email' => $userdata->email, 
				    	'role' => 'admin', 
				    	'loggedin' => true, 
				    );
				    $this->session->set_userdata($data);
                   
                   #redirect back to source url
                    if (isset($_GET['redir_url'])) {
                    	#redirect back to web app requesting login
                    	redirect($_GET['redir_url']);
                    }else{
                    	redirect('/admin');
                    }
				    
		     }else{
		     	echo "wrong login details";
		     }
		   

		}
		//$ses = $this->session->userdata();
		// $this->output->cache(1); 
		$data['header'] = array(
			'title' => "Login", 
		);
		//$this->load->view('dashboard/_template/header',$data);
		$this->load->view('auth/login', $data);
		//$this->load->view('dashboard/_template/footer');
	}

	public function register()
	{
		if ($this->adminm->islogged()) {
			redirect('/admin/auth');
		}

		$data['username_error'] = '';
		$data['email_error'] = '';
		$data['first_name'] = '';
		$data['last_name'] = '';
		$data['username'] = '';
		$data['email'] = '';
		$data['password_error'] = 'none';
		if (isset($_POST['register'])) {

			//start validation and save user
		  	$registered = $this->adminm->createuser();
		  	if ($reistered) {

				$data['first_name'] = $this->input->post('first_name');
				$data['last_name'] = $this->input->post('last_name');
				$data['username'] = $this->input->post('username');
				$data['email'] = $this->input->post('email');
		  	}else{
		  		$password = $this->input->post('password');
		  		$password2 = $this->input->post('password2');
		  		if ($password!=$password2) {
		  		 $data['password_error'] = 'Password Do not Match';
		  		}
		  		$data['username_error'] = '';
		        $data['email_error'] = '';
		        

		  	}

		}
		
        $data['header'] = array(
			'title' => "Sign Up", 
		);
	//	$this->load->view('dashboard/_template/header',$data);
		$this->load->view('auth/register',$data);
	//	$this->load->view('dashboard/_template/footer');
	}
	public function validate_user()
	{
        $password = $this->input->post('password');
  		$password2 = $this->input->post('password2');
  		if ($password!=$password2) {
  		 $data['password_error'] = 'Password Do not Match';
  		}
  		
         $email_ck = $this->adminm->checkusername($this->input->post('email'));
        if ($email_ck>0) {
        	 $data['email_error'] = 'Account exists with this email';
        }
       
        $username_ck = $this->adminm->checkusername($this->input->post('username'));
        if ($username_ck>0) {
        	$data['username_error'] = 'Username Already Used';
        }
	}

	public function logout()
	{
		$this->adminm->log_out();
		redirect('admin/auth/login');
		    
	}

	public function checkuser($username,$password)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username',$username);
		$this->db->or_where('email',$username);
		$this->db->where('password',$password);
	//	$this->db->join('roles','roles.role_id=users.role');
		$query = $this->db->get()->row();
		if ($query) {
			return $query;
		}
	}
	public function forgot_password()
	{
		$data['message']= "";
		$email = $this->input->post('email');
		if (isset($_POST['email'])) {
			$check = $this->adminm->checkemail($email);
			if ($check) {
				//$data['message']= "Check your email for reset instruction";
				$data['message'] = 'Reset instruction has been sent your email';
				$this->adminm->forgot_password($email);
	
			}else{
				$data['message']= "no such account exists";
			}
			
			
		}else{
			
		}
		$data['header'] = array(
			'title' => "Forgotten Password", 
		);
		//$this->load->view('dashboard/_template/header',$data);
		$this->load->view('auth/forgot_password',$data);
		//$this->load->view('dashboard/_template/footer');

	}

	public function reset_password()
	{
		if (isset($_GET['rscd'])) {
			$rcode = $_GET['rscd'];
			$check = $this->db->query("SELECT email,userid,forgotten_password_code FROM users WHERE forgotten_password_code='$rcode'")->row();

			if ($check) {

				$data['user'] = $check;
				//$this->load->view('dashboard/_template/header',$data);
				$this->load->view('auth/reset_password',$data);
				//$this->load->view('dashboard/_template/footer');
			}

		}
		$data="";
		$this->load->view('auth/reset_password',$data);

	}
	public function change_password()
	{
		if (!$this->adminm->islogged()) {
			redirect('/admin/auth/login');
		}
		$data['message'] = "";
		if (isset($_POST['changepass'])) {
			$pass_word = $this->input->post('password');
			$pass_word2 = $this->input->post('retype_password');

			if ($pass_word==$pass_word2) {
				
					$password = $this->adminm->encrypt_password($pass_word);
					$username = $this->input->post('username');
					$data = array(
						'password' => $password, 
					     );
					$where = array('username' => $username, );
				    $query = $this->db->update('users',$data,$where);
				    if ($query) {
				    	$data['message'] =  "successfully changed password";
				    }
				  }else{
				  	$data['message'] = "password do not match";
				  }
		}
		$data['user'] = $this->adminm->get_user();
      $this->load->view('change_password',$data);
	}

	public function edit_profile()
	{
		if (!$this->adminm->islogged()) {
			redirect('/admin/auth/login');
		}
		if (isset($_POST['update'])) {
			$data = array(
				'first_name' => $this->input->post('first_name'), 
				'last_name' => $this->input->post('last_name'), 
				'phone' => $this->input->post('phone'), 
			);
			$where = array('username' => $this->input->post('username'),);
			$query = $this->db->update('users',$data,$where);
			if ($query) {
				echo "success";
			}
		}

		$data['user'] = $this->adminm->get_user();
		$this->load->view('edit_profile',$data);

	}

	public function testmail()
	{
		$email = "ezekielarin@gmail.com";
		$firstname = "shapiro";
		$this->adminm->mailwelcome($email,$firstname);
	}
}
