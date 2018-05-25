<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_user_chat extends BaseController
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("User_chat_model");
        $this->load->model("User_chat_message_model");

        $this->load->library('pagination');

        if(!$this->session->has_userdata("admin")) redirect("access/admin_login");
        
        $this->page_data = array();
    }

    public function index()
    {
        $this->page_data["user_chats"] = $this->User_chat_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/User_chat/all");
        $this->load->view("admin/footer");
    }

    public function details($user_chat_id, $page = "")
    {
        $per_page = 20;

        $where = array(
            "user_chat_id" => $user_chat_id
        );

        $count = $this->User_chat_message_model->get_count_where($where);
        $this->page_data["messages"] = $this->User_chat_message_model->get_paging_where($page, $per_page, $where);

        $config['base_url'] = base_url() . '/admin_user_chat/details/' . $user_chat_id;
        $config['total_rows'] = $count[0]['count'];
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = true;

        $config['full_tag_open'] = "<ul class='pagination pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);

        $this->page_data["pagination"] = $this->pagination->create_links();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/User_chat/details");
        $this->load->view("admin/footer");
    }
}
