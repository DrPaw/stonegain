<?php

Class Admin_report extends BaseController {

    function __construct()
    {
        parent::__construct();

        $this->load->model("Report_model");
        $this->load->model("User_trade_model");
        $this->load->model("Users_model");

        $this->page_data = array();
    }

    function top_buyer(){
        
        $this->page_data["top_buyer"] = $this->Report_model->get_top_buyer();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Report/top_buyer");
        $this->load->view("admin/footer");

    }

    function top_seller(){
        
        $this->page_data["top_seller"] = $this->Report_model->get_top_seller();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Report/top_seller");
        $this->load->view("admin/footer");

    }

    function top_transaction(){

        $this->page_data["top_internal"] = $this->User_trade_model->get_top_trade();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Report/top_transaction");
        $this->load->view("admin/footer");

    }

    function most_active(){

        $this->page_data["most_active"] = $this->Users_model->get_most_active();
        
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Report/most_active");
        $this->load->view("admin/footer");
    }

    function top_referred(){
        
        $this->page_data["top_referred"] = $this->Report_model->get_top_referred();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Report/top_referred");
        $this->load->view("admin/footer");

    }
}

?>