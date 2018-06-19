<?php

class Account_resource_model extends Base_Model{

    function get_all(){
        $this->db->select("*");
        $this->db->from("account_resource");

        $query = $this->db->get();

        return $query->result_array();
    }

}

?>