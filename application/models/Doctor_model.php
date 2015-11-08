<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doctor_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


	/**
	 * @param $social_uid
	 * @return mixed
	 */
/*	function getSingleDoctorInfo($social_uid){
		$this->db->select('*');
		$this->db->from('doctors');
		$this->db->join('doctors_category','doctors.doctor_specialist = doctors_category.doctor_category_id');
		$this->db->join('doctors_chamber','doctors.doctor_chamber = doctors_chamber.doctors_chambers_id');
		$this->db->join('doctors_chamber_address','doctors_chamber.doctors_chambers_address = doctors_chamber_address.doctors_chamber_address_id');
		$this->db->join('district','doctors.doctor_district = district.district_id');
		$this->db->join('user_doc','user_doc.doctor_id = doctors.doctor_id');
		$this->db->join('social_users','user_doc.user_id = social_users.social_login_id');
		$this->db->where('hybridauth_provider_uid',$social_uid);
		$query = $this->db->get();
		return $query->result();
	}*/

	function getSingleDoctorInfo($social_uid){
		$this->db->select('*');
		$this->db->from('doctors');
		$this->db->join('doctor_all_info','doctor_all_info.doctor_info_doctor = doctors.doctor_id');
		$this->db->join('doctors_category','doctors.doctor_category = doctors_category.doctor_category_id');
		$this->db->join('doctors_chamber','doctor_all_info.doctor_info_chamber = doctors_chamber.doctors_chambers_id');
		$this->db->join('doctors_chamber_address','doctors_chamber.doctors_chambers_address = doctors_chamber_address.doctors_chamber_address_id');
		//$this->db->join('doctors_chamber.doctors_chambers_address = doctors_chamber_address.doctors_chamber_address_id');
		$this->db->join('user_doc','user_doc.doctor_id = doctors.doctor_id');
		$this->db->join('social_users','user_doc.user_id = social_users.social_login_id');
		$this->db->where('hybridauth_provider_uid',$social_uid);
		$query = $this->db->get();
		return $query->result();
	}

	function updateDoctor()
	{
		$doctor_id = $this->input->post('doctor-id');
		$doctor_name = $this->input->post('doctor-name');
		$doctor_email = $this->input->post('doctor-email');
		$doctor_title = $this->input->post('doctor-title');
		$doctor_address = $this->input->post('doctor-address');
		$doctor_phone = $this->input->post('doctor-phone');
		$doctor_reg_no = $this->input->post('doctor-bmdc-no');
		$doctor_gender = $this->input->post('doctor-gender');
		$doctor_website = $this->input->post('doctor-website');

		$doctor_specialist = $this->input->post('doctor-specility');
		$doctor_district = $this->input->post('doctor-dist');


		$docdata = array(
			'doctor_name' => $doctor_name,
			'doctor_email' => $doctor_email,
			'doctor_title' =>  $doctor_title,
			'doctor_address' => $doctor_address,
			'doctor_phone' => $doctor_phone,
			'doctor_bmdc_no' => $doctor_reg_no,
			'doctor_gender' => $doctor_gender,
			'doctor_website' => $doctor_website,
			'doctor_category' => $doctor_specialist,
			'doctor_district' => $doctor_district,
			//'doctor_chamber' => $doctor_chamber,
		);
		$this->db->where('doctor_id', $doctor_id);
		$this->db->update('doctors', $docdata);

		//Doctors chamber Address
		$doctor_chambers_address_id = $this->input->post('doctor-chambers-address-id');
		$doctor_chamber_1 = $this->input->post('doctor-chamber-1');
		$doctor_chamber_2 = $this->input->post('doctor-chamber-2');

		$chamber_address_data = array(
			'doctors_chamber_address_1' => $doctor_chamber_1,
			'doctors_chamber_address_2' =>  $doctor_chamber_2,
		);

		$this->db->where('doctors_chamber_address_id', $doctor_chambers_address_id);
		$this->db->update('doctors_chamber_address', $chamber_address_data);

		//Doctor Chamber data
		$doctors_chambers_id = $this->input->post('doctor-chambers-address-id');
		$doctors_chambers_time_11 = $this->input->post('doctor-chamber-time-11');
		$doctors_chambers_time_12 = $this->input->post('doctor-chamber-time-12');
		$doctors_chambers_time_21 = $this->input->post('doctor-chamber-time-21');
		$doctors_chambers_time_22 = $this->input->post('doctor-chamber-time-22');
		$doctors_chambers_time_31 = $this->input->post('doctor-chamber-time-31');
		$doctors_chambers_time_32 = $this->input->post('doctor-chamber-time-32');
		$doctors_chambers_time_41 = $this->input->post('doctor-chamber-time-41');
		$doctors_chambers_time_42 = $this->input->post('doctor-chamber-time-42');
		$doctors_chambers_time_51 = $this->input->post('doctor-chamber-time-51');
		$doctors_chambers_time_52 = $this->input->post('doctor-chamber-time-52');
		$doctors_chambers_time_61 = $this->input->post('doctor-chamber-time-61');
		$doctors_chambers_time_62 = $this->input->post('doctor-chamber-time-62');
		$doctors_chambers_time_71 = $this->input->post('doctor-chamber-time-71');
		$doctors_chambers_time_72 = $this->input->post('doctor-chamber-time-72');

		$chamber_data = array(
			'doctors_chambers_time_11' =>  $doctors_chambers_time_11,
			'doctors_chambers_time_12' =>  $doctors_chambers_time_12,
			'doctors_chambers_time_21' =>  $doctors_chambers_time_21,
			'doctors_chambers_time_22' =>  $doctors_chambers_time_22,
			'doctors_chambers_time_31' =>  $doctors_chambers_time_31,
			'doctors_chambers_time_32' =>  $doctors_chambers_time_32,
			'doctors_chambers_time_41' =>  $doctors_chambers_time_41,
			'doctors_chambers_time_42' =>  $doctors_chambers_time_42,
			'doctors_chambers_time_51' =>  $doctors_chambers_time_51,
			'doctors_chambers_time_52' =>  $doctors_chambers_time_52,
			'doctors_chambers_time_61' =>  $doctors_chambers_time_61,
			'doctors_chambers_time_62' =>  $doctors_chambers_time_62,
			'doctors_chambers_time_71' =>  $doctors_chambers_time_71,
			'doctors_chambers_time_72' =>  $doctors_chambers_time_72,
		);

		$this->db->where('doctors_chambers_id', $doctors_chambers_id);
		$this->db->update('doctors_chamber', $chamber_data);


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