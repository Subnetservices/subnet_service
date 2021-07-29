<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payscribem extends CI_Model
{
	

	public function __construct()
	{
		$this->load->helper('date');
    // $api = "44a39831272efe578851ad1e06b39a84810ee1a5"; //mine
    $api = "be5826bed3a72fe99cbfc2f46d488ed329d516de";//seje
    //$api = "ps_live_1a2a769421996c3b38abf2dc5808ec271cfc9be55706fc0b453884126ec78813"
	}

######################################

######################################


    public function buyairtime($network,$phone,$plan)
    {
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.payscribe.ng/api/v1/airtime/vend',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
          "amount": "100",
          "recipent": 08167396941,
          "network": "mtn"
      }',
        CURLOPT_HTTPHEADER => array(
          'Authorization: Bearer ps_live_1a2a769421996c3b38abf2dc5808ec271cfc9be55706fc0b453884126ec78813',
          'Content-Type: text/plain'
        ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      echo $response;
      return $response;
    }



    public function buydata($network,$phone,$plan)
    {
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.payscribe.ng/api/v1/data/vend',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
          "plan": "PSPLAN_58",
          "recipent": "08167396941",
          "network": "mtn"
      }',
        CURLOPT_HTTPHEADER => array(
          'Authorization: Bearer ps_live_1a2a769421996c3b38abf2dc5808ec271cfc9be55706fc0b453884126ec78813',
          'Content-Type: text/plain'
        ),
      ));

      $response = curl_exec($curl);
      $response = "sdsds";

      curl_close($curl);
    //  echo $response;
      return $response;


    }

    
   
}
