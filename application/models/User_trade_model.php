<?php

class User_trade_model extends Base_Model
{

    function insert($data)
    {
        $this->db->insert("user_trade", $data);
    }

    function get_offers_where($where)
    {
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

    function get_sales_where($where)
    {
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

    function get_all()
    {
        $this->db->select("*, (SELECT username FROM user WHERE user_id = user_trade.buyer_id ) as buyer_name,
        (SELECT username FROM user WHERE user_id = user_trade.seller_id ) as seller_name,
        (SELECT user_trade_status FROM user_trade_status WHERE user_trade_status_id = user_trade.user_trade_status_id ) as user_trade_status");
        $this->db->from("user_trade");
        $this->db->join("user_listing", "user_trade.user_listing_id = user_listing.user_listing_id", "left");
        $this->db->join("user_trade_status", "user_trade.user_trade_status_id = user_trade_status.user_trade_status_id", "left");
        $this->db->join("user", "user_trade.buyer_id = user.user_id", "left");
        $this->db->join("crypto", "user_listing.crypto_id = crypto.crypto_id", "left");
        $this->db->order_by("user_trade.created_date DESC");

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_where($where)
    {
        $this->db->select("*, (SELECT username FROM user WHERE user_id = user_trade.buyer_id ) as buyer_name,
        (SELECT username FROM user WHERE user_id = user_trade.seller_id ) as seller_name,
        (SELECT user_trade_status FROM user_trade_status WHERE user_trade_status_id = user_trade.user_trade_status_id ) as user_trade_status");
        $this->db->from("user_trade");
        $this->db->join("user_listing", "user_trade.user_listing_id = user_listing.user_listing_id", "left");
        $this->db->join("user_trade_status", "user_trade.user_trade_status_id = user_trade_status.user_trade_status_id", "left");
        $this->db->join("user", "user_trade.buyer_id = user.user_id", "left");
        $this->db->join("crypto", "user_listing.crypto_id = crypto.crypto_id", "left");
        $this->db->where($where);
        $this->db->order_by("user_trade.created_date DESC");

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_where_involved($where, $user_id)
    {
        $this->db->select("*, 'SELL' AS type, user_trade.payment_method AS trade_payment_method, user_trade.time_of_payment AS trade_time_of_payment");
        $this->db->from("user_trade");
        $this->db->join("user_listing", "user_trade.user_listing_id = user_listing.user_listing_id", "left");
        $this->db->join("user_trade_status", "user_trade.user_trade_status_id = user_trade_status.user_trade_status_id", "left");
        $this->db->join("crypto", "user_listing.crypto_id = crypto.crypto_id", "left");
        $this->db->where("(buyer_id = " . $user_id . " OR seller_id = " . $user_id . ")");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    function update_where($where, $data)
    {
        $this->db->where($where);
        $this->db->update("user_trade", $data);

    }

    function get_top_trade()
    {
        $this->db->select("*, (SELECT username FROM user WHERE user_id = user_trade.buyer_id ) as buyer_name,
        (SELECT username FROM user WHERE user_id = user_trade.seller_id ) as seller_name,
        (SELECT user_trade_status FROM user_trade_status WHERE user_trade_status_id = user_trade.user_trade_status_id ) as user_trade_status");
        $this->db->from("user_trade");
        $this->db->join("user_listing", "user_trade.user_listing_id = user_listing.user_listing_id", "left");
        $this->db->join("user_trade_status", "user_trade.user_trade_status_id = user_trade_status.user_trade_status_id", "left");
        $this->db->join("user", "user_trade.buyer_id = user.user_id", "left");
        $this->db->join("crypto", "user_listing.crypto_id = crypto.crypto_id", "left");
        $this->db->where("user_trade.user_trade_status_id", 4);
        $this->db->order_by("user_trade.myr_amount DESC, user_trade.btc_amount DESC");

        $query = $this->db->get();

        return $query->result_array();
    }

}

?>