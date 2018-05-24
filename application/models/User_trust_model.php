<?php

class User_trust_model extends CI_Model
{

    function insert($data)
    {
        $this->db->insert("user_trust", $data);
    }

    function get_where($where){
        $this->db->select('*');
        $this->db->from('user_trust');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    function delete_where($where){
        $this->db->where($where);
        $this->db->delete("user_trust");
    }


}

?>