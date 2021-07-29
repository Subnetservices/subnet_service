<?php
//ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Giveaway extends CI_Controller {
 public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url'));
    $this->load->model(array('usermodel','walletm','mazidata_m'=>'mzd','paystackm','smsm'));

    
  }

   
  public function index()
  {
      if (!$this->usermodel->islogged()) {
        redirect('auth/login');
      }
       $data['user'] = $user = $this->usermodel->get_user();
           
      if (isset($_POST['create_airtime'])) {

         $network = $this->network_info($this->input->post('network_id'));
         $data = array(
          'user_id' => $user->uid, 
          'title' =>$this->input->post('title'), 
          'gift_type' =>'airtime', 
          'quantity' =>$this->input->post('quantity'), 
          'network_id' =>$this->input->post('network_id'), 
          'network' =>$network->network, 
          'gvcode' =>rand(11112,99999), 
          'gift_value' =>$this->input->post('airtime_amount'), 
          'created_at' =>date('d-m-Y H:i:s'), 
        );
       $this->db->insert('giveaway',$data);

      }
       
     $data['giveaways'] = $this->giveaways($user->uid);
     $data['header'] = array(
      'title' => "Giveaway - Subnet", 
         );

    $this->load->view('dashboard/_template/header',$data);
    $this->load->view('dashboard/_template/navbar',$data);
    $this->load->view('dashboard/giveaway/home',$data);
    $this->load->view('dashboard/_template/footer');
  }

    public function edit($giveaway_id)
  {
      if (!$this->usermodel->islogged()) {
        redirect('auth/login');
      }
       $data['user'] = $user = $this->usermodel->get_user();
           
      if (isset($_POST['update_giveaway'])) {

         $network = $this->network_info($this->input->post('network_id'));
         $where = array('gvid' => $this->input->post('giveaway_id'), );
         $data = array( 
          'title' =>$this->input->post('title'), 
          'gift_type' =>'airtime', 
          'quantity' =>$this->input->post('quantity'), 
          'network_id' =>$this->input->post('network_id'), 
          'network' =>$network->network, 
          'gift_value' =>$this->input->post('airtime_amount'), 
          'created_at' =>date('d-m-Y H:i:s'),
            );

          $this->db->update('giveaway',$data,$where);

      }
       
     $data['give'] = $this->giveaway($giveaway_id);
     $data['header'] = array(
      'title' => "Dashboard", 
         );

    $this->load->view('dashboard/_template/header',$data);
    $this->load->view('dashboard/_template/navbar',$data);
    $this->load->view('dashboard/giveaway/edit',$data);
    $this->load->view('dashboard/_template/footer');
  }

  public function giveaways($user_id)
  {
    return $this->db->select('*')->from('giveaway')->where('user_id',$user_id)->get()->result();
  }

  public function giveaway($giveaway_id)
  {
    return $this->db->select('*')->from('giveaway')->where('gvid',$giveaway_id)->get()->row();
  }
  
  public function network_info($network_id)
  {
    return $this->db->select('*')->from('products')->where('network_id',$network_id)->get()->row();
  }

    
   
}