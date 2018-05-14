<?php

class BaseController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function hash($password)
    {
        $salt = rand(111111, 999999);
        $password = hash("sha512", $salt . $password);

        $hash = array(
            "salt" => $salt,
            "password" => $password,
        );

        return $hash;
    }

}
