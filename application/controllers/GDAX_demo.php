<?php

class GDAX_demo extends BaseController
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("GDAX");

    }

    function index(){
        $endpoints = array(
            "getAccounts",
            "user",
            "listAddress/LTC",
            "listAddress/BTC",
            "listAddress/ETH",
            "createAddress/ETH",
            "createAddress/BTC",
            "createAddress/LTC",
        );

        echo "<ul>";
        foreach($endpoints as $row){
            echo "<li><a target='_blank' href='" . site_url('GDAX_demo/'. $row). "'>".$row."</a></li>";
        }
    }
    function getAccounts(){
        $this->print($this->GDAX->getAccounts());
        
    }

    function listAddress($currency){
        $this->print($this->GDAX->listAddress($currency));
    }

    function createAddress($currency){
        $str = "DEMO_".strtotime('now');
        $this->print($this->GDAX->createAddress($currency,$str));
    }
    
    function user(){
        $this->print($this->GDAX->user());
    }

    function print($result){
        echo "<pre>";
        var_dump($result);
        echo "</pre>";
    }
}
