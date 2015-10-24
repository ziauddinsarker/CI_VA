<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends CI_Model
{
    //Get All Posts
	function getCompanyCategory($limit = 8, $offset = 0){
	  $this->db->select('*');
	  $query = $this->db->get('company_category', $limit,$offset);
	  return $query->result();
	}

	function getCompanys(){
	  $this->db->select('*');
	  $this->db->from('company');
	  $this->db->join('company_category', 'company_category.company_cat_id = company.company_business_type');	  
	  $this->db->order_by('company_name','ASC');
	  $query = $this->db->get();
	  return $query->result();
	}
	
	
	
	public function get_company_by_category($com_cat){
		$this->db->select('*');		
		$this->db->from('company');
		$this->db->join('company_category','company.company_business_type = company_category.company_cat_id');
		$this->db->where('company_cat_name', $com_cat);
		$query = $this->db->get();			
		return $query->result();		
		
	}
	
	
	
	

}

?>