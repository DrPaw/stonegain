<?php

class User_crypto_model extends CI_Model {

    function __construct() {
        parent ::__construct();
    }
    
    public function get_all() {
        $this->db->select("*");
        $this->db->from("user_crypto");

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_where($where) {
        $this->db->select("user.username, crypto.crypto, user_crypto.*");
        $this->db->from("user_crypto");
        $this->db->join("user", "user_crypto.user_id = user.user_id", "left");
        $this->db->join("crypto", "user_crypto.crypto_id = crypto.crypto_id", "left");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function add($input) {
        $required = array(
            "username",
            "email",
            "country",
            "bank_name",
            "bank_account_number",
            "password",
            "preferred_time",
            "preferred_threshold",
        );

        $error = false;

        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                $error = true;
                $error_message = "Please do not leave " . $field . " empty";
            }
        }

        if ($error) {
            die(json_encode(array(
                "status" => false,
                "message" => $error_message
            )));
        } else {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('username =', $input['username']);

            $query = $this->db->get();

            $admin = $query->result_array();

            if (count($admin) > 0) {
                die(json_encode(array(
                    "status" => false,
                    "message" => "Username already exists"
                )));
            } else {
                $this->db->insert("user", $input);

                if ($this->db->affected_rows() == 0) {
                    die(json_encode(array(
                        "status" => false,
                        "message" => "Insert Error"
                    )));
                } else {
                    return $this->db->insert_id();
                }
            }
        }
    }
    
    public function update_where($where, $data) {
        $this->db->where($where);
        $this->db->update("user_crypto", $data);
    }
    
}
