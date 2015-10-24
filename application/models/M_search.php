<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_search extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function m_get_all()
    {
        $brand = $this->input->post('search');
        $this->db->select('*');
        $this->db->from('brand');
        $this->db->like('brand_name',$brand);
        $query = $this->db->get();

        $brand_array = array();

        foreach ($query->result() as $row) {
            $brand_array[] = $row->brand_id;
            $brand_array[] = $row->brand_name;
        }
        $data = $brand_array;
        return $data;


       // return $query->result();
    }
}