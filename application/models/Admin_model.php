<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function get_all() {
        $this->db->select("admin.*");
        $this->db->from("admin");
        $this->db->where("admin.deleted = 0");

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_where($where) {
        $this->db->select("admin.*");
        $this->db->from("admin");
        $this->db->where("admin.deleted = 0");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function add($input) {
        $required = array(
            "username",
            "password"
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
            $this->db->from('admin');
            $this->db->where('username =', $input['username']);

            $query = $this->db->get();

            $admin = $query->result_array();

            if (count($admin) > 0) {
                die(json_encode(array(
                    "status" => false,
                    "message" => "Username already exists"
                )));
            } else {
                $this->db->insert("admin", $input);

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
        $this->db->update("admin", $data);
    }
    
}
