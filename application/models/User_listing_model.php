<?php

class User_listing_model extends CI_Model {

    function __construct() {
        parent ::__construct();
    }
    
    public function get_index() {
        $this->db->select("user_listing.*, user.username");
        $this->db->from("user_listing");
        $this->db->join("user_crypto", "user_listing.user_crypto_id = user_crypto.user_crypto_id", "left");
        $this->db->join("user", "user_crypto.user_id = user.user_id", "left");
        $this->db->order_by("created_date DESC");
        $this->db->limit("10");

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_where($where) {
        $this->db->select("user_listing.*, user.username");
        $this->db->from("user_listing");
        $this->db->join("user_crypto", "user_listing.user_crypto_id = user_crypto.user_crypto_id", "left");
        $this->db->join("user", "user_crypto.user_id = user.user_id", "left");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function add($input) {
        $this->db->insert("user_listing", $input);
    }
    
    public function update_where($where, $data) {
        $this->db->where($where);
        $this->db->update("user", $data);
    }
    
}
