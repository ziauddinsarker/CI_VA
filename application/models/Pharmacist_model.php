<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pharmacist_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getPharmacist(){
        $this->db->select('*');
        $this->db->from('pharmacist');
        $query = $this->db->get();
        return $query->result();
    }

    function get_pharmacist($pharmacist_id){
        $this->db->select('*');
        $this->db->from('pharmacist');
        $this->db->where('pharmacist_id', $pharmacist_id);
        $query = $this->db->get();
        return $query->first_row('array');
    }





}