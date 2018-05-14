<?php

class Access extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $data = array();

        if ($_POST) {

            $sql = "SELECT user.* FROM user "
                . "WHERE username = ? AND password = SHA2(CONCAT(salt, ?),512);";

            $user = $this->db->query($sql, array(
                $this->input->post('username'),
                $this->input->post('password'),
            ))->result_array();

            if (count($user)) {
                if (count($user)) {
                    $result = $user;
                    $result[0]["active"] = 1;
                    $result[0]["completed"] = 1;
                }

                if ($result[0]['deleted'] == '0') {
                    if ($result[0]['active'] == '1') {

                        $session_data = array(
                            'user_id' => $result[0]['user_id'],
                            'username' => $result[0]['username'],
                        );
                        $user_id = $result[0]['user_id'];

                        $this->session->set_userdata("user", $session_data);

                        redirect("main", "refresh");
                    } else {
                        redirect("access/not_approved", "refresh");
                    }
                } else {
                    $data['error'] = 'Account deactivated';
                }
            } else {
                $data['error'] = 'Invalid username and password';
            }
        }

        $this->load->view('main/header', $data);
        $this->load->view('access/login');
        $this->load->view('main/footer');
    }

    public function register()
    {

        $data = array();

        if ($_POST) {

            $error = false;

            $sql = "SELECT * FROM user WHERE username = ?";

            $user = $this->db->query($sql, array(
                $this->input->post('username'),
            ))->result_array();

            if (!empty($user)) {
                $data["error"] = "username already exists";
                $error = true;
            }

            if ($this->input->post("password") != $this->input->post("password2")) {
                $data["error"] = "passwords do not match";
                $error = true;
            }

            if (!$error) {
                $hash = $this->hash($this->input->post("password"));

                $data = array(
                    "username" => $this->input->post("username"),
                    "email" => $this->input->post("email"),
                    "country" => $this->input->post("country"),
                    "bank_name" => $this->input->post("bank_name"),
                    "bank_account_number" => $this->input->post("bank_account_number"),
                    "preferred_time" => $this->input->post("preferred_time"),
                    "preferred_thershold" => $this->input->post("preferred_thershold"),
                    "referral_link" => $this->input->post("referral_link"),
                    "password" => $hash["password"],
                    "salt" => $hash["salt"],
                );

                $this->db->insert("user", $data);

                redirect("Main", "refresh");
            }
        }

        $this->load->view('main/header', $data);
        $this->load->view('access/register');
        $this->load->view('main/footer');
    }

    public function logout()
    {
//
        $this->session->sess_destroy();
        redirect('Main');
    }

    public function not_approved()
    {
        $this->load->view('access/not_approved');
    }

}
