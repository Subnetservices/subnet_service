<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mazidata_m extends CI_Model
{
	

	public function __construct()
	{
		$this->load->helper('date');
    // $api = "44a39831272efe578851ad1e06b39a84810ee1a5"; //mine
    $api = "4c7b4d64135ff64c61653c925776d76e3c16ad0a";//seje
	}

######################################

######################################

	public function checkuser()
    {
       $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://www.mazidata.com.ng/api/users/',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Token  44a39831272efe578851ad1e06b39a84810ee1a5',
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;  
    }

    public function buydata($network,$phone,$plan)
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
          CURLOPT_POSTFIELDS =>'{"network": "'.$network.'",
        "mobile_number": "'.$phone.'",
        "plan": "'.$plan.'",
        "Ported_number":false}',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Token 44a39831272efe578851ad1e06b39a84810ee1a5',
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        print_r($response);
        echo $response;   
    }

    public function data_transactions()
    {
      $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://www.mazidata.com.ng/api/data',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Token 44a39831272efe578851ad1e06b39a84810ee1a5',
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;   
    }
    

    public function buyairtime($network,$phone,$amount)
    {
      $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://www.mazidata.com.ng/api/topup/',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{"network":"'.$network.'",
         "amount":"'.$amount.'", 
         "mobile_number":"'.$phone.'",
         "Ported_number":true,
         "airtime_type":"VTU"}',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Token 44a39831272efe578851ad1e06b39a84810ee1a5',
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        echo $response; 
        return $response;
    }


    public function airtime_transaction()
    {
      $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://www.mazidata.com.ng/api/topup/id',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Token 44a39831272efe578851ad1e06b39a84810ee1a5',
            'Content-Type:  application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;   
    }

    public function utility()
    {
         $curl = curl_init();

        curl_setopt_array($c­url, array(
        CURLOPT_URL => 'https://­www.mazidata.com.ng/­api/data/',
        CURLOPT_RETURNTRANSF­ER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATI­ON => true,
        CURLOPT_HTTP_VERSION­ => CURL_HTTP_VERSION_1_­1,
        CURLOPT_CUSTOMREQUES­T => 'POST',
        CURLOPT_POSTFIELDS =>'{"network": network_id,
        "mobile_number": "09037346247",
        "plan": plan_id,
        "Ported_number":true­}',
        CURLOPT_HTTPHEADER => array(
        'Authorization: Token YOUR SECRET KEY',
        'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function subscription()
	{

      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.mazidata.com.ng/api/cablesub/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{"cablename": cablename id,
      "cableplan" :cableplan id, 
      "smart_card_number": meter}',
        CURLOPT_HTTPHEADER => array(
          'Authorization: Token 44a39831272efe578851ad1e06b39a84810ee1a5',
          'Content-Type: application/json'
        ),
      ));

      $response = curl_exec($curl);
      curl_close($curl);

      echo $response; 
  }
	
}
