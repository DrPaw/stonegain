<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->page_data = array();
    }

    public function index() {
        $this->load->view("header");
        $this->load->view("main/main");
        $this->load->view("footer");
    }
    
    function about(){
        $this->load->view("header");
        $this->load->view("main/about");
        $this->load->view("footer");
    }
    
    function contact(){
        $this->load->view("header");
        $this->load->view("main/contact");
        $this->load->view("footer");
    }
    
    function terms(){
        $this->load->view("header");
        $this->load->view("main/terms");
        $this->load->view("footer");
    }
    
    function faq(){
        $this->load->view("header");
        $this->load->view("main/faq");
        $this->load->view("footer");
    }

}
