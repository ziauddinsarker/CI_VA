<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class healthcare_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
	
	public function index(){
		
		
		
	}
	
	function get_single_healthcare(){
	  $this->db->select('*');
	  $this->db->from('company');	  
	  $this->db->join('company_category','company.company_business_type = company_category.company_cat_id');
	 
	  //$this->db->get_where('company', 'company_id = $id');
	  $query = $this->db->get();
	  return $query->result();	
		
	}
	
	
	
}
