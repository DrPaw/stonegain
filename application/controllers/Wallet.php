<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Wallet extends BaseController
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Wallet_model");
        $this->load->model("Crypto_model");
    }

    public function index()
    {

        if (!$this->session->has_userdata("user")) show_404();

        $user_id = $this->session->userdata("user")["user_id"];

        $crypto_wallet = $this->Wallet_model->get_crypto_wallet($user_id);

        $crypto_wallet = $this->sort_crypto_wallet($crypto_wallet);

        $this->page_data["crypto_wallet"] = $crypto_wallet;

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/wallet");
        $this->load->view("main/footer");
    }

    function sort_crypto_wallet($crypto_wallet)
    {
        if (empty($crypto_wallet)) show_404();

        $crypto = $this->Crypto_model->get_all();

        $sorted_wallet = array();
        foreach ($crypto as $row) {
            foreach ($crypto_wallet as $wallet_row) {
                if ($row["crypto"] == $wallet_row["crypto"]) {
                    $crypto_data = array(
                        "crypto" => $row["crypto"],
                        "total_amount" => $wallet_row["total_amount"],
                        "available_amount" => $wallet_row["available_amount"],
                        "locked_count" => $wallet_row["locked_count"]
                    );
                    break;
                } else {
                    $crypto_data = array(
                        "crypto" => $row["crypto"],
                        "total_amount" => "0.00000000",
                        "available_amount" => "0.00000000",
                        "locked_count" => 0
                    );
                }
            }
            array_push($sorted_wallet, $crypto_data);
        }

        return $sorted_wallet;
    }

}
