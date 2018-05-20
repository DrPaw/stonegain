<?php

class Transaction_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $this->db->select("transaction.*");
        $this->db->from("transaction");

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_all_external()
    {
        $this->db->select("transaction.*");
        $this->db->from("transaction");
        $this->db->where('transaction.type', "external");

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_all_internal()
    {
        $this->db->select("transaction.*");
        $this->db->from("transaction");
        $this->db->where('transaction.type', "internal");

        $query = $this->db->get();

        return $query->result_array();
    }

    public function add($input)
    {
        $this->db->insert("transaction", $input);
        return $this->db->insert_id();
    }

    public function insert($data)
    {
        $this->db->insert("transaction", $data);
    }

    public function get_where($where)
    {
        $this->db->select("*, crypto.crypto");
        $this->db->from("transaction");
        $this->db->join("crypto", "transaction.crypto_id = crypto.crypto_id", "left");
        $this->db->join("user", "transaction.user_id = user.user_id", "left");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_log_where($where)
    {
        $this->db->select("*, crypto.crypto");
        $this->db->from("transaction");
        $this->db->join("crypto", "transaction.crypto_id = crypto.crypto_id", "left");
        $this->db->join("user", "transaction.user_id = user.user_id", "left");
        $this->db->where($where);
        $this->db->order_by("created_date DESC");
        $this->db->limit("6");

        $query = $this->db->get();

        return $query->result_array();
    }
}
