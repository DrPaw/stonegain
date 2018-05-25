<?php

class User_chat_message_model extends CI_model
{
    function get_where($where)
    {
        $this->db->select("*, (SELECT username FROM user WHERE user_chat_message.user_id = user.user_id) AS username");
        $this->db->from("user_chat_message");
        $this->db->where($where);
        $this->db->order_by("created_date ASC");

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_count_where($where)
    {
        $this->db->select("COUNT(*) as count");
        $this->db->from("user_chat_message");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_paging_where($page, $per_page, $where = array())
    {
        $this->db->select("*, (SELECT username FROM user WHERE user_chat_message.user_id = user.user_id) AS username");
        $this->db->from("user_chat_message");
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (empty($page)) {
            $page = 0;
        } else {
            $page -= 1;
        }
        $this->db->limit($per_page, $page);
        $this->db->order_by("created_date ASC");

        $query = $this->db->get();

        return $query->result_array();
    }

    function insert($data){
        $this->db->insert("user_chat_message", $data);
    }

    function update_where($where, $data){
        $this->db->where($where);
        $this->db->update("user_chat_message", $data);
    }
}

?>