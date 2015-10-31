<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	
	// Get Division
	public function get_division(){	
		$this->db->select('division_id,division_name');
        $this->db->from('division');
		$this->db->order_by('division_name', 'ASC');
        $query = $this->db->get();
	  return $query->result();
	}

	// Get Division
	public function get_district($division ){
		$this->db->select('district_id,district_name');
		$this->db->from('district');
		$this->db->join('division','district.division = division.division_id');
		$this->db->where('division_name',$division);
		$this->db->order_by('district_name', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Get Districts
	public function get_districts(){	
		//$division = $this->input->post(division);
		$this->db->select('*');
		$this->db->from('district'); 
		$this->db->join('division','district.division = division.division_id'); 
		$this->db->where('division_name','Barisal');
		$query = $this->db->get();
		return $query->result();
		
	}

	public function get_all_districts(){
		$this->db->select('district_id, district_name');
		$this->db->from('district');
		$this->db->order_by('district_name', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}


	public function get_distrct_from_division($dist){
		$this->db->select('*');		
		$this->db->from('division');
		$this->db->join('district','district.division = division.division_id');
		$this->db->where('division.division_name', $dist);
		$this->db->order_by('district_name', 'DESC');
		$query = $this->db->get();			
		return $query->result();
	}	
	
	public function get_thana_from_district($thana){
		$this->db->select('*');		
		$this->db->from('district');
		$this->db->join('thana','thana.district_name = district.district_id');
		$this->db->where('district.district_name', $thana);		
		$this->db->order_by('thana_name', 'DESC');
		$query = $this->db->get();			
		return $query->result();
	}
	
	
	
	
	
	// Get Thana
	public function get_thana(){
		
		
	}
	
	// Get Shop Location
	public function get_shop(){
		
		
	}
	
}
