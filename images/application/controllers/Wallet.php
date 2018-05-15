<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->page_data = array();
    }

    public function index() {
        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/wallet/main");
        $this->load->view("main/footer");
    }

}
