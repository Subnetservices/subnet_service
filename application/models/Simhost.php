<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Simhost extends CI_Model
{
	

	public function __construct()
	{
		$this->load->helper('date');
		$this->load->model(array('walletm','referralm'));
		$this->server_id = 'EZMTNDDBC';
		$this->apikey = 'f36bf7c5a34c12bf654843bea3d4b6427036b1de8218d88aef3becc31f98500f';
		  $this->callback_url = "";

	}

	

	public function sendpost($url, $data) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($ch);
		curl_close($ch);
	}

    public function smsgateway($phone,$plan,$network)
    {
         $ref = rand(1111,999999);
        if ($network=='glo') {
          # code...
          // $glo_sms = $phone_number." ".$dataplan." 1234";
          // $ussd = "*123*".$phone_number."*".$dataplan."*1234#";
          $url = "https://simhostng.com/api/sms";
          $data = array(
            'apikey' => $this->apikey, 
            'server' => $this->server_id, 
            'sim' => 1, 
            'number' => "*127*".$plan."*".$phone."#", 
           // 'message' =>  "",  
            'ref' => $ref, 
            'url' =>  $this->callback_url, //callback url
          );
          $this->sendpost($url, $data);

        }elseif ($network=='airtel') {
          # code...
          $url = "https://simhostng.com/api/sms";
          $data = array(
            'apikey' => $this->apikey, 
            'server' => $this->server_id, 
            'sim' => 2, 
            'number' => '131', 
            'message' =>  $phone." ".$plan." 1234", 
            'ref' => $ref, 
            'url' =>  $this->callback_url, //callback url
          );
          $this->sendpost($url, $data);

        }elseif ($network=='mtn') {
          # code...
          $url = "https://simhostng.com/api/ussd";
          $data = array(
            'apikey' => $this->apikey, 
            'server' => $this->server_id, 
            'sim' => 1, 
            'number' => '*461*'.$phone.'*'.$plan.'*1234#', 
           // 'message' =>  "", 
            //'message' =>  "SMEA ".$phone." ".$plan." 1234", 
            'ref' => $ref, 
            'url' =>  $this->callback_url, //callback url
          );
          $this->sendpost($url, $data);
        }elseif ($network=='9mobile') {
          # code...
          $url = "https://simhostng.com/api/sms";
          $data = array(
            'apikey' => $this->apikey, 
            'server' => $this->server_id, 
            'sim' => 4, 
            'number' => "*229*9*pin*".$plan."*".$phone."*3#", 
           // 'message' =>  "",  
            'ref' => $ref, 
            'url' =>  $this->callback_url, //callback url
          );
          $this->sendpost($url, $data);

        }
    }

	

	
}
