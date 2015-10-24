<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Search_model extends CI_Model {

	public function __construct() {

		parent::__construct();
		$this->load->database();

	}

	public function search_brand_form_strength($brand){
		//$brand = $this->input->post('name');
		$this->db->select('brand.brand_name,brand_dosage_form_name,brand_strength_name');
		$this->db->from('brand_strength_from_price');
		$this->db->join('brand','brand_strength_from_price.brand_name = brand.brand_id');
		$this->db->join('brand_dosage_form','brand_strength_from_price.brand_dosage_form = brand_dosage_form.brand_dosage_form_id');
		$this->db->join('brand_dosage_amount','brand_strength_from_price.brand_dosage_amount = brand_dosage_amount.brand_dosage_amount_id');
		$this->db->join('brand_strength','brand_strength_from_price.brand_strength = brand_strength.brand_strength_id');
		$this->db->like('brand.brand_name', $brand,'both');
		$query = $this->db->get();

		/*$brand_array = array();
        $brand_dosage_form_name_array = array();
        $brand_strength_name_array = array();
        foreach ($query->result() as $row) {
            $brand_array[] = $row->brand_name;
            $brand_array[] = $row->brand_dosage_form_name;
            $brand_array[] = $row->brand_strength_name;
        }
        $data = $brand_array;
        return $data;*/

		return $query->result_array();
	}


	public function search_brand_strength(){
		$this->db->select('brand.brand_name,brand_dosage_form.brand_dosage_form_name,brand_strength.brand_strength_name');
		$this->db->from('brand_strength_from_price');
		$this->db->join('brand','brand_strength_from_price.brand_name = brand.brand_id');
		$this->db->join('brand_dosage_form','brand_strength_from_price.brand_dosage_form = brand_dosage_form.brand_dosage_form_id');
		$this->db->join('brand_dosage_amount','brand_strength_from_price.brand_dosage_amount = brand_dosage_amount.brand_dosage_amount_id');
		$this->db->join('brand_strength','brand_strength_from_price.brand_strength = brand_strength.brand_strength_id');
		$query = $this->db->get();

		$brand_array = array();
		foreach ($query->result() as $row) {
			$brand_array[] = $row->brand_name;
			$brand_array[] = $row->brand_dosage_form_name;
			$brand_array[ ] = $row->brand_strength_name;
		}
		$data = $brand_array;
		return $data;
		//return $query->result_array();
	}


	public function get() {
		// $brand = $this->input->post('name');
		$this->db->select('brand_name');
		$this->db->from('brand');
		$query = $this->db->get();

		return $query->result_array();
	}



}
