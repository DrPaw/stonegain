<?php

class Base_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("Account_resource_model");
        $this->load->model("Admin_model");
        $this->load->model("Users_model");
        $this->load->model("User_chat_model");
        $this->load->model("User_chat_message_model");

        if ($this->session->has_userdata('admin')) {
            $admin_id = $this->session->userdata('admin')["admin_id"];

            $where = array(
                "admin_id" => $admin_id
            );

            $admin = $this->Admin_model->get_where($where);

            if ($admin[0]['deleted'] == 1) $this->session->sess_destroy();
        }

        if ($this->session->has_userdata('user')) {
            $user_id = $this->session->userdata('user')["user_id"];

            $where = array(
                "user.user_id" => $user_id
            );

            $user = $this->Users_model->get_where($where);

            if ($user[0]['deleted'] == 1) {
                $this->session->sess_destroy();
            } else {
                $unread_count = $this->User_chat_message_model->get_all_unread($user_id);

                $unread_count = $unread_count[0]["count"];

                $this->session->set_userdata("unread_total", $unread_count);
            }

        }
    }

    public function hash($password)
    {
        $salt = rand(111111, 999999);
        $password = hash("sha512", $salt . $password);

        $hash = array(
            "salt" => $salt,
            "password" => $password,
        );

        return $hash;
    }

    function callAPI($method, $url, $data)
    {
        $curl = curl_init();

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
	 
		// OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $agents = array(
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1',
            'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1.9) Gecko/20100508 SeaMonkey/2.0.4',
            'Mozilla/5.0 (Windows; U; MSIE 7.0; Windows NT 6.0; en-US)',
            'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_7; da-dk) AppleWebKit/533.21.1 (KHTML, like Gecko) Version/5.0.5 Safari/533.21.1'

        );
        curl_setopt($curl, CURLOPT_USERAGENT, $agents[array_rand($agents)]);
		// EXECUTE:
        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);
        return $result;
    }

    function debug($array)
    {
        echo "<pre>";
        var_dump($array);
        echo "</pre>";
        die();
    }

    function sort_crypto_wallet($crypto_wallet)
    {
        //if (empty($crypto_wallet)) show_404();

        $sorted_wallet = array();

        if (!empty($crypto_wallet)) {
            foreach ($crypto_wallet as $wallet_row) {
                if ("USDT" == $wallet_row["crypto"]) {
                    $crypto_data = array(
                        "crypto" => "USDT",
                        "total_amount" => $wallet_row["total_amount"],
                        "available_amount" => $wallet_row["available_amount"],
                        "locked_amount" => $wallet_row["locked_amount"]
                    );
                    break;
                } else {
                    $crypto_data = array(
                        "crypto" => "USDT",
                        "total_amount" => "0.00000000",
                        "available_amount" => "0.00000000",
                        "locked_amount" => "0.00000000"
                    );
                }
            }
        } else {
            $crypto_data = array(
                "crypto" => "USDT",
                "total_amount" => "0.00000000",
                "available_amount" => "0.00000000",
                "locked_amount" => "0.00000000"
            );
        }

        array_push($sorted_wallet, $crypto_data);

        $crypto = $this->Account_resource_model->get_all();

        foreach ($crypto as $row) {
            if (!empty($crypto_wallet)) {
                foreach ($crypto_wallet as $wallet_row) {
                    if ($row["currency"] == $wallet_row["crypto"]) {
                        $crypto_data = array(
                            "crypto" => $row["currency"],
                            "total_amount" => $wallet_row["total_amount"],
                            "available_amount" => $wallet_row["available_amount"],
                            "locked_amount" => $wallet_row["locked_amount"]
                        );
                        break;
                    } else {
                        $crypto_data = array(
                            "crypto" => $row["currency"],
                            "total_amount" => "0.00000000",
                            "available_amount" => "0.00000000",
                            "locked_amount" => "0.00000000"
                        );
                    }
                }
            } else {
                $crypto_data = array(
                    "crypto" => $row["currency"],
                    "total_amount" => "0.00000000",
                    "available_amount" => "0.00000000",
                    "locked_amount" => "0.0000000"
                );
            }
            array_push($sorted_wallet, $crypto_data);
        }

        return $sorted_wallet;
    }

    function generate_referral_link()
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';

        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < 12; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }

        $referral_link = base_url() . "user/referral/" . $string;

        return $referral_link;
    }

    function check_exists($username, $exclude_id = "")
    {

        $where = array(
            "username" => $username
        );

        if ($exclude_id == "") {

            $admin = $this->Admin_model->get_where($where);
            $user = $this->User_model->get_where($where);
            $client = $this->Client_model->get_where($where);

            if (empty($admin) and empty($user) and empty($client)) {
                return false;
            } else {
                return true;
            }
        } else if ($exclude_id != "") {
            $admin = $this->Admin_model->get_where_and_primary_is_not($where, $exclude_id);
            $user = $this->User_model->get_where_and_primary_is_not($where, $exclude_id);
            $client = $this->Client_model->get_where_and_primary_is_not($where, $exclude_id);

            if (empty($admin) and empty($user) and empty($client)) {
                return false;
            } else {
                return true;
            }
        }

    }

    function show_404_if_empty($array)
    {
        if (empty($array)) show_404();
    }

    function multi_image_upload($files, $field_name, $path)
    {

        $files_count = count($files[$field_name]['name']);

        $urls = array();

        $error = false;
        for ($i = 0; $i < $files_count; $i++) {

            if ($error) die($error_message);

            $_FILES["image"]['name'] = $files[$field_name]['name'][$i];
            $_FILES["image"]['type'] = $files[$field_name]['type'][$i];
            $_FILES["image"]['tmp_name'] = $files[$field_name]['tmp_name'][$i];
            $_FILES["image"]['error'] = $files[$field_name]['error'][$i];
            $_FILES["image"]['size'] = $files[$field_name]['size'][$i];

            $config = array(
                "allowed_types" => "gif|png|jpg|jpeg",
                "upload_path" => "./images/" . $path . "/",
                "path" => "/images/" . $path . "/"
            );

            $this->load->library("upload", $config);

            if ($this->upload->do_upload("image")) {
                $url = $config['path'] . $this->upload->data()['file_name'];

                array_push($urls, $url);
            } else {
                $error = true;
                $error_message = $this->upload->display_errors();
            }
        }

        return $urls;
    }

}
