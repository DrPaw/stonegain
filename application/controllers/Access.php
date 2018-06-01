<?php

class Access extends BaseController
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("Email_model");

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
                }

                if ($result[0]['deleted'] == '0') {
                    if ($result[0]['verified'] == '1') {

                        $session_data = array(
                            'user_id' => $result[0]['user_id'],
                            'username' => $result[0]['username'],
                        );
                        $user_id = $result[0]['user_id'];

                        $login_count = $result[0]["login_counter"] + 1;

                        $this->Users_model->track_login($user_id, $login_count);

                        $this->session->set_userdata("user", $session_data);

                        redirect("", "refresh");
                    } else {
                        $data['error'] = 'Account has not been verified. Please verify your email to proceed.';
                    }
                } else {
                    $data['error'] = 'Account deactivated';
                }
            } else {
                $data['error'] = 'Invalid username and password';
            }
        }

        $this->load->view('main/header', $data);
        $this->load->view('main/login');
        $this->load->view('main/footer');
    }

    public function admin_login()
    {
        $data = array();

        if($this->session->has_userdata("admin")){
            redirect('admin',"refresh");
        }
        
        if($_POST){
            $sql = "SELECT * FROM admin "
                . "WHERE username = ? AND password = SHA2(CONCAT(salt, ?),512);";

            $admin = $this->db->query($sql, array(
                $this->input->post('username'),
                $this->input->post('password'),
            ))->result_array();
            
            // die($this->db->last_query());

            if (count($admin)) {
                if (count($admin)) {
                    $result = $admin;
                }

                if ($result[0]['deleted'] == '0') {

                        $session_data = array(
                            'admin_id' => $result[0]['admin_id'],
                            'username' => $result[0]['username'],
                        );
                        $admin_id = $result[0]['admin_id'];

                        $this->session->set_userdata("admin", $session_data);

                        redirect("dashboard", "refresh");
                } else {
                    $data['error'] = 'Account deactivated';
                }
            } else {
                $data['error'] = 'Invalid username and password';
            }
        }

        $this->load->view('access/header', $data);
        $this->load->view('access/login');
        $this->load->view('access/footer');
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

                $code = rand(11111111, 99999999);

                $data = array(
                    "username" => $this->input->post("username"),
                    "email" => $this->input->post("email"),
                    "country" => $this->input->post("country"),
                    "bank_name" => $this->input->post("bank_name"),
                    "bank_account_number" => $this->input->post("bank_account_number"),
                    "preferred_time" => $this->input->post("preferred_time"),
                    "preferred_threshold" => $this->input->post("preferred_threshold"),
                    "referral_link" => $this->generate_referral_link(),
                    "referral" => $this->input->post("referral"),
                    "password" => $hash["password"],
                    "salt" => $hash["salt"],
                    "code" => $code
                );

                $this->db->insert("user", $data);

                $this->Email_model->verification_email($this->input->post("email"), $this->input->post("username"), $code);

                redirect("Main", "refresh");
            }
        }

        $this->load->view('main/header', $data);
        $this->load->view('main/register');
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
