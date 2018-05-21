<?php

Class User_trade_model extends CI_Model{

    function insert($data){
        $this->db->insert("user_trade", $data);
    }

}

?>