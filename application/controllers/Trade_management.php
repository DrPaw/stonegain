<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Trade_Management extends BaseController {

    public function __construct() {
        parent::__construct();
        
        $this->page_data = array();
    }

    public function buy() {
        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/trademanagement");
        $this->load->view("main/footer");
    }

    public function sell() {
        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/trademanagement");
        $this->load->view("main/footer");
    }

}
