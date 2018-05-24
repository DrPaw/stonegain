<?php

class Ajax extends BaseController
{
    function __construct()
    {
        parent::__construct();

        $this->load->model("Wallet_model");
        $this->load->model("Crypto_model");
        $this->load->model("User_chat_model");
        $this->load->model("User_chat_message_model");

    }

    function get_user_crypto_data()
    {
        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                "crypto_id" => $input["crypto_id"],
            );

            $crypto_wallet = $this->Wallet_model->get_crypto_wallet_where($input["user_id"], $where);

            $this->page_data["crypto_wallet"] = (!empty($crypto_wallet)) ? $crypto_wallet[0] : array();

            $this->load->view("main/crypto_refresh_details", $this->page_data);
        }
    }

    function set_max_amount()
    {
        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                "crypto_id" => $input["crypto_id"],
            );

            $crypto_wallet = $this->Wallet_model->get_crypto_wallet_where($input["user_id"], $where);

            (!empty($crypto_wallet)) ? die($crypto_wallet[0]["available_amount"]) : 0;

        }
    }

    function get_crypto_price()
    {
        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                "crypto_id" => $input["crypto_id"]
            );

            $crypto = $this->Crypto_model->get_where($where);

            (!empty($crypto)) ? die($crypto[0]["price"]) : 0.00;

        }
    }

    function open_chat()
    {
        if ($_POST) {
            $input = $this->input->post();

            if ($input["target_user_id"] < $input["user_id"]) {
                $user_1_id = $input["target_user_id"];
                $user_2_id = $input["user_id"];
            } else if ($input["target_user_id"] > $input["user_id"]) {
                $user_1_id = $input["user_id"];
                $user_2_id = $input["target_user_id"];
            }

            $where = array(
                "user_1_id" => $user_1_id,
                "user_2_id" => $user_2_id,
            );

            $user_chat = $this->User_chat_model->get_where($where);

            if (empty($user_chat)) {
                $data = $where;

                $user_chat_id = $this->User_chat_model->insert($data);
            } else {
                $user_chat_id = $user_chat[0]["user_chat_id"];
            }

            $this->User_chat_model->set_to_active($user_chat_id);

            die($user_chat_id);
        }
    }

    function update_user_chat_list()
    {
        if ($_POST) {
            $input = $this->input->post();

            $user_chat = $this->User_chat_model->get_mine_where($input["user_id"]);

            $this->page_data["user_chat_list"] = $user_chat;

            $this->page_data["open_first"] = (!empty($input["open_first"]))? $input["user_chat_id"] : 0;

            $this->load->view("main/refresh_user_chat_list", $this->page_data);
        }

    }

    function load_chat_content()
    {
        if ($_POST) {
            $input = $this->input->post();

            if (!empty($input["user_chat_id"])) {
                $user_chat_id = $input["user_chat_id"];
            } else {
                if ($input["target_user_id"] < $input["user_id"]) {
                    $user_1_id = $input["target_user_id"];
                    $user_2_id = $input["user_id"];
                } else if ($input["target_user_id"] > $input["user_id"]) {
                    $user_1_id = $input["user_id"];
                    $user_2_id = $input["target_user_id"];
                }

                $where = array(
                    "user_1_id" => $user_1_id,
                    "user_2_id" => $user_2_id,
                );

                $user_chat = $this->User_chat_model->get_where($where);

                $user_chat_id = $user_chat[0]["user_chat_id"];
            }

            $where = array(
                "user_chat_id" => $user_chat_id,
                "user_id != " => $this->session->userdata('user')["user_id"]
            );

            $data = array(
                "has_read" => 1
            );

            $this->User_chat_message_model->update_where($where, $data);
            
            $where = array(
                "user_chat_id" => $user_chat_id
            );

            $user_chat = $this->User_chat_model->get_mine_where($input["user_id"], $where);

            $user_chat_message = $this->User_chat_message_model->get_where($where);

            $this->page_data["user_chat"] = $user_chat[0];
            $this->page_data["messages"] = $user_chat_message;

            $this->load->view("main/chat_content", $this->page_data);
        }
    }

    function send_message(){
        if($_POST){
            $input = $this->input->post();

            $data = array(
                "message" => $input["message"],
                "user_chat_id" => $input["user_chat_id"],
                "user_id" => $this->session->userdata("user")['user_id']
            );
            
            $this->User_chat_message_model->insert($data);

            $where = array(
                "user_chat_id" => $input["user_chat_id"]
            );
            
            $user_chat_message = $this->User_chat_message_model->get_where($where);

            $this->User_chat_model->set_to_active($input["user_chat_id"]);

            $this->page_data["messages"] = $user_chat_message;

            $this->load->view("main/chat_messages", $this->page_data);
        }
    }
}

?>
