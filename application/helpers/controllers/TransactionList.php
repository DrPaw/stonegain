<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TransactionList extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model("Transaction_model");
        $this->page_data = array();
    }

    public function index() {
        $this->page_data["external"] = $this->Transaction_model->get_all_external();
        $this->page_data["internal"] = $this->Transaction_model->get_all_internal();
        
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Transaction/all");
        $this->load->view("admin/footer");
    }
    
    public function details($transaction_id) {

        $transaction = $this->Users_model->get_where($where = array(
            "transaction_id" => $transaction_id
        ));

        $this->page_data["transaction"] = $transaction[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Transaction/details");
        $this->load->view("admin/footer");
    }

}
