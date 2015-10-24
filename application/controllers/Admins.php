<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model'); // load Users model
    }


    public function index()
    {
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_login');
        $this->load->view('admin/view_footer');

    }

    public function login(){
        $this->load->view('template/view_blank_header');
        $this->load->view('admin/view_admin_login');
        $this->load->view('template/view_blank_footer');
    }
}