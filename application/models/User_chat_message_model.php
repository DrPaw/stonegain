<?php

class User_chat_message_model extends CI_model
{
    function get_where($where)
    {
        $this->db->select("*");
        $this->db->from("user_chat_message");
        $this->db->where($where);
        $this->db->order_by("created_date ASC");

        $query = $this->db->get();

        return $query->result_array();
    }
}

?>