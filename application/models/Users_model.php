<?php

class Users_model extends Base_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $this->db->select("user.*");
        $this->db->from("user");

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_where($where)
    {
        $this->db->select("user.*, user_trade_info.trusted, user_trade_info.trades, user_trade_info.rating, user_trade_info.average_time");
        $this->db->from("user");
        $this->db->join("user_trade_info", "user.user_id = user_trade_info.user_id", "left");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function add($input)
    {
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
                $input["verified"] = 1;

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

    public function update_where($where, $data)
    {
        $this->db->where($where);
        $this->db->update("user", $data);
    }

    function track_login($user_id, $login_counter)
    {
        $sql = "UPDATE user SET last_active_time=now(), login_counter=? WHERE user_id = ?";

        $query = $this->db->query($sql, array(
            $login_counter,
            $user_id
        ));
    }

    function get_most_active(){
        $this->db->select("user_id, username, last_active_time, login_counter");
        $this->db->from("user");
        $this->db->order_by("login_counter DESC");

        $query = $this->db->get();

        return $query->result_array();
    }
}
