<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends BaseController
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Wallet_model");
        $this->load->model("Crypto_model");
        $this->load->model("Transaction_model");
    }

    public function index()
    {

        if (!$this->session->has_userdata("user")) show_404();

        $user_id = $this->session->userdata("user")["user_id"];

        $this->page_data["crypto"] = $this->Crypto_model->get_all();

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/transaction");
        $this->load->view("main/footer");
    }

    function getDepositAddress(){
        $this->load->model("GDAX");
        $address = $this->db->get_where("user_deposit_address",array())->result_array();
    }
    function get_crypto_amount()
    {
        if ($_POST and $this->session->has_userdata("user")) {
            $input = $this->input->post();

            $user_id = $this->session->userdata("user")["user_id"];

            $where = array(
                "crypto_id" => $input["crypto_id"]
            );

            $crypto_wallet = $this->Wallet_model->get_crypto_wallet_where($user_id, $where);

            if (!empty($crypto_wallet)) {

                $this->page_data["crypto_wallet"] = $crypto_wallet[0];
            } else {

                $this->page_data["crypto_wallet"] = array();
            }

            $this->load->view("main/refresh_crypto_amount", $this->page_data);

        } else {
            show_404();
        }
    }

    function loadDeposit(){
        $this->load->model("Transaction_model");
        $address = $this->Transaction_model->getDepositAddress($this->session->userdata('user')['user_id'],$this->input->post("currency"));
        die(json_encode(array(
            "status" => "SUCCESS",
            "data" => $address['value']
        )));
    }

    function deposit()
    {
        if ($_POST and $this->session->has_userdata("user")) {
            $input = $this->input->post();

            $user_id = $this->session->userdata("user")["user_id"];

            $hash = $this->hash($input["password"]);

            $data = array(
                "user_id" => $user_id,
                "transaction_type" => "DEPOSIT",
                "crypto_id" => $input["crypto_id"],
                "address" => $input["address"],
                "password" => $hash["password"],
                "salt" => $hash["salt"],
                "remarks" => $input["remarks"],
            );

            $this->Transaction_model->insert($data);

            redirect("wallet", "refresh");

        } else {
            show_404();
        }
    }

    function withdraw()
    {
        if ($_POST and $this->session->has_userdata("user")) {
            $input = $this->input->post();

            $user_id = $this->session->userdata("user")["user_id"];

            $hash = $this->hash($input["password"]);

            $data = array(
                "user_id" => $user_id,
                "transaction_type" => "WITHDRAW",
                "crypto_id" => $input["crypto_id"],
                "address" => $input["address"],
                "password" => $hash["password"],
                "salt" => $hash["salt"],
                "remarks" => $input["remarks"],
                "amount" => $input["amount"]
            );

            $this->Transaction_model->insert($data);

            redirect("wallet", "refresh");

        } else {
            show_404();
        }
    }

}
