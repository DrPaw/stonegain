<?php

class GDAX extends CI_Model{

    function __construct(){
        parent::__construct();

        $this->apiKey = "dOFb9XvIM0BRa4tA";
        $this->apiSecret = "KszIRBcE6kTYskS5roOkL9sQM8yDyEzy";
        $this->endPoint = "https://api.coinbase.com/v2/";
        $this->requestPath = "/v2/";
    }




       /*
    - HOW DEPOSIT WORKS
        - user sends request
        - server creates a 1 time use address
        - server will save the transaction value
    */

    function getAccounts(){
        $result = $this->get('accounts');

        $result = json_decode($result);


        return array(
            "status" => "SUCCESS",
            "data" => $result->data
        );
        
    }

    function user(){
        $result = $this->get("user");

        $result = json_decode($result);
        return array(
            "status" => "SUCCESS",
            "data" => $result->data
        );
    }

    function listAddress($currency){
        $accountResource = $this->db->get_where("account_resource",array(
            "currency" => $currency
        ))->result_array();

        if (!count($accountResource)){
            return array(
                "status" => "ERROR",
                "message" => "Currency not found"
            );
        }

        $path = "accounts/". $accountResource[0]['value']."/addresses";
        $result = $this->get($path);

        $result = json_decode($result);
        $addresses = $result->data;
        

        return array('status' => 'SUCCESS', 'data' => $addresses);
    }

    function createAddress($currency,$addressName){
        $accountResource = $this->db->get_where("account_resource",array(
            "currency" => $currency
        ))->result_array();

        if (!count($accountResource)){
            return array(
                "status" => "ERROR",
                "message" => "Currency not found"
            );
        }

        $path = "accounts/". $accountResource[0]['value']."/addresses";
        $result = $this->post($path,array(
            "name" => $addressName
        ));

        $result = json_decode($result);
        $addresses = $result->data;
        

        return array('status' => 'SUCCESS', 'data' => $addresses);

    }

    function getAddressTransactions($account_id, $address_id){
        $path = "accounts/".$account_id."/addresses/" . $address_id . "/transactions";
        $result = $this->get($path);

        return array('status'=>'SUCCESS','data'=> $result);
    }


    // ================ UTILITIES =======================
    //=================== DO NOT TOUCH UNLESS U KNOW WHAT YOU ARE DOING. =================
    function post($path,$fields){
        $url = $this->endPoint . $path;
        $ch = curl_init($url);
        $fieldStr = "";
        $i = 0;
        foreach($fields as $key => $value){
            if($i > 0){
                $fieldStr .= "&";
            }
            $fieldStr .= $key."=".$value;   
            $i++;
        }

        $header = $this->getHeaders('POST',$path,$fieldStr);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$fieldStr);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);

        return $result;
    }


    function get($path){
        $url = $this->endPoint . $path;
        $ch = curl_init($url);
        
        $header = array();
        $header = $this->getHeaders('GET',$path);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
        
    }




 

    function sign($timestamp, $method, $path, $body){
        $str = $timestamp . strtoupper($method) . $this->requestPath.$path . $body;
        $hash = hash_hmac('sha256',$str,$this->apiSecret);

        return $hash;
    }

    function getHeaders($method, $path, $body = ''){
        $timestamp = strtotime('now');
        $sign = $this->sign($timestamp, $method, $path, $body);
        $header = array(
            "CB-ACCESS-KEY: ". $this->apiKey,
            "CB-ACCESS-SIGN: ". $sign,
            "CB-ACCESS-TIMESTAMP: " . $timestamp,
            "CB-VERSION: 2018-05-20",
            "ContentType: application/json"
        );
        return $header;
    }
}