<?php

class Transaction_model extends CI_Model {

    function __construct() {
        parent ::__construct();
    }
    
    public function get_all() {
        $this->db->select("transaction.*");
        $this->db->from("transaction");

        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function get_all_external() {
        $this->db->select("transaction.*");
        $this->db->from("transaction");
        $this->db->where('transaction.type', "external");

        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function get_all_internal() {
        $this->db->select("transaction.*");
        $this->db->from("transaction");
        $this->db->where('transaction.type', "internal");

        $query = $this->db->get();

        return $query->result_array();
    }

    public function add($input) {
        $this->db->insert("transaction", $input);
        return $this->db->insert_id();
    }
    
    public function get_where($where) {
        $this->db->select("transaction.*");
        $this->db->from("transaction");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }
    
}
