<?php

Class User_trade_model extends CI_Model{

    function insert($data){
        $this->db->insert("user_trade", $data);
    }

    function get_offers_where($where){
        $this->db->select("*, 'BUY' AS type");
        $this->db->from("user_trade");
        $this->db->join("user_listing", "user_trade.user_listing_id = user_listing.user_listing_id", "left");
        $this->db->join("user_trade_status", "user_trade.user_trade_status_id = user_trade_status.user_trade_status_id", "left");
        $this->db->join("user", "user_trade.seller_id = user.user_id", "left");
        $this->db->join("crypto", "user_listing.crypto_id = crypto.crypto_id", "left");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_sales_where($where){
        $this->db->select("*, 'SELL' AS type");
        $this->db->from("user_trade");
        $this->db->join("user_listing", "user_trade.user_listing_id = user_listing.user_listing_id", "left");
        $this->db->join("user_trade_status", "user_trade.user_trade_status_id = user_trade_status.user_trade_status_id", "left");
        $this->db->join("user", "user_trade.buyer_id = user.user_id", "left");
        $this->db->join("crypto", "user_listing.crypto_id = crypto.crypto_id", "left");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

}

?>