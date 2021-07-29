<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Paystackm extends CI_Model
{
    

    public function __construct()
    {
        $this->load->helper('date');
        $this->load->helper('url');
        $apikey = "sk_test_a1c50da478d19a34d89dae89841695f10755a4bb";
      //  $apikey = "sk_live_96b483875187d57710ac5e1d298dea67e07fa8a0";
    }

    
    private function getPaymentInfo($ref) {
        $result = array();
        $url = 'https://api.paystack.co/transaction/verify/'.$ref;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer '.$apikey]
        );
        $request = curl_exec($ch);
        curl_close($ch);
        //
        $result = json_decode($request, true);
        //
        return $result['data'];

    }

    public function verify_payment($ref) {
        $result = array();
        $url = 'https://api.paystack.co/transaction/verify/'.$ref;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer sk_live_96b483875187d57710ac5e1d298dea67e07fa8a0']
        );
        $request = curl_exec($ch);
        curl_close($ch);
        //
        if ($request) {
            $result = json_decode($request, true);
            return $result;
           }

    }


    public function paynow($amount,$email,$ref,$phone,$callback_url) {
        //
           
                $result = array();
                $amount = $amount * 100;
                //$ref = rand(1000000, 9999999999);
                
                $postdata =  array('email' => $email, 'amount' => $amount,"reference" => $ref, "callback_url" => $callback_url);
                //
                $url = "https://api.paystack.co/transaction/initialize";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($postdata));  //Post Fields
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                //
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $headers = [
                    'Authorization: Bearer sk_live_96b483875187d57710ac5e1d298dea67e07fa8a0',
                    'Content-Type: application/json',
                ];
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $request = curl_exec ($ch);
                curl_close ($ch);
                //
                if ($request) {
                    $result = json_decode($request, true);
                }

                $redir = $result['data']['authorization_url'];
                 header("Location: ".$redir);

    }

    public function success($ref) {
        $data = array();
        $info = $this->getPaymentInfo($ref);
         //
        $data['title'] = "Paystack InLine Demo";
        $data['amount'] = $info['amount']/100;
        //
        $this->load->view('success', $data);
    }

}
