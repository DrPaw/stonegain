<?php

class Wallet_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_crypto_wallet($user_id)
    {
        $this->db->select("*");
        $this->db->from("user_crypto_wallet");
        $this->db->where("user_id", $user_id);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_crypto_wallet_where($user_id,$where)
    {
        $this->db->select("*");
        $this->db->from("user_crypto_wallet");
        $this->db->where("user_id", $user_id);
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

}
