<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_listing extends BaseController
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("Users_model");
        $this->load->model("Wallet_model");
        $this->load->model("User_crypto_model");
        $this->load->model("User_listing_model");

        $this->page_data = array();
    }

    public function sell($quick_sell = "")
    {

        if (!$this->session->has_userdata("user")) redirect("access/login", "refresh");

        $user_id = $this->session->userdata("user")["user_id"];

        $this->page_data["crypto_wallet"] = $this->Wallet_model->get_crypto_wallet($user_id);
        $this->page_data["quick_sell"] = $quick_sell;

        if ($_POST) {
            $input = $this->input->post();

            $data = array(
                "user_id" => $user_id,
                "crypto_id" => $input["crypto_id"],
                "user_listing_status_id" => 1,
                "markup" => $input["markup"],
                "threshold" => $input["threshold"],
                "price_before" => $input["price_before"],
                "price_after" => $input["price_after"],
                "message" => $input["message"],
                "payment_method" => $input["payment_method"],
                "limit_from" => $input["limit_from"],
                "limit_to" => $input["limit_to"],
                "time_of_payment" => $input["time_of_payment"],
                "amount" => $input["amount"]
            );

            if($quick_sell == "quick"){
                $data["quick_sell"] = 1;
            }

            $this->User_listing_model->add($data);

            redirect("main", "refresh");
        }

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/sell");
        $this->load->view("main/footer");
    }

    public function view_listing($user_listing_id)
    {

        $where = array(
            "user_listing_id" => $user_listing_id
        );

        $user_listing = $this->User_listing_model->get_where($where);

        $this->page_data["user_listing"] = $user_listing[0];

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/view_listing");
        $this->load->view("main/footer");

    }

    public function buy()
    {
        $this->load->view("main/header", $this->page_data);
        // $this->load->view("main/user_details");
        $this->load->view("main/footer");
    }
}
