<?php

class User_trade_status_model extends Base_Model{
    function get_all(){
        $this->db->select("*");
        $this->db->from("user_trade_status");

        $query = $this->db->get();

        return $query->result_array();
    }
}

?>