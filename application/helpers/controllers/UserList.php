<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserList extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model("Users_model");
        $this->page_data = array();
    }

    public function index() {
        $this->page_data["users"] = $this->Users_model->get_all();
        
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Users/all");
        $this->load->view("admin/footer");
    }
    
    public function details($user_id) {

        $users = $this->Users_model->get_where($where = array(
            "user_id" => $user_id
        ));

        $this->page_data["users"] = $users[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Users/details");
        $this->load->view("admin/footer");
    }

}
