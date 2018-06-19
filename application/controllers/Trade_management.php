<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Trade_Management extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();
        $this->load->model("User_trade_model");
        if ($this->session->has_userdata("user")){
            $where = array(
                "buyer_id" => $this->session->userdata("user")['user_id'],
                "user_trade.user_trade_status_id <" => "4"
            );
    
            $this->page_data["buys_processing"] = $this->User_trade_model->get_offers_where($where);
        }
    }

    public function buy()
    {

        if (!$this->session->has_userdata("user")) redirect("access/login", "refresh");
        
        $user_id = $this->session->userdata("user")["user_id"];

        $where = array(
            "buyer_id" => $user_id,
            "user_trade.user_trade_status_id <" => "4"
        );

        $this->page_data["user_trades_processing"] = $this->User_trade_model->get_offers_where($where);

        $where = array(
            "buyer_id" => $user_id,
            "user_trade.user_trade_status_id >=" => "4"
        );

        $this->page_data["user_trades_completed"] = $this->User_trade_model->get_offers_where($where);

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/trade_management");
        $this->load->view("main/footer");
    }

    public function sell()
    {
        if (!$this->session->has_userdata("user")) redirect("access/login", "refresh");
        
        $user_id = $this->session->userdata("user")["user_id"];

        $where = array(
            "seller_id" => $user_id,
            "user_trade.user_trade_status_id <" => "4"
        );

        $this->page_data["user_trades_processing"] = $this->User_trade_model->get_sales_where($where);

        $where = array(
            "seller_id" => $user_id,
            "user_trade.user_trade_status_id >=" => "4"
        );

        $this->page_data["user_trades_completed"] = $this->User_trade_model->get_sales_where($where);

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/trade_management");
        $this->load->view("main/footer");
    }

}
