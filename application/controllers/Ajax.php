<?php

class Ajax extends BaseController
{
    function __construct()
    {
        parent::__construct();

        $this->load->model("Wallet_model");
        $this->load->model("Crypto_model");
    }

    function get_user_crypto_data()
    {
        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                "crypto_id" => $input["crypto_id"],
            );

            $crypto_wallet = $this->Wallet_model->get_crypto_wallet_where($input["user_id"], $where);

            $this->page_data["crypto_wallet"] = (!empty($crypto_wallet)) ? $crypto_wallet[0] : array();

            $this->load->view("main/crypto_refresh_details", $this->page_data);
        }
    }

    function set_max_amount(){
        if($_POST){
            $input = $this->input->post();

            $where = array(
                "crypto_id" => $input["crypto_id"],
            );

            $crypto_wallet = $this->Wallet_model->get_crypto_wallet_where($input["user_id"], $where);

            (!empty($crypto_wallet)) ? die($crypto_wallet[0]["available_amount"]) : 0;

        }
    }

    function get_crypto_price(){
        if($_POST){
            $input = $this->input->post();

            $where = array(
                "crypto_id" => $input["crypto_id"]
            );

            $crypto = $this->Crypto_model->get_where($where);

            (!empty($crypto))? die($crypto[0]["price"]) : 0.00;
            
        }
    }
}

?>