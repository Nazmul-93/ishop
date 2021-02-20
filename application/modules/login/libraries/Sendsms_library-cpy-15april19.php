<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendsms_library {
    function send_single_sms($company_name,$msg_to,$msg_des)
    {
        $username = 'R.creation';
        $password = 'It0987654321';

        $header = "Basic " . base64_encode($username . ":" . $password);
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.infobip.com/sms/1/text/single",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{ \"from\":\"$company_name\", \"to\":\"$msg_to\", \"text\":\"$msg_des\" }",
        CURLOPT_HTTPHEADER => array(
        "accept: application/json",
        "authorization: Basic Ui5jcmVhdGlvbjpJdDA5ODc2NTQzMjE=",
        "content-type: application/json"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if($err)
        {
            return 'err';
        }
        else
        {
            return 'scc';
        }
    }

}