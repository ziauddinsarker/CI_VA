<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shop_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }	
	
	public function index(){		
	  $this->db->select('*');
	  $this->db->from('shop');
	  $this->db->join('thana', 'shop.shop_thana = thana.thana_id');	  
	  $query = $this->db->get();
	  return $query->result();
	}
	
	public function get_shop_from_thana($thana){
		$this->db->select('*');
		$this->db->from('shop');
		$this->db->join('thana','shop.shop_thana = thana.thana_id');
		$this->db->where('thana_name', $thana);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_shop_based_on_thana_and_brand($brand){
		$this->db->select('brand.brand_name,brand_generic,manufacturer_name,brand_dosage_form_name,brand_dosage_amount.brand_dosage_amount,brand_strength_name,brand_quantity,brand_price,brand_price_ppp');
		$this->db->from('brand_strength_from_price');
		$this->db->join('brand','brand_strength_from_price.brand_name = brand.brand_id');
		$this->db->join('brand_dosage_form','brand_strength_from_price.brand_dosage_form = brand_dosage_form.brand_dosage_form_id');
		$this->db->join('brand_dosage_amount','brand_strength_from_price.brand_dosage_amount = brand_dosage_amount.brand_dosage_amount_id');
		$this->db->join('brand_strength','brand_strength_from_price.brand_strength = brand_strength.brand_strength_id');
		$this->db->join('brand_manufacturer','brand.brand_manufacturer = brand_manufacturer.manufacturer_name');
		$this->db->where('brand.brand_name', $brand);
		$query = $this->db->get();
		return $query->result();
		
	}
	
}
