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
        $this->load->model("User_trade_model");

        $this->load->library("pagination");

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

            if ($quick_sell == "quick") {
                $data["quick_sell"] = 1;
            }

            $this->User_listing_model->add($data);

            redirect("main", "refresh");
        }

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/sell");
        $this->load->view("main/footer");
    }

    public function buy($user_listing_id)
    {

        $where = array(
            "user_listing_id" => $user_listing_id
        );

        $user_listing = $this->User_listing_model->get_where($where);

        $this->page_data["user_listing"] = $user_listing[0];

        if($_POST){
            $input = $this->input->post();

            if (!$this->session->has_userdata("user")) redirect('access/login', "refresh");

            $user_id = $this->session->userdata("user")["user_id"];

            $data = array(
                "buyer_id" => $user_id,
                "seller_id" => $user_listing[0]["user_id"],
                "user_listing_id" => $user_listing[0]["user_listing_id"],
                "myr_amount" => $input['myr_amount'],
                "btc_amount" => $input['btc_amount'],
                'user_trade_status_id' => 1
            );

            $this->User_trade_model->insert($data);

            redirect("wallet", "refresh");
        }

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/buy");
        $this->load->view("main/footer");

    }

    public function view_listing($page = "")
    {

        $count = $this->User_listing_model->get_count();

        $per_page = 10;

        $config['base_url'] = base_url() . '/user_listing/view_listing';
        $config['total_rows'] = $count[0]['count'];
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = true;

        $config['full_tag_open'] = "<ul class='pagination pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);

        $this->page_data["pagination"] = $this->pagination->create_links();

        $this->page_data["user_listing"] = $this->User_listing_model->get_paging($page, $per_page);

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/view_listing");
        $this->load->view("main/footer");
    }
}
