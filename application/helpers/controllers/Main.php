<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends BaseController {

    public function __construct() {
        parent::__construct();
        
        $this->page_data = array();
    }

    public function index() {
        $this->load->view("main/index");
    }

}
