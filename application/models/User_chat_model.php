<?php

class User_chat_model extends CI_model
{
    function get_where($where)
    {
        $this->db->select("*, 
        (SELECT username FROM user WHERE user.user_id = user_chat.user_1_id) AS user_1_username,
        (SELECT username FROM user WHERE user.user_id = user_chat.user_2_id) AS user_2_username");
        $this->db->from("user_chat");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all()
    {
        $this->db->select("*, 
        (SELECT username FROM user WHERE user.user_id = user_chat.user_1_id) AS user_1_username,
        (SELECT username FROM user WHERE user.user_id = user_chat.user_2_id) AS user_2_username");
        $this->db->from("user_chat");

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_mine_where($user_id, $where = array())
    {
        $this->db->select("
            *, (SELECT IF(user_chat.user_1_id = " . $user_id . ",
            (SELECT username FROM user WHERE user.user_id = user_chat.user_2_id),
            (SELECT username FROM user WHERE user.user_id = user_chat.user_1_id)
            )) AS target_username,
            (SELECT COUNT(*) 
            FROM user_chat_message 
            WHERE user_chat.user_chat_id = user_chat_message.user_chat_id
            AND user_chat_message.user_id != ".$user_id."
            AND user_chat_message.has_read = 0) AS total_unread
        ");
        $this->db->from("user_chat");
        if (!empty($where)) {
            $this->db->where($where);
        } else {
            $this->db->where("user_1_id", $user_id);
            $this->db->or_where("user_2_id", $user_id);
        }
        $this->db->order_by("last_active_time DESC");

        $query = $this->db->get();

        return $query->result_array();
    }

    function insert($data)
    {
        $this->db->insert("user_chat", $data);

        return $this->db->insert_id();
    }

    function set_to_active($user_chat_id)
    {
        $sql = "UPDATE user_chat SET last_active_time=now() WHERE user_chat_id = ?";

        $query = $this->db->query($sql, array(
            $user_chat_id
        ));
    }
}

?>