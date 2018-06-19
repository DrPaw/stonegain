<?php

class Report_model extends Base_Model {

    function get_top_buyer(){
        $this->db->select("*");
        $this->db->from("buyer_ranking");
        
        $query = $this->db->get();

        return $query->result_array();
    }

    function get_top_seller(){
        $this->db->select("*");
        $this->db->from("seller_ranking");
        
        $query = $this->db->get();

        return $query->result_array();
    }

    function get_top_referred(){
        $this->db->select("*");
        $this->db->from("referral_ranking");
        
        $query = $this->db->get();

        return $query->result_array();
    }

}

?>