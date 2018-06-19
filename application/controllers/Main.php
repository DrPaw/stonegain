<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Base_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->page_data = array();

        $this->load->model("Users_model");
        $this->load->model("User_trade_info_model");
        $this->load->model("User_listing_model");
        $this->load->model("Account_resource_model");

        $this->load->model("User_trade_model");
        
        if ($this->session->has_userdata("user")){
            $where = array(
                "buyer_id" => $this->session->userdata("user")['user_id'],
                "user_trade.user_trade_status_id <" => "4"
            );
    
            $this->page_data["buys_processing"] = $this->User_trade_model->get_offers_where($where);
        }
    }
    
    public function index() {

        $this->page_data["user_listing"] = $this->User_listing_model->get_index();
        $this->page_data["currency_list"] = $this->Account_resource_model->get_all();

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/main");
        $this->load->view("main/footer");
    }

    function no_result(){
        $this->load->view("main/header",$this->page_data);
        $this->load->view("main/no_result");
        $this->load->view("main/footer");
    }

    function cannot_trade(){
        $this->load->view("main/header",$this->page_data);
        $this->load->view("main/cannot_trade");
        $this->load->view("main/footer");
    }
    
    function about(){
        $this->load->view("main/header",$this->page_data);
        $this->load->view("main/about");
        $this->load->view("main/footer");
    }
    
    function contact(){
        $this->load->view("main/header",$this->page_data);
        $this->load->view("main/contact");
        $this->load->view("main/footer");
    }
    
    function terms(){
        $this->load->view("main/header",$this->page_data);
        $this->load->view("main/terms");
        $this->load->view("main/footer");
    }
    
    function faq(){
        $this->load->view("main/header",$this->page_data);
        $this->load->view("main/faq");
        $this->load->view("main/footer");
    }

    function privacy(){
        $this->load->view("main/header",$this->page_data);
        $this->load->view("main/privacy");
        $this->load->view("main/footer");
    }

    function supported_currency(){
        $this->load->view("main/header",$this->page_data);
        $this->load->view("main/supported_currency");
        $this->load->view("main/footer");
    }

    function how(){
        $this->load->view("main/header",$this->page_data);
        $this->load->view("main/how");
        $this->load->view("main/footer");
    }

    function verify_user(){
        if(empty($_GET["email"]) OR empty($_GET["code"])){
            show_404();
        } else {
            $where = array(
                "email" => $_GET["email"],
                "code" => $_GET["code"]
            );

            $data = array(
                "verified" => 1
            );

            $this->Users_model->update_where($where, $data);

            $user = $this->Users_model->get_where($where);

            $data = array(
                "user_id" => $user[0]['user_id']
            );

            $this->User_trade_info_model->insert($data);

            $this->session->set_flashdata("verified", "completed");

            redirect("access/login", "refresh");
        }
    }

}
