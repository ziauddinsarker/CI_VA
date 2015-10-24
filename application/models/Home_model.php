<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	//Get all doctors category
	function get_all() {
        $this->db->select();
        $this->db->from('doctors_category');
		$this->db->join('doctors','doctors.doctor_specialist = doctors_category.doctor_category_id');       
        $query = $this->db->get();
        return $query->result();
    }
	
	//Get All doctors from Doctors table
	function get_all_doctor(){
		$this->db->select('*');
		$this->db->select('Sum(rating.rating_value) AS RSB');
        $this->db->from('doctor_rating');
		$this->db->join('rating','doctor_rating.rating_id = rating.rating_id');
		$this->db->join('doctors','doctor_rating.doctor_id = doctors.doctor_id');
		$this->db->join('doctors_category','doctors.doctor_specialist = doctors_category.doctor_category_id');
		$this->db->join('doctors_chamber','doctors.doctor_chamber = doctors_chamber.doctors_chambers_id');		
		$this->db->join('doctors_chamber_address','doctors_chamber.doctors_chambers_address = doctors_chamber_address.doctors_chamber_address_id');
		$this->db->group_by('doctor_name');
		$this->db->order_by('RSB', 'DESC');
        $query = $this->db->get();
        return $query->result();
		
	}
	
	// Get Top Ten Doctors by RSB
	public function getTopTenDoctor(){
		$this->db->select();
		$this->db->select('doctor_name,Sum(rating.rating_value) AS RSB');
        $this->db->from('doctor_rating');
		$this->db->join('rating','doctor_rating.rating_id = rating.rating_id');
		$this->db->join('doctors','doctor_rating.doctor_id = doctors.doctor_id');
		$this->db->group_by('doctor_name');
		$this->db->order_by('RSB', 'DESC');
		 $query = $this->db->get();
        return $query->result();
	}

	//Get Doctor by Category
	function get_doctor_by_cateogry($category_name) {
        $this->db->select();
        $this->db->from('doctors_category');
		$this->db->join('doctors','doctors.doctor_specialist = doctors_category.doctor_category_id');
        $this->db->where('doctor_category_name', $category_name);
        $query = $this->db->get();
        return $query->result();
    }
	
	
	//Get All Districts
	function getDistrict(){
	  $this->db->select("district_id,district_name");
	  $this->db->from('district');
	  $this->db->order_by('district_name','ASC');
	  $query = $this->db->get();
	  return $query->result();
	}
	
	//Get Doctors Category 
	public function getAllDoctorsCategory($limit = 22, $offset = 0){		
	  $this->db->select('doctor_category_id,doctor_category_name,COUNT(doctors_category.doctor_category_id) doctors_count');
	  //$this->db->from('doctors_category');
	  $this->db->join('doctors', 'doctors.doctor_specialist = doctors_category.doctor_category_id');
	  $this->db->group_by('doctors_category.doctor_category_id'); 
	  $this->db->order_by('doctor_category_name','ASC');
	  //$query = $this->db->get();
	  $query = $this->db->get('doctors_category',$limit,$offset);
	  return $query->result();
	} 
	
	//Get Doctors Category without Counting the Doctors
	public function getDoctorsCategoryOnly($limit = 22, $offset = 0){
	  $this->db->select("doctor_category_id,doctor_category_name");
	  //$this->db->from('doctors_category');
	  $this->db->order_by('doctor_category_name','ASC');
	  //$query = $this->db->get();	  
	  $query = $this->db->get('doctors_category',$limit,$offset);
	  return $query->result();
	}
	
	//Get Discount 
	public function getAllDiscount(){		
	  $this->db->select('discount_id,discount_name,discount_time_start');
	  $this->db->from('company_discount');
	  $this->db->join('discount', 'company_discount.company_discount_discount = discount.discount_id');
	  $this->db->join('company', 'company_discount.company_discount_company = company.company_id');
	  $this->db->order_by('discount_time_start','ASC');
	  $query = $this->db->get();
	  return $query->result();
	} 
	
	public function get_key($key){		
		$this->db->select('brand_name,brand_strength_name,brand_dosage_form_name');
		$this->db->from('brand_strength_from_price');
		$this->db->join('brand', 'brand_strength_from_price.brand_name = brand.brand_id');
		$this->db->join('brand_strength', 'brand_strength_from_price.brand_strength = brand_strength.brand_strength_id');
		$this->db->join('brand_dosage_form', 'brand_strength_from_price.brand_dosage_form = brand_dosage_form.brand_dosage_form_id');
		$this->db->get_where('brand_name', $key);	
	}
	
	
	//Get Contact
	function post_contact_text($data){
		$this->db->insert('contact',$data);
	}
	

    //get the username & password from tbl_usrs
    function get_user($usr, $pwd)
    {
        $sql = "select * from tbl_usrs where username = '" . $usr . "' and password = '" . md5($pwd) . "' and status = 'active'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
	
	function get_logged_user($logged_usr){
    $query=$this->db->query('SELECT * FROM tbl_usrs WHERE username = $logged_usr');
    //$this->db->select('*');
    //$query= $this->db->get('customer');
    return $query->result();
		
	}
	
	
	public function get()
	{
		$office = $this->input->post('search');
		$this->db->select('full_name');
		$this->db->from('members');
		$this->db->like('full_name', $office);
		$query = $this->db->get();
		$office_array = array();
		foreach ($query->result() as $row) {
			$office_array[] = $row->full_name;
		}
		$data = $office_array;
		return $data;
	}
}

?>