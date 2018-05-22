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
        $this->load->model("Account_resource_model");

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

        if (!$this->session->has_userdata("user")) redirect('access/login', "refresh");

        $user_id = $this->session->userdata("user")["user_id"];

        if($user_listing_id == "quick_buy"){
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

        $per_page = 10;

        if($_GET) {
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

        $this->page_data["user_listing"] = $user_listing[0];
        $this->page_data["user_trade"] = $user_trade[0];

        if($_POST){
            if($_FILES){
                $error = "";
                if (!empty($_FILES['receipt']['name'])) {
                    $config = array(
                        "allowed_types" => "gif|png|jpg|jpeg",
                        "upload_path" => "./images/receipt/",
                        "path" => "images/receipt/");
    
                    $this->load->library("upload", $config);
                    if ($this->upload->do_upload("receipt")) {
                        $receipt = $config['path'] . $this->upload->data()['file_name'];
                    } else {
                        die($this->upload->display_errors());
                    }
                } else {
                    die("Please upload a receipt.");
                }
                if($error == ""){
                    $where = array(
                        "user_trade_id" => $user_trade_id
                    );

                    $data = array(
                        "receipt" => $receipt
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
}
