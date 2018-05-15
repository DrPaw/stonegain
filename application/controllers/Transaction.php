<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->page_data = array();
    }

    public function index() {
        $this->load->view("Main/header", $this->page_data);
        $this->load->view("Main/transaction");
        $this->load->view("Main/footer");
    }

}
