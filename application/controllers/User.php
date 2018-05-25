<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("Users_model");
        $this->load->model("User_listing_model");
        $this->load->model("User_crypto_model");
        $this->load->model("User_trust_model");
        $this->load->model("User_trade_info_model");

        $this->load->library("pagination");

        $this->page_data = array();
    }

    public function details($user_id)
    {
        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/user_details");
        $this->load->view("main/footer");
    }

    public function profile($page = "")
    {

        if (!$this->session->has_userdata("user")) redirect("access/login", "refresh");

        $user_id = $this->session->userdata("user")["user_id"];

        $per_page = 5;

        $where = array(
            "user_listing.user_id" => $user_id
        );
        $count = $this->User_listing_model->get_count_where($where);
        $this->page_data["user_listing"] = $this->User_listing_model->get_paging_where($page, $per_page, $where);

        $config['base_url'] = base_url() . '/user/profile';
        $config['total_rows'] = $count[0]['count'];
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = true;

        $config['full_tag_open'] = "<ul class='pagination pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);

        $this->page_data["pagination"] = $this->pagination->create_links();

        $user = $this->Users_model->get_where($where = array(
            "user.user_id" => $user_id
        ));

        $this->page_data["user"] = $user[0];

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/profile");
        $this->load->view("main/footer");
    }

    public function view_profile($user_id, $page = "")
    {

        if ($this->session->has_userdata("user") and $user_id == $this->session->userdata("user")["user_id"]) redirect("user/profile", "refresh");

        $per_page = 5;

        $where = array(
            "user_listing.user_id" => $user_id
        );
        $count = $this->User_listing_model->get_count_where($where);
        $this->page_data["user_listing"] = $this->User_listing_model->get_paging_where($page, $per_page, $where);

        $config['base_url'] = base_url() . '/user/profile';
        $config['total_rows'] = $count[0]['count'];
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = true;

        $config['full_tag_open'] = "<ul class='pagination pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);

        $this->page_data["pagination"] = $this->pagination->create_links();

        $user = $this->Users_model->get_where($where = array(
            "user.user_id" => $user_id
        ));

        if (empty($user)) redirect("main/no_result", "refresh");

        $this->page_data["user"] = $user[0];

        if ($this->session->has_userdata("user")) {
            $where = array(
                "user_id" => $this->session->userdata("user")["user_id"],
                "target_id" => $user_id
            );

            $user_trust = $this->User_trust_model->get_where($where);
        } else {
            $user_trust = array();
        }

        if (!empty($user_trust)) $this->page_data["user_trust"] = $user_trust;

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/user_profile");
        $this->load->view("main/footer");
    }

    public function edit_profile()
    {

        if (!$this->session->has_userdata("user")) redirect("access/login", "refresh");

        $user_id = $this->session->userdata("user")["user_id"];


        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if ($input["password"] or $input["password2"]) {
                if ($input["password"] == $input["password2"]) {
                    $hash = $this->hash($input["password"]);
                } else {
                    $error = true;
                    $error_message = "Passwords do not match";
                }
            }

            if (!$error) {
                $where = array(
                    "user.user_id" => $user_id
                );

                $user = $this->Users_model->get_where($where);

                $data = array(
                    "username" => $user[0]["username"],
                    "email" => $input["email"],
                    "country" => $input["country"],
                    "bank_name" => $input["bank_name"],
                    "bank_account_number" => $input["bank_account_number"],
                    "preferred_time" => $input["preferred_time"],
                    "preferred_threshold" => $input["preferred_threshold"],
                );

                if (isset($hash)) {
                    $data["password"] = $hash["password"];
                    $data["salt"] = $hash["salt"];
                }

                $this->Users_model->update_where($where, $data);

                redirect("user/profile/", "refresh");
            } else {
                die(json_encode(array(
                    "status" => false,
                    "message" => $error_message
                )));
            }
        }

        $user = $this->Users_model->get_where($where = array(
            "user.user_id" => $user_id
        ));

        $this->page_data["user"] = $user[0];


        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/edit_profile");
        $this->load->view("main/footer");
    }

    public function get_user_crypto_data()
    {
        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                "user_crypto_id" => $input["user_crypto_id"]
            );

            $this->page_data["user_crypto"] = $this->User_crypto_model->get_where($where);

            $this->load->view("main/crypto_refresh_details", $this->page_data);

        } else {
            show_404();
        }
    }

    public function get_user_crypto_price()
    {
        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                "user_crypto_id" => $input["user_crypto_id"]
            );

            $user_crypto = $this->User_crypto_model->get_where($where);

            if (!empty($user_crypto)) {
                die($user_crypto[0]["btc_price"]);
            } else {
                die("0");
            }

        } else {
            show_404();
        }
    }

    function trust($user_id)
    {

        if (!$this->session->has_userdata("user")) redirect("access/login", "refresh");

        $data = array(
            "user_id" => $this->session->userdata("user")["user_id"],
            "target_id" => $user_id
        );

        $this->User_trust_model->insert($data);

        $where = array(
            "user_id" => $user_id
        );

        $user_trade_info = $this->User_trade_info_model->get_where($where);

        $data = array(
            "trusted" => $user_trade_info[0]["trusted"] + 1
        );

        $this->User_trade_info_model->update_where($where, $data);

        redirect("user/view_profile/" . $user_id, "refresh");

    }

    function untrust($user_id)
    {

        if (!$this->session->has_userdata("user")) redirect("access/login", "refresh");

        $where = array(
            "user_id" => $this->session->userdata("user")["user_id"],
            "target_id" => $user_id
        );

        $this->User_trust_model->delete_where($where);

        $where = array(
            "user_id" => $user_id
        );

        $user_trade_info = $this->User_trade_info_model->get_where($where);

        $data = array(
            "trusted" => $user_trade_info[0]["trusted"] - 1
        );

        $this->User_trade_info_model->update_where($where, $data);

        redirect("user/view_profile/" . $user_id, "refresh");

    }
}
