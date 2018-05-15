<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model("Users_model");
        
        $this->page_data = array();
    }

    public function details($user_id) {
        $this->load->view("Main/header", $this->page_data);
        $this->load->view("Main/user_details");
        $this->load->view("Main/footer");
    }

    public function profile() {

        if(!$this->session->has_userdata("user")){
            show_404();
        } else {
            $user_id = $this->session->userdata("user")["user_id"];
        }

        $user = $this->Users_model->get_where($where = array(
            "user_id" => $user_id
        ));

        $this->page_data["user"] = $user[0];

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/user/details");
        $this->load->view("main/footer");
    }

    public function edit_profile() {

        if(!$this->session->has_userdata("user")){
            show_404();
        } else {
            $user_id = $this->session->userdata("user")["user_id"];
        }

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if ($input["password"] OR $input["password2"]) {
                if ($input["password"] == $input["password2"]) {
                    $hash = $this->hash($input["password"]);
                } else {
                    $error = true;
                    $error_message = "Passwords do not match";
                }
            }

            if (!$error) {
                $where = array(
                    "user_id" => $user_id
                );
                
                $user = $this->Users_model->get_where($where);

                $data = array(
                    "username" => $user[0]["username"],
                    "email" => $input["email"],
                    "country" => $input["country"],
                    "bank_name" => $input["bank_name"],
                    "bank_account_number" => $input["bank_account_number"]
                );

                if (isset($hash)) {
                    $data["password"] = $hash["password"];
                    $data["salt"] = $hash["salt"];
                }
                
                $this->Users_model->update_where($where, $data);
            } else {
                die(json_encode(array(
                    "status" => false,
                    "message" => $error_message
                )));
            }
        }

        $user = $this->Users_model->get_where($where = array(
            "user_id" => $user_id
        ));

        $this->page_data["user"] = $user[0];

        redirect("user/profile/", "refresh");
    }
}
