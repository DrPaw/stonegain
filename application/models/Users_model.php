<?php

class Users_model extends CI_Model {

    function __construct() {
        parent ::__construct();
    }
    
    public function get_all() {
        $this->db->select("user.*");
        $this->db->from("user");

        $query = $this->db->get();

        return $query->result_array();
    }

    public function add($input) {
        $this->db->insert("user", $input);
        return $this->db->insert_id();
    }
    
    public function get_where($where) {
        $this->db->select("user.*");
        $this->db->from("user");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }
    
}
