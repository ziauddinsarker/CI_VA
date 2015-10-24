<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pharmacist extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database(); // load database
        $this->load->model('pharmacist_model');
    }



    function single($pharmacist_id = NULL )//single post page
    {

        $data['pharmacist'] = $this->pharmacist_model->get_pharmacist($pharmacist_id);

        $this->load->view('template/view_blank_header');
        $this->load->view('view_single_pharmacist',$data);
        $this->load->view('template/view_blank_footer');
    }
}