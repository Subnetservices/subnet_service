<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Smsm extends CI_Model
{
	

	public function __construct()
	{
		$this->load->helper('date');
		$api = "4qcmkua8pzjEQWGfEhdxbicwKZpMSs4pC2wIgyzfmPl0CyevKBbcTiqGqfg0";
	}



	public function sendsms($message)
	{
	        $phone = "08161814826";
	     // $phone = "07049135258";
	      $ms = urlencode($message);
        //$url = "https://www.bulksmsnigeria.com/api/v1/sms/create?api_token=4qcmkua8pzjEQWGfEhdxbicwKZpMSs4pC2wIgyzfmPl0CyevKBbcTiqGqfg0&from=SubnetData&to=".$phone."&body=".$message."&dnd=4";
         $url = "https://www.bulksmsnigeria.com/api/v1/sms/create?api_token=4qcmkua8pzjEQWGfEhdxbicwKZpMSs4pC2wIgyzfmPl0CyevKBbcTiqGqfg0&from=SubnetData&to=".$phone."&body=".$ms."&dnd=4";
     //  $data = file_get_contents(urlencode($url));
     
    //     $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n")); 
    //   //Basically adding headers to the request
    //     $context = stream_context_create($opts);
    //     $html = file_get_contents($url,false,$context);
    //     $html = htmlspecialchars($html);
    //     return $html;
        
        $ch = curl_init($url); // such as http://example.com/example.xml
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        
        $data = curl_exec($ch);
       
        curl_close($ch);
         return json_encode($data);

	}



	
}
