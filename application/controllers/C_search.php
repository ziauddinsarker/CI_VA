<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_search');
    }

    public function index(){
        $this->load->view('v_search');
    }

    public function c_get_all(){
        $data = $this->m_search->m_get_all();
        echo json_encode($data);
    }
}