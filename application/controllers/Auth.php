<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends CI_Controller {
 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('usermodel'));
		$this->load->helper('cookie');
	}

	
	public function index()
	{
		if (!$this->usermodel->islogged()) {
			redirect('auth/login');
		}

		$this->load->view('home');
	}

	public function login()
	{
		$data['message'] = "";
		if ($this->usermodel->islogged()) {
			redirect('/dashboard');
		}
		
		if (isset($_POST['login'])) {
			$username = $this->input->post('username');
			$pass = $this->input->post('password');
			$password = $this->usermodel->encrypt_password($pass);

             $userdata = $this->checkuser($username,$password);
             if ($userdata) {
             	
                    
					if ($userdata->blocked=='yes') {
                        $data['message'] = '<div class="alert alert-danger alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> your Acount has been Blocked contact the Support</span>
                        </div>';
					}else{
						    $data = array(
						    	'username' => $userdata->username, 
						    	'email' => $userdata->email, 
						    	//'role' => $userdata->role, 
						    	'loggedin' => true, 
						    );
						    $this->session->set_userdata($data);
						    #redirect back to source url
		                    redirect('/dashboard');
		                   
                         }
				    
		     }else{
		     	$data['message'] = '<div class="alert alert-warning alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Login Details incorrect</span>
                        </div>';
		     }
		   

		}
		//$ses = $this->session->userdata();
		// $this->output->cache(1); 
		$data['header'] = array(
			'title' => "Login", 
		);
		//$this->load->view('_template/header',$data);
		$this->load->view('auth/login',$data);
		//$this->load->view('_template/footer');
	}

	public function register()
	{
		$data['ref'] = "";
		if ($this->usermodel->islogged()) {
			redirect('/dashboard/');
		}
		$data['phone_error'] = "";
		$data['email_error'] = "";
		$data['email'] = "";
		$data['phone'] = "";
		$data['full_name'] = "";


		if (isset($_GET['ref'])) {
			$data['ref'] = $_GET['ref'];
		}

		if (isset($_POST['register'])) {
			if (isset($_POST['register'])) {
            $email = $this->input->post('email');
			$emailck = $this->db->select('*')->from('users')->where('email',$email)->get()->row();

			$phone = $this->input->post('phone_number');
			$phoneck = $this->db->select('*')->from('users')->where('phone',$phone)->get()->row();


			if ($phoneck!="" | $emailck!="") {
				$data['email'] = $this->input->post('email');
				$data['phone'] = $this->input->post('phone_number');
				$data['full_name'] = $this->input->post('full_name');
				
				if ($phoneck!="") {
					$data['phone_error'] = 'Account with this Phone Number Already exists';
				}else{
					$data['phone_error'] ="";
				}


				if($emailck!="") {
					$data['email_error'] = 'Account with this email Already exists';
				}else{
					$data['email_error'] = "";
				}

				
			}else{
				$registered = $this->usermodel->createuser();
				if ($registered) {
					redirect('/auth/login');
				}
			}

		}
			//start validation and save user
		  	// $registered = $this->usermodel->createuser();
		  	// if ($registered) {
		  	// 	echo "successfully registered";
		  	// }else{
		  	// 	echo "an error has occured";
		  	// }
		}
		
        $data['header'] = array(
			'title' => "Sign Up", 
		);
		//$this->load->view('_template/header',$data);
		$this->load->view('auth/register',$data);
		//$this->load->view('_template/footer');
	}


	public function checkmail()
	{
		$email = $this->input->get('email');
		$query = $this->db->select('count(email) as count')->from('users')->where('email',$email)->get()->row();
		if ($query->count>0) {
			 echo "exists";
		}else{
			echo "nonexists";
		}

	}
	public function checkphone()
	{
		$phone = $this->input->get('phone');
		$query = $this->db->select('count(phone) as count')->from('users')->where('phone',$phone)->get()->row();
		if ($query->count>0) {
			 echo "exists";
		}else{
			echo "nonexists";
		}

	}
	public function validate_user()
	{
        $password = $this->input->post('password');
  		$password2 = $this->input->post('password2');
  		if ($password!=$password2) {
  		 $data['message'] = 'Password Do not Match';
  		}
  		
         $email_ck = $this->usermodel->checkemail($this->input->post('email'));
        if ($email_ck>0) {
        	 $data['message'] = 'Account exists with this email';
        }
       
        $username_ck = $this->usermodel->checkusername($this->input->post('username'));
        if ($username_ck>0) {
        	$data['message'] = 'Username Already Used';
        }
        $account_num = $this->usermodel->account_num($this->input->post('username'));
        if ($username_ck>0) {
        	$data['message'] = 'Username Already Used';
        }
	}

	public function logout()
	{
		$this->usermodel->log_out();
		redirect('/login');
		    
	}

	public function checkuser($username,$password)
	{
		$this->db->select('*');
		$this->db->from('users');
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
			$check = $this->usermodel->checkemail($email);
			if ($check) {
				//$data['message']= "Check your email for reset instruction";
				$data['message'] = 'Reset instruction has been sent your email';
				$this->usermodel->forgot_password($email);
	
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
		if (!$this->usermodel->islogged()) {
			//redirect('auth/login');
		}
		$data['message'] = "";
		if (isset($_POST['changepass'])) {
			$pass_word = $this->input->post('password');
			$pass_word2 = $this->input->post('retype_password');

			if ($pass_word==$pass_word2) {
				
					$password = $this->usermodel->encrypt_password($pass_word);
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
		$data['user'] = $this->usermodel->get_user();
      $this->load->view('auth/change_password',$data);
	}

	public function phone_activation()
	{
		$data['message'] = "";
		if (isset($_POST['verify'])) {
			$where = array('activation_code' => $this->input->post('code'), );
			$data = array('active' => 'yes', );
			$query = $this->db->update('users',$data,$where);
			if ($query) {
				$data['message'] = "";
			}
			
		}
      $this->load->view('auth/phone_verification',$data);
	}
	public function activationcode($code)
	{
		$this->db->select('uid, activation_code');
		$this->db->from('users');
		$this->db->where('activation_code',$code);
		$query = $this->db->get()->row();
		return $query;
	}
	



	public function edit_profile()
	{
		if (!$this->usermodel->islogged()) {
			redirect('auth/login');
		}
		if (isset($_POST['update'])) {
			$data = array(
				'first_name' => $this->input->post('first_name'), 
				'last_name' => $this->input->post('last_name'), 
				'phone' => $this->input->post('phone'), 
			);
			$where = array('username' => $this->input->post('username'), );
			$query = $this->db->update('users',$data,$where);
			if ($query) {
				echo "success";
			}
		}

		$data['user'] = $this->usermodel->get_user();
		$this->load->view('edit_profile',$data);

	}

	public function testmail()
	{
		$email = "ezekielarin@gmail.com";
		$firstname = "shapiro";
		$this->usermodel->mailwelcome($email,$firstname);
	}
}
