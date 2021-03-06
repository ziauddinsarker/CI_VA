<?php
Class Login_model extends CI_Model {


	function get_user_by_provider_and_id($provider_name, $provider_id ){
		$this->db->select('hybridauth_provider_uid,hybridauth_provider_name');
		$this->db->where('hybridauth_provider_uid', $provider_id);
		$this->db->where('hybridauth_provider_name', $provider_name);
		$query = $this->db->get('social_users');
		if( $query->num_rows() > 0 )
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}


	function get_user_type_by_provider_and_id($provider_id){
		$this->db->select('hybridauth_provider_uid,hybridauth_provider_name,social_login_user_type');
		$this->db->where('hybridauth_provider_uid', $provider_id);
		$query = $this->db->get('social_users');

		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->social_login_user_type;
		}

		return null; // or wh
	}




	private function email_exists($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('users');
		if( $query->num_rows() > 0 )
			{ 
			return TRUE; 
			} 
		else 
			{
			return FALSE; 
		}
	}

	// Insert registration data in database
	public function registration_insert($data) {

		// Query to check whether username already exist or not
		//$condition = "user_name =" . "'" . $data['user_name'] . "'";
		$condition = "'user_name','" . $data['user_name'] . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get('user_login');
		if ($query->num_rows() == 0) {

		// Query to insert data in database
		$this->db->insert('user_login', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		}
		} else {
		return false;
		}
	}

	// Read data using username and password
	public function login($data) {

		$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		
		//$this->db->where('username', $data['username']);
		//$this->db->where('password', $data['password']);
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
		return true;
		} else {
		return false;
		}
	}

	// Read data from database to show data in admin page
	public function read_user_information($username) {

		$condition = "user_name =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
		return $query->result();
		} else {
			return false;
		}
	}
}

?>