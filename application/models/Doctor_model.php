<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doctor_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //get the username & password from tbl_usrs
    //Get All Posts
	function getDoctors(){
	  $this->db->select('*');
	  $this->db->from('doctors');
	  $this->db->join('doctors_category', 'doctors_category.id = doctors.doctor_specialist');	  
	  $query = $this->db->get();
	  return $query->result();
	}

	public function get_doc_based_on_category_and_district($cat, $dist){
		$this->db->select('*');
		$this->db->from('doctors');
		$this->db->join('doctors_category', 'doctors.doctor_specialist = doctors_category.doctor_category_id');
		$this->db->join('doctors_chamber', 'doctors.doctor_chamber = doctors_chamber.doctors_chambers_id');
		$this->db->join('doctors_chamber_address', 'doctors_chamber.doctors_chambers_address = doctors_chamber_address.doctors_chamber_address_id');
		$this->db->join('district', 'doctors.doctor_district = district.district_id');
		$this->db->where('doctor_category_name',$cat);
		$this->db->where('district_name',$dist);
		$query = $this->db->get();
		return $query->result();
	}




	public function getSpecility(){
		$this->db->select('doctor_category_name');
		$this->db->from('doctors_category');	  
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function getDoctorsInformation(){
	  $this->db->select('*');
	  $this->db->from('doctors');
	  $this->db->join('doctors_category', 'doctors.doctor_specialist = doctors_category.doctor_category_id');	  
	  $this->db->join('doctors_chamber', 'doctors.doctor_chamber = doctors_chamber.doctors_chambers_id');	  
	  $this->db->join('doctors_chamber_address', 'doctors_chamber.doctors_chambers_address = doctors_chamber_address.doctors_chamber_address_id');	  
	  $query = $this->db->get();
	  return $query->result();
		
	}
	
	public function getDoctorsRating(){
	  $this->db->select('doctor_name,SUM(rating_value) as RSB');
	  $this->db->from('doctor_rating');
	  $this->db->join('doctors', 'doctor_rating.doctor_id = doctors.doctor_id');	  
	  $this->db->join('rating', 'doctor_rating.rating_id = rating.rating_id');	
	  $this->db->group_by('doctor_name');
	  $query = $this->db->get();
	  return $query->result();	
	}
	
	public function add_rsb_to_doctor($rating){
		$this->db->insert('rating',$rating);
        return $this->db->insert_id();
	}
	
	public function add_rating_to_doctor($doctor_rating){
		$this->db->insert('doctor_rating',$doctor_rating);
		return $this->db->insert_id();
	}
	
	public function get_rating_for_doctor($doctor_id){
		$this->db->select();
		$this->db->from('doctor_rating');
		$this->db->join('doctors','doctor_rating.doctor_id = doctors.doctor_id');
		$this->db->join('rating','doctor_rating.rating_id = rating.rating_id');
		$this->db->where('doctor_id', $doctor_id);	
	}
	
	//get_all_doctor_from_category
	/* function get_all_doctor_from_category($doc_cat_id){
		
		 $this->db->where('doctor_category_id', $doc_cat_id);

		$query = $this->db->get('doctors_category');

		if($query->result()){
			$result = $query->result();

			foreach($result as $row)
			{
				$options[$row->id] = $row->doctors_category_name;
			}   
			return $options;
		} 
	} */
	
	function get_node_by_type($type) {
        $this->db->select("*");
        $this->db->from('doctors_category');
		$this->db->join('doctors','doctors.doctor_specialist = doctors_category.doctor_category_id');
        $this->db->where('doctors_category.doctor_category_name', $type);
        $query = $this->db->get();
        return $query->result();
    }
	
	

}

?>