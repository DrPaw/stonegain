<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_transaction extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("Transaction_model");
        $this->pageData = array();
    }

    public function index()
    {

        $sql = "SELECT *, (SELECT username FROM user WHERE user_id = user_trade.buyer_id ) as buyer_name,
                (SELECT username FROM user WHERE user_id = user_trade.seller_id ) as seller_name 
                  FROM user_trade ORDER BY user_buy_id DESC";
        $this->pageData["user_trade"] = $this->db->query($sql)->result_array();
        $this->pageData['cryptos'] = $this->db->get("crypto");
        $this->load->view("admin/header", $this->pageData);
        $this->load->view("admin/Transaction/all");
        $this->load->view("admin/footer");
    }

    function internal($transaction_id){
        $result = $this->db->get_where("user_trade",array(
            'user_buy_id' => $transaction_id
        ))->result_array();

        if (!count($result)) die('404');


        $this->pageData["user_trade"] = $result[0];
        $this->load->view("admin/header", $this->pageData);
        $this->load->view("admin/Transaction/details");
        $this->load->view("admin/footer");
    }

    public function add()
    {

        

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Admin/add");
        $this->load->view("admin/footer");
    }

    public function delete($admin_id)
    {
       
    }

    public function details($admin_id)
    {

    }

    public function edit($admin_id)
    {

       
    }

}
