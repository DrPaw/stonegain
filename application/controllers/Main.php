<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends BaseController {

    public function __construct() {
        parent::__construct();
        
        $this->page_data = array();
    }
    
    public function index() {
        $this->load->view("main/header");
        $this->load->view("main/main");
        $this->load->view("main/footer");
    }
    
    function about(){
        $this->load->view("main/header");
        $this->load->view("main/about");
        $this->load->view("main/footer");
    }
    
    function contact(){
        $this->load->view("main/header");
        $this->load->view("main/contact");
        $this->load->view("main/footer");
    }
    
    function terms(){
        $this->load->view("main/header");
        $this->load->view("main/terms");
        $this->load->view("main/footer");
    }
    
    function faq(){
        $this->load->view("main/header");
        $this->load->view("main/faq");
        $this->load->view("main/footer");
    }

}
