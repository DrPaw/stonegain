<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TradeManagement extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->page_data = array();
    }

    public function index() {
        $this->load->view("Main/header", $this->page_data);
        $this->load->view("Main/trade_management/main");
        $this->load->view("Main/footer");
    }

}
