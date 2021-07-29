<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Paystack { 
    public function __construct() { 

        $this->apikey = 'sk_test_95ba5920f7fa06da363ffff132d7937913608cc1';
       // $this->load->database();
        }

    protected function getPaymentInfo($ref) {
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
                'Authorization: Bearer '.$this->apikey]
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
            'Authorization: Bearer '.$this->apikey]
        );
        $request = curl_exec($ch);
        curl_close($ch);
        //
        if ($request) {
            $result = json_decode($request, true);
            // print_r($result);
         // return $result;

            if($result){
                if($result['data']){
                    //something came in
                    if($result['data']['status'] == 'success'){
                           $this->updatetx($ref,$status='success');
                        //echo "Transaction was successful";
                        header("Location: ".base_url().'courses/payment-status/success/'.$ref);

                    }else{
                        $this->updatetx($ref,$status='failed');
                        // the transaction was not successful, do not deliver value'
                        // print_r($result);  //uncomment this line to inspect the result, to check why it failed.
                        header("Location: ".base_url().'courses/payment-status/fail/'.$ref);

                    }
                }
                else{

                    //echo $result['message'];
                    header("Location: ".base_url().'courses/payment-status/fail/'.$ref);
                }

            }else{
                //print_r($result);
                //die("Something went wrong while trying to convert the request variable to json. Uncomment the print_r command to see what is in the result variable.");
                header("Location: ".base_url().'courses/payment-status/fail/'.$ref);
            }
        }else{
            //var_dump($request);
            //die("Something went wrong while executing curl. Uncomment the var_dump line above this line to see what the issue is. Please check your CURL command to make sure everything is ok");
            header("Location: ".base_url().'courses/payment-status/fail/'.$ref);
        }

    }


    public function paystack_standard($amount,$email,$user_id,$course_id) {
        //
        $result = array();
        $amount = $amount * 100;
        $ref = rand(1000000, 999999999);
        $callback_url = base_url().'courses/verify/paystack/?ref='.$ref;
        //save transaction
       $this->savetx($user_id,$amount,$course_id,$ref);
        $postdata =  array(
            'email' => $email, 
            'amount' => $amount,
            "reference" => $ref, 
            "callback_url" => $callback_url
        );

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
            'Authorization: Bearer pk_test_47f64fad18c03edc23dbef5e8ccf63a76df1ebe9',
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
    private function savetx($user_id,$amount,$course_id,$ref)
    {
        $data = array(
            'user_id' => $user_id, 
            'course_id' => $course_id, 
            'method' => 'paystack', 
            'amount' => $amount, 
            'reference' => $ref, 
            'status' => 'pending', 
        );
      //  $this->db->insert('transactions',$data);
    }

    private function updatetx($ref,$status)
    {
        $where = array('reference' => $ref);
        $data = array('status' => $status,);
        $this->db->update('transactions',$data,$where);
    }

    private function addcourse($user_id,$course_id)
    {
        $data = array(
            'user_id' => $user_id, 
            'course_id' => $course_id, 
        );
      //  $this->db->insert('student_courses',$data);
    }
}