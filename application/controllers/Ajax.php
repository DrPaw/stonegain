<?php

class Ajax extends Base_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model("Wallet_model");
        $this->load->model("Crypto_model");
        $this->load->model("User_chat_model");
        $this->load->model("User_chat_message_model");
        $this->load->model("User_listing_model");
        $this->load->model("Account_resource_model");

        $this->page_data[] = array();

    }

    function get_user_crypto_data()
    {
        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                "crypto_id" => $input["crypto_id"],
            );

            $crypto_wallet = $this->Wallet_model->get_crypto_wallet_where($input["user_id"], $where);

            $this->page_data["crypto_wallet"] = (!empty($crypto_wallet)) ? $crypto_wallet[0] : array(
                "locked_amount" => "0.00000000",
                "available_amount" => "0.00000000",
                "total_amount" => "0.00000000"
            );

            // $this->debug($this->page_data["crypto_wallet"]);

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

                $this->User_chat_model->set_to_active($user_chat_id);
            } else {
                $user_chat_id = $user_chat[0]["user_chat_id"];
            }

            die($user_chat_id);
        }
    }

    function update_user_chat_list()
    {
        if ($_POST) {
            $input = $this->input->post();

            $user_chat = $this->User_chat_model->get_mine_where($input["user_id"]);

            // $this->debug($user_chat);

            $this->page_data["user_chat_list"] = $user_chat;

            if ($this->session->has_userdata("open_first")) {
                $this->page_data["open_first"] = $this->session->userdata("open_first");
            } else if (!empty($input["open_first"])) {
                $this->page_data["open_first"] = $input["user_chat_id"];
                $this->session->set_userdata("open_first", $this->page_data["open_first"]);
            } else {
                $this->page_data["open_first"] = 0;
            }

            $this->load->view("main/refresh_user_chat_list", $this->page_data);
        }

    }

    function load_chat_content()
    {
        if ($_POST) {
            $input = $this->input->post();

            $this->session->set_userdata("open_first", $input["user_chat_id"]);

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

            $message_count = $this->User_chat_message_model->get_count_where($where);

            $this->page_data["user_chat"] = $user_chat[0];
            $this->page_data["messages"] = $user_chat_message;
            $this->page_data["count"] = $message_count[0]["count"];

            $this->load->view("main/chat_content", $this->page_data);
        }
    }

    function load_chat_messages()
    {
        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                "user_chat_id" => $input["user_chat_id"],
                "user_id != " => $this->session->userdata('user')["user_id"]
            );

            $data = array(
                "has_read" => 1
            );

            $this->User_chat_message_model->update_where($where, $data);

            $where = array(
                "user_chat_id" => $input["user_chat_id"]
            );

            $user_chat_message = $this->User_chat_message_model->get_where($where);

            $message_count = $this->User_chat_message_model->get_count_where($where);

            $this->page_data["messages"] = $user_chat_message;
            $this->page_data["count"] = $message_count[0]["count"];

            $this->load->view("main/chat_messages", $this->page_data);
        }
    }

    function send_message()
    {
        if ($_POST) {
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

            $message_count = $this->User_chat_message_model->get_count_where($where);

            $this->User_chat_model->set_to_active($input["user_chat_id"]);

            $this->page_data["messages"] = $user_chat_message;
            $this->page_data["count"] = $message_count[0]["count"];

            $this->load->view("main/chat_messages", $this->page_data);
        }
    }

    function load_admin_user_listing()
    {
        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                "user_listing_id" => $input["user_listing_id"]
            );

            $user_listing = $this->User_listing_model->get_where($where);

            $this->page_data["user_listing"] = $user_listing[0];

            $this->load->view("admin/Transaction/refresh_user_listing_details", $this->page_data);

        }
    }

    function poll()
    {

    }

    function upload_image()
    {
        if ($_POST) {
            $input = $this->input->post();
            if ($_FILES) {
                $error = false;
                if (!empty($_FILES['image']['name'])) {
                    $config = array(
                        "allowed_types" => "gif|png|jpg|jpeg",
                        "upload_path" => "./images/message/",
                        "path" => "images/message/"
                    );

                    $this->load->library("upload", $config);
                    if ($this->upload->do_upload("image")) {
                        $image = $config['path'] . $this->upload->data()['file_name'];
                    } else {
                        $error = true;
                        $error_message = $this->upload->display_errors();
                    }
                } else {
                    $error = true;
                    $error_message = "Please upload a receipt.";
                }
                if (!$error) {
                    $data = array(
                        "message" => $image,
                        "is_image" => 1,
                        "user_id" => $this->session->userdata("user")["user_id"],
                        "user_chat_id" => $input["user_chat_id"]
                    );

                    $this->User_chat_message_model->insert($data);

                    $where = array(
                        "user_chat_id" => $input["user_chat_id"]
                    );

                    $user_chat_message = $this->User_chat_message_model->get_where($where);

                    $message_count = $this->User_chat_message_model->get_count_where($where);

                    $this->User_chat_model->set_to_active($input["user_chat_id"]);

                    $this->page_data["messages"] = $user_chat_message;
                    $this->page_data["count"] = $message_count[0]["count"];

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
        }
    }

    function refresh_crypto_select(){
        if($_POST){
            $input = $this->input->post();

            if($input["type"] == "sell"){
                $user_id = $this->session->userdata("user")["user_id"];

                $this->page_data["crypto"] = $this->Wallet_model->get_crypto_wallet($user_id);
            } else if($input["type"] == "buy"){
                $this->page_data["crypto"] = $this->Account_resource_model->get_all();
            }

            $this->page_data["type"] = $input["type"];

            $this->load->view("main/crypto_select", $this->page_data);
        }
    }
}

?>
