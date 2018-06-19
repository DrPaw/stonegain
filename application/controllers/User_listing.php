<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_listing extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("Users_model");
        $this->load->model("Wallet_model");
        $this->load->model("User_crypto_model");
        $this->load->model("User_listing_model");
        $this->load->model("User_trade_model");
        $this->load->model("Account_resource_model");
        $this->load->model("User_rating_model");
        $this->load->model("User_trade_info_model");

        $this->load->library("pagination");

        $this->page_data = array();

        $this->load->model("User_trade_model");
        if ($this->session->has_userdata("user")) {
            $where = array(
                "buyer_id" => $this->session->userdata("user")['user_id'],
                "user_trade.user_trade_status_id <" => "4"
            );

            $this->page_data["buys_processing"] = $this->User_trade_model->get_offers_where($where);
        }
    }

    public function add()
    {
        if (!$this->session->has_userdata("user")) redirect("access/login", "refresh");

        $user_id = $this->session->userdata("user")["user_id"];

        if ($_POST) {
            $input = $this->input->post();

            $data = array(
                "user_id" => $user_id,
                "crypto_id" => $input["crypto_id"],
                "amount" => $input["amount"],
                "markup" => $input["markup"],
                "threshold" => $input["threshold"],
                "price_before" => $input["price_before"],
                "price_after" => $input["price_after"],
                "limit_from" => $input["limit_from"],
                "limit_to" => $input["limit_to"],
                "payment_method" => $input["payment_method"],
                "message" => $input["message"],
                "type" => $input["type"]
            );

            if ($input["type"] == "buy") {
                $data["payment_method"] = "";
            }

            if ($input["type"] == "sell") {
                $data["time_of_payment"] = $input["time_of_payment"];
            }

            $user_listing_id = $this->User_listing_model->add($data);

            redirect("user/profile", "refresh");
        }

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/add_listing");
        $this->load->view("main/footer");
    }

    public function sell($user_listing_id)
    {

        if (!$this->session->has_userdata("user")) redirect("access/login", "refresh");

        $user_id = $this->session->userdata("user")["user_id"];

        $where = array(
            "user_listing_id" => $user_listing_id
        );

        $user_listing = $this->User_listing_model->get_where($where);

        $where = array(
            "crypto_id" => $user_listing[0]["crypto_id"]
        );

        $user_crypto = $this->Wallet_model->get_crypto_wallet_where($user_id, $where);

        if (empty($user_crypto) or $user_crypto[0]["available_amount"] < $user_listing[0]["amount"]) redirect("main/cannot_trade", "refresh");

        $this->page_data["user_listing"] = $user_listing[0];

        if ($_POST) {
            $input = $this->input->post();

            $data = array(
                "seller_id" => $user_id,
                "buyer_id" => $user_listing[0]["user_id"],
                "user_listing_id" => $user_listing[0]["user_listing_id"],
                "myr_amount" => $input['myr_amount'],
                "btc_amount" => $input['btc_amount'],
                'user_trade_status_id' => 1,
                "payment_method" => $input["payment_method"],
                "time_of_payment" => $input["time_of_payment"]
            );

            $this->User_trade_model->insert($data);

            redirect("trade_management/sell", "refresh");
        }

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/sell");
        $this->load->view("main/footer");
    }

    public function buy($user_listing_id)
    {

        if (!$this->session->has_userdata("user")) redirect('access/login', "refresh");

        $user_id = $this->session->userdata("user")["user_id"];

        if ($user_listing_id == "quick_buy") {
            $input = $this->input->get();

            $where = array(
                "user_listing.user_id !=" => $user_id
            );

            if (!empty($input["amount"])) $where["amount >="] = $input["amount"];
            if (!empty($input["currency"])) $where["crypto"] = $input["currency"];

            $user_listing = $this->User_listing_model->get_quick_buy($where);

        } else {
            $where = array(
                "user_listing_id" => $user_listing_id
            );

            $user_listing = $this->User_listing_model->get_where($where);
        }

        if (empty($user_listing)) redirect("main/no_result", "refresh");
        $this->page_data["user_listing"] = $user_listing[0];

        if ($_POST) {
            $input = $this->input->post();

            $data = array(
                "buyer_id" => $user_id,
                "seller_id" => $user_listing[0]["user_id"],
                "user_listing_id" => $user_listing[0]["user_listing_id"],
                "myr_amount" => $input['myr_amount'],
                "btc_amount" => $input['btc_amount'],
                'user_trade_status_id' => 1
            );

            $this->User_trade_model->insert($data);

            redirect("trade_management/buy", "refresh");
        }

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/buy");
        $this->load->view("main/footer");

    }

    public function view_listing($page = "")
    {
        if ($page == "") {
            $page = 1;
        }

        $per_page = 10;

        if ($_GET) {
            $input = $this->input->get();
            $where = array();
            if (!empty($input["currency"])) $where["crypto"] = $input["currency"];
            if (!empty($input["payment_method"])) $where["payment_method"] = $input["payment_method"];

            $count = $this->User_listing_model->get_count_where($where);
            $this->page_data["user_listing"] = $this->User_listing_model->get_paging_where($page, $per_page, $where);
        } else {
            $count = $this->User_listing_model->get_count();
            $this->page_data["user_listing"] = $this->User_listing_model->get_paging($page, $per_page);
        }

        $config['base_url'] = base_url() . 'user_listing/view_listing';
        $config['total_rows'] = $count[0]['count'];
        $config['per_page'] = $per_page;
        $config["cur_page"] = $page;
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

        // $this->debug($config);

        $this->pagination->initialize($config);

        $this->page_data["pagination"] = $this->pagination->create_links();
        $this->page_data["currency_list"] = $this->Account_resource_model->get_all();

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/view_listing");
        $this->load->view("main/footer");
    }

    public function view_buy_listing($page = "")
    {
        if ($page == "") {
            $page = 1;
        }

        $per_page = 10;

        $where = array(
            "type" => "sell"
        );

        if ($_GET) {
            $input = $this->input->get();
            if (!empty($input["currency"])) $where["crypto"] = $input["currency"];
            if (!empty($input["payment_method"])) $where["payment_method"] = $input["payment_method"];

            $count = $this->User_listing_model->get_count_where($where);
            $this->page_data["user_listing"] = $this->User_listing_model->get_paging_where($page, $per_page, $where);
        } else {
            $count = $this->User_listing_model->get_count();
            $this->page_data["user_listing"] = $this->User_listing_model->get_paging_where($page, $per_page, $where);
        }

        $config['base_url'] = base_url() . 'user_listing/view_buy_listing';
        $config['total_rows'] = $count[0]['count'];
        $config['per_page'] = $per_page;
        $config["cur_page"] = $page;
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

        // $this->debug($config);

        $this->pagination->initialize($config);

        $this->page_data["pagination"] = $this->pagination->create_links();
        $this->page_data["currency_list"] = $this->Account_resource_model->get_all();

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/view_listing");
        $this->load->view("main/footer");
    }

    public function view_sell_listing($page = "")
    {
        if ($page == "") {
            $page = 1;
        }

        $per_page = 10;

        $where = array(
            "type" => "buy"
        );

        if ($_GET) {
            $input = $this->input->get();
            if (!empty($input["currency"])) $where["crypto"] = $input["currency"];
            if (!empty($input["payment_method"])) $where["payment_method"] = $input["payment_method"];

            $count = $this->User_listing_model->get_count_where($where);
            $this->page_data["user_listing"] = $this->User_listing_model->get_paging_where($page, $per_page, $where);
        } else {
            $count = $this->User_listing_model->get_count();
            $this->page_data["user_listing"] = $this->User_listing_model->get_paging_where($page, $per_page, $where);
        }

        $config['base_url'] = base_url() . 'user_listing/view_sell_listing';
        $config['total_rows'] = $count[0]['count'];
        $config['per_page'] = $per_page;
        $config["cur_page"] = $page;
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

        // $this->debug($config);

        $this->pagination->initialize($config);

        $this->page_data["pagination"] = $this->pagination->create_links();
        $this->page_data["currency_list"] = $this->Account_resource_model->get_all();

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/view_listing");
        $this->load->view("main/footer");
    }

    function details($user_listing_id, $user_trade_id)
    {

        if (!$this->session->userdata("user")["user_id"]) redirect("access/login", "refresh");

        $user_id = $this->session->userdata("user")["user_id"];

        $where = array(
            "user_trade.user_listing_id" => $user_listing_id,
            "user_trade_id" => $user_trade_id,
        );

        $user_trade = $this->User_trade_model->get_where_involved($where, $user_id);

        if (empty($user_trade)) show_404();

        $where = array(
            "user_listing_id" => $user_listing_id
        );

        $user_listing = $this->User_listing_model->get_where($where);

        $where = array(
            "user_id" => $this->session->userdata('user')['user_id'],
            "user_trade_id" => $user_trade_id
        );

        $user_rating = $this->User_rating_model->get_where($where);

        if (!empty($user_rating)) {
            $this->page_data["user_rating"] = $user_rating[0];
        }

        $this->page_data["user_listing"] = $user_listing[0];
        $this->page_data["user_trade"] = $user_trade[0];

        if ($_POST) {
            if ($_FILES) {
                $error = "";
                if (!empty($_FILES['receipt']['name'])) {
                    $config = array(
                        "allowed_types" => "gif|png|jpg|jpeg",
                        "upload_path" => "./images/receipt/",
                        "path" => "images/receipt/"
                    );

                    $this->load->library("upload", $config);
                    if ($this->upload->do_upload("receipt")) {
                        $receipt = $config['path'] . $this->upload->data()['file_name'];
                    } else {
                        die($this->upload->display_errors());
                    }
                } else {
                    die("Please upload a receipt.");
                }
                if ($error == "") {
                    $where = array(
                        "user_trade_id" => $user_trade_id
                    );

                    $data = array(
                        "receipt" => $receipt,
                        "user_trade_status_id" => 2
                    );

                    $this->User_trade_model->update_where($where, $data);

                    redirect("user_listing/details/" . $user_listing_id . "/" . $user_trade_id, "refresh");
                }
            }
        }

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/details");
        $this->load->view("main/footer");

    }

    function rate_trade($user_listing_id, $user_trade_id, $rating)
    {
        if ($rating != "good" and $rating != "bad") show_404();

        $where = array(
            "user_trade_id" => $user_trade_id
        );

        $user_trade = $this->User_trade_model->get_where($where);

        if (empty($user_trade)) show_404();

        $data = array(
            "user_id" => $this->session->userdata('user')['user_id'],
            "target_id" => $user_trade[0]["seller_id"],
            "user_trade_id" => $user_trade_id,
            "rating" => $rating,
        );

        $this->User_rating_model->insert($data);

        $where = array(
            "target_id" => $user_trade[0]["seller_id"]
        );

        $user_total_rating = $this->User_rating_model->get_where($where);

        $user_total_rating = count($user_total_rating);

        $where = array(
            "target_id" => $user_trade[0]["seller_id"],
            "rating" => "good"
        );

        $total_good_rating = $this->User_rating_model->get_where($where);

        $total_good_rating = count($total_good_rating);

        $rating_percentage = ($total_good_rating / $user_total_rating) * 100;

        $data = array(
            "rating" => $rating_percentage
        );

        $where = array(
            "user_id" => $user_trade[0]["seller_id"]
        );

        $this->User_trade_info_model->update_where($where, $data);

        redirect('user_listing/details/' . $user_listing_id . '/' . $user_trade_id, "refersh");
    }

    function quick_transaction()
    {
        if ($_POST) {
            $input = $this->input->post();

            if (!$this->session->userdata("user")["user_id"]) redirect("access/login", "refresh");

            $user_id = $this->session->userdata("user")["user_id"];


            $where = array(
                "user_listing.user_id !=" => $user_id
            );

            if (!empty($input["amount"])) $where["amount >="] = $input["amount"];
            if (!empty($input["currency"])) $where["crypto"] = $input["currency"];

            if ($input["type"] == "quick_buy") {
                $user_listing = $this->User_listing_model->get_quick_buy($where);
            } else if ($input["type"] == "quick_sell") {
                $user_listing = $this->User_listing_model->get_quick_sell($where);
            }

            if (empty($user_listing)) redirect("main/no_result", "refresh");
            
            if ($input["type"] == "quick_buy") {
                redirect("user_listing/buy/" . $user_listing[0]["user_listing_id"], "refresh");
            } else if ($input["type"] == "quick_sell") {
                redirect("user_listing/sell/" . $user_listing[0]["user_listing_id"], "refresh");
            }

        } else {
            redirect("main", "refresh");
        }
    }
}
