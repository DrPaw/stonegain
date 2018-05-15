<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_listing extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model("Users_model");
        $this->load->model("User_crypto_model");
        $this->load->model("User_listing_model");
        
        $this->page_data = array();
    }

    public function sell() {

        if (!$this->session->has_userdata("user")) show_404(); 
        
        $user_id = $this->session->userdata("user")["user_id"];
        

        $where = array(
            "user_crypto.user_id" => $user_id
        );

        $this->page_data["user_crypto"] = $this->User_crypto_model->get_where($where);
        
        if($_POST){
            $input = $this->input->post();

            $data = array(
                "user_crypto_id" => $input["user_crypto_id"],
                "markup" => $input["markup"],
                "threshold" => $input["threshold"],
                "price_before" => $input["price_before"],
                "price_after" => $input["price_after"],
                "message" => $input["message"],
                "payment_method" => $input["payment_method"],
                "limit_from" => $input["limit_from"],
                "limit_to" => $input["limit_to"],
                "time_of_payment" => $input["time_of_payment"],
            );

            $this->User_listing_model->add($data);

            redirect("main", "refresh");
        }

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/sell");
        $this->load->view("main/footer");
    }

    public function view_listing($user_listing_id){

        $where = array(
            "user_listing_id" => $user_listing_id
        );

        $user_listing = $this->User_listing_model->get_where($where);

        $this->page_data["user_listing"] = $user_listing[0];

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/view_listing");
        $this->load->view("main/footer");

    }

    public function buy() {
        $this->load->view("main/header", $this->page_data);
        // $this->load->view("main/user_details");
        $this->load->view("main/footer");
    }
}
