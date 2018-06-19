<?php

class User_crypto_model extends Base_Model {

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
    
    public function insert($data){
        $this->db->insert("user_crypto", $data);
    }
    
    public function update_where($where, $data) {
        $this->db->where($where);
        $this->db->update("user_crypto", $data);
    }
    
}
