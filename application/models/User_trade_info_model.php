<?php

class User_trade_info_model extends Base_Model
{

    function insert($data)
    {
        $this->db->insert("user_trade_info", $data);
    }

    function update_where($where, $data)
    {
        $this->db->where($where);
        $this->db->update("user_trade_info", $data);
    }

    function get_where($where)
    {
        $this->db->select("*");
        $this->db->from("user_trade_info");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }


}

?>