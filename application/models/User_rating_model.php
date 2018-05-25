<?php

class User_rating_model extends CI_Model
{
    function insert($data)
    {
        $this->db->insert('user_rating', $data);
    }

    function get_where($where)
    {
        $this->db->select('*');
        $this->db->from('user_rating');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }
}

?>