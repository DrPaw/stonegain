<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_transaction extends BaseController
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("Transaction_model");
        $this->load->model("User_trade_model");
        $this->pageData = array();
    }

    public function index()
    {

        $this->pageData["user_trade"] = $this->User_trade_model->get_all();
        $this->pageData['cryptos'] = $this->db->get("crypto");
        $this->load->view("admin/header", $this->pageData);
        $this->load->view("admin/Transaction/all");
        $this->load->view("admin/footer");
    }

    function internal($user_trade_id){

        $where = array(
            "user_trade_id" => $user_trade_id
        );

        $result = $this->User_trade_model->get_where($where);

        if (!count($result)) show_404();


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
