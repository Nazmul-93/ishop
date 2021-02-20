<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendsms_library {
    function send_single_sms($company_name,$msg_to,$msg_des)
    {

    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // api info modify on 1 april 19
    // user -reml
    // password - reml123
    //Link: sms.ajuratech.com
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    
    #DCS = 0 > Normal
    #DCS = 8 > Unicode
  //xjrJaxhg6E641cMvUdP5gg
    $message = urlencode($msg_des);

    $url ="http://sms.ajuratech.com/api/mt/SendSMS?APIKey=xjrJaxhg6E641cMvUdP5gg&senderid=8801844215566&channel=Normal&flashsms=0&DCS=0&number=$msg_to&text=$message";
            //echo $url;
    
    $ch = curl_init();

    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

    // grab URL and pass it to the browser
    $response = curl_exec($ch);
    $err = curl_error($ch);

    // close cURL resource, and free up system resources
    curl_close($ch);



//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// SMS API Configure for infobip 
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    //     $username = 'R.creation';
    //     $password = 'It0987654321';

    //     $header = "Basic " . base64_encode($username . ":" . $password);
        
    //     $curl = curl_init();
    //     curl_setopt_array($curl, array(
    //     CURLOPT_URL => "http://api.infobip.com/sms/1/text/single",
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "POST",
    //     CURLOPT_POSTFIELDS => "{ \"from\":\"$company_name\", \"to\":\"$msg_to\", \"text\":\"$msg_des\" }",
    //     CURLOPT_HTTPHEADER => array(
    //     "accept: application/json",
    //     "authorization: Basic Ui5jcmVhdGlvbjpJdDA5ODc2NTQzMjE=",
    //     "content-type: application/json"
    //     ),
    //     ));

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);

    //     curl_close($curl);

    //     if($err)
    //     {
    //         return 'err';
    //     }
    //     else
    //     {
    //         return 'scc';
    //     }
    //
 }

}