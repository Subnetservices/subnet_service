<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model(array('usermodel','mazidata_m'=>'mzd'));
		$this->load->helper('cookie');
	}

	public function index()
	{
			
		$data['header'] = array(
			'title' => " Lecturers", 
		);
		//$this->cookie->
        $this->load->view('_template/header');
		$this->load->view('contactus',$data);
		$this->load->view('_template/footer');
	}


	public function airtime($network_id,$phone,$amount)
	{
		$p = $this->mzd->buydata($network_id,$phone,$amount);
		print_r($p);
		echo $p;
	}

	public function data()
    {
      
   $curl = curl_init();

  curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.mazidata.com.ng/api/data/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"network": 1,
	"mobile_number": "08167396941",
	"plan": 2,
	"Ported_number":true}',
	  CURLOPT_HTTPHEADER => array(
	    'Authorization: Token 438adb7c891fe3d17a5b8b53a839b788f2c10840',
	    'Content-Type: application/json'
	  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
var_dump($response);

}
}
