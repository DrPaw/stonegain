<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Crypto extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("Crypto_model");
        $this->load->model("GDAX");

        $this->page_data = array();
    }

    function pollAddress()
    {
        // this is main wallets resources
        $resources = $this->db->get('account_resource')->result_array();
        $wallets = array();
        foreach ($resources as $row) {
            $wallets[$row['currency']] = $row;
        }

        $address = $this->db->get_where("user_deposit_address", array(
            "active" => 1
        ))->result_array();

        foreach ($address as $row) {
            $transactions = $this->GDAX->getAddressTransactions($wallets[$row['currency']]['value'], $row['resource_id']);

            $successful_transfer = json_decode($transactions["data"], true);
            $successful_transfer = $successful_transfer["data"];

            if (!empty($successful_transfer)) {
                //die(var_dump($successful_transfer[0]));
                $this->GDAX->external_transaction_process($successful_transfer[0], $wallets[$row['currency']]['value'], $row['resource_id']);
            }

            var_dump($transactions);
            echo "<hr/>";

        }
    }
}
