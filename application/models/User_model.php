<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }

	function getSingleUserId($user_id){
		$this->db->select('social_login_id,hybridauth_provider_uid');
		$this->db->where('hybridauth_provider_uid',$user_id);
		$query = $this->db->get('social_users');
		//return $query->first_row('array');
		return $query->result_array();

		/*if($query->num_rows == 1)
		{
			return $query->row();
		}
		return false;
	*/

	}

	/*****************************************************/
	function get_all_users(){		
	  $this->db->select('social_login_user,social_login_email,social_login_user_type,published,hybridauth_provider_name,hybridauth_provider_uid');
	  $this->db->from('social_users');
	  $query = $this->db->get();
	  return $query->result();
	}

	function edit_single_user(){
	  $this->db->select('social_login_user,social_login_email,social_login_user_type,published,hybridauth_provider_name,hybridauth_provider_uid');
	  $this->db->from('social_users');
	  $query = $this->db->get();
	  return $query->result();
	}

	function delete_single_user(){
	  $this->db->select('social_login_user,social_login_email,social_login_user_type,published,hybridauth_provider_name,hybridauth_provider_uid');
	  $this->db->from('social_users');
	  $query = $this->db->get();
	  return $query->result();
	}
	/*****************************************************/
	
	
	
	//get department table to populate the department name dropdown
    function get_doctors_specility()
    {
        $this->db->select('doctor_category_id');
        $this->db->select('doctor_category_name');
        $this->db->from('doctors_category');
		$this->db->order_by('doctor_category_name','ASC');
        $query = $this->db->get();
        $result = $query->result();

        //array to store department id & department name
        $doc_cat_id = array('-SELECT-');
        $doc_cat_name = array('-SELECT SPECILITY-');

        for ($i = 0; $i < count($result); $i++)
        {
            array_push($doc_cat_id, $result[$i]->doctor_category_id);
            array_push($doc_cat_name, $result[$i]->doctor_category_name);
        }
        return $doc_specility_result = array_combine($doc_cat_id, $doc_cat_name);
    }
	
	//get department table to populate the department name dropdown
    function get_district()
    {
        $this->db->select('district_id');
        $this->db->select('district_name');
        $this->db->from('district');
		$this->db->order_by('district_name','ASC');
        $query = $this->db->get();
        $result = $query->result();

        //array to store department id & department name
        $dist_id = array('-SELECT-');
        $dist_name = array('-SELECT DIST-');

        for ($i = 0; $i < count($result); $i++)
        {
            array_push($dist_id, $result[$i]->district_id);
            array_push($dist_name, $result[$i]->district_name);
        }
        return $dist_result = array_combine($dist_id, $dist_name);
    }
	
	//get department table to populate the department name dropdown
    function get_company_category()
    {
        $this->db->select('company_cat_id');
        $this->db->select('company_cat_name');
        $this->db->from('company_category');
        $query = $this->db->get();
        $result = $query->result();

        //array to store department id & department name
        $company_cat_id = array('-SELECT-');
        $company_cat_name = array('-SELECT-');

        for ($i = 0; $i < count($result); $i++)
        {
            array_push($company_cat_id, $result[$i]->company_cat_id);
            array_push($company_cat_name, $result[$i]->company_cat_name);
        }
        return $company_cat_result = array_combine($company_cat_id, $company_cat_name);
    }
	
	
	
	
	
	
	
	/**
	 * create_user function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function create_user($username, $email, $password) {
		
		$data = array(
			'username'   => $username,
			'email'      => $email,
			'password'   => $this->hash_password($password),
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('users', $data);
		
	}
	
	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_login($username, $password) {
		
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('username', $username);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
		
	}
	
	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_id_from_username($username) {
		
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('username', $username);

		return $this->db->get()->row('id');
		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user($user_id) {
		
		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
		
	}
	
	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}
	
	// Read data using username and password
	public function login($data) {

	$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
	$this->db->select('*');
	$this->db->from('user_login');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
	return true;
	} else {
	return false;
	}
	}
	
}
