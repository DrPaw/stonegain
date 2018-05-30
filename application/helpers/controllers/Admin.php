<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends BaseController {

    public function __construct() {
        parent::__construct();
        
        $this->load->model("Admin_model");
        $this->page_data = array();
    }

    public function index() {
        $this->page_data["admins"] = $this->Admin_model->get_all();
        
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Admin/all");
        $this->load->view("admin/footer");
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
                    "password" => $hash["password"],
                    "salt" => $hash["salt"]
                );

                $this->Admin_model->add($data);

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
        $this->load->view("admin/Admin/add");
        $this->load->view("admin/footer");
    }
    
    public function delete($admin_id){
        $this->Admin_model->update_where(array(
            "admin_id" => $admin_id
        ), array(
            "deleted" => 1
        ));
        
        redirect("admin", "refresh");
    }
    
    public function details($admin_id) {

        $admins = $this->Admin_model->get_where($where = array(
            "admin_id" => $admin_id
        ));

        $this->page_data["admins"] = $admins[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Admin/details");
        $this->load->view("admin/footer");
    }
    
    public function edit($admin_id) {

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
                    "admin_id" => $admin_id
                );

                $data = array(
                    "username" => $input["username"]
                );

                if (isset($hash)) {
                    $data["password"] = $hash["password"];
                    $data["salt"] = $hash["salt"];
                }
                
                $this->Admin_model->update_where($where, $data);
                
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

        $admins = $this->Admin_model->get_where($where = array(
            "admin_id" => $admin_id
        ));

        $this->page_data["admin"] = $admins[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Admin/edit");
        $this->load->view("admin/footer");
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
