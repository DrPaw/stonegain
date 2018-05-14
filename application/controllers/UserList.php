<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserList extends CI_Controller {

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

        $user = $this->Users_model->get_where($where = array(
            "user_id" => $user_id
        ));

        $this->page_data["user"] = $user[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Users/details");
        $this->load->view("admin/footer");
    }
    
    public function current_user($user_id) {

        $user = $this->Users_model->get_where($where = array(
            "user_id" => $user_id
        ));

        $this->page_data["user"] = $user[0];

        $this->load->view("header", $this->page_data);
        $this->load->view("main/user/details");
        $this->load->view("footer");
    }
    
    public function add() {

        if ($_POST) {
            $input = $this->input->post();
            
            $error = false;

            if ($input["password"] == $input["password2"]) {
                $hash = $this->hash($input["password"]);
            } else {
                $error = true;
                $error_message = "Passwords do not match";
            }

            if (!$error) {
                $data = array(
                    "username" => $input["username"],
                    "email" => $input["email"],
                    "country" => $input["country"],
                    "bank_name" => $input["bank_name"],
                    "bank_account_number" => $input["bank_account_number"],
                    "password" => $hash["password"],
                    "salt" => $hash["salt"]
                );

                $this->Users_model->add($data);

                die(json_encode(array(
                    "status" => true
                )));
            } else {
                die(json_encode(array(
                    "status" => false,
                    "message" => $error_message
                )));
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Users/add");
        $this->load->view("admin/footer");
    }
    
    public function delete($user_id){
        $this->Users_model->update_where(array(
            "user_id" => $user_id
        ), array(
            "deleted" => 1
        ));
        
        redirect("userList", "refresh");
    }
    
    public function edit($user_id) {

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

                $data = array(
                    "username" => $input["username"],
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
                
                die(json_encode(array(
                    "status" => true
                )));
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

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Users/edit");
        $this->load->view("admin/footer");
    }
    
    public function edit_current_user($user_id) {

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

        redirect("userlist/current_user/".$user_id, "refresh");
    }
    
    public function hash($password) {
        $salt = rand(111111, 999999);
        $password = hash("sha512", $salt . $password);

        $hash = array(
            "salt" => $salt,
            "password" => $password,
        );

        return $hash;
    }

}
