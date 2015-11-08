<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

		$this->load->database(); // load database	
		$this->load->library('HybridAuthLib');
		$this->load->model('login_model');

		$this->load->model('blog_model'); // load Blog model
		$this->load->model('events_model'); // load Event model
		$this->load->model('company_model'); // load Company model
		$this->load->model('doctor_model'); // load Doctor model
		$this->load->model('user_model'); // load Users model
		$this->load->model('home_model'); // load Users model
		$this->data['get_top_ten_doctor'] = $this->home_model->getTopTenDoctor();
    }

	//Index Function
/*	public function index()
	{
		$this->load->view('template/view_blank_header');
		$this->load->view('user/view_login',$this->data);
		$this->load->view('template/view_footer',$this->data);
	}*/
	
	
	
	function social_login($provider) {
		try {
			
			if ($this->hybridauthlib->providerEnabled($provider)) {

				$service = $this->hybridauthlib->authenticate($provider);
				
				if ($service->isUserConnected()) {

					$user_profile = $service->getUserProfile();

					// check if the current user already have authenticated using this provider before
					$user_exist = $this->login_model->get_user_by_provider_and_id( $provider, $user_profile->identifier );

					if( ! $user_exist )
					{
						$data['soc'] = $provider;
						$data['user_profile'] = $user_profile;

						$this->session->set_userdata('user_id', $user_profile->identifier);

						$data['specility'] = $this->user_model->get_doctors_specility();
						$data['district'] = $this->user_model->get_district();

						$this->load->view('user/signup', $data);
					}else{

						$this->session->set_userdata('user_id', $user_profile->identifier);

						$user_id = $user_profile->identifier;

						$type = $this->login_model->get_user_type_by_provider_and_id($user_id);
						$this->session->set_userdata('user_type', $type);

						redirect(base_url());
					}


				} else // Cannot authenticate user				
				{
					show_error('Cannot authenticate user');
				}
			} else // This service is not enabled.			
			{
				show_404($_SERVER['REQUEST_URI']);
			}
		} catch (Exception $e) {
			$error = 'Unexpected error';
			switch ($e->getCode()) {
				case 0:
					$error = 'Unspecified error.';
					break;
				case 1:
					$error = 'Hybriauth configuration error.';
					break;
				case 2:
					$error = 'Provider not properly configured.';
					break;
				case 3:
					$error = 'Unknown or disabled provider.';
					break;
				case 4:
					$error = 'Missing provider application credentials.';
					break;
				case 5:
					log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.'); //redirect();	
					if (isset($service)) {

						$service->logout();
					}
					show_error('User has cancelled the authentication or the provider refused the connection.');
					break;

				case 6:
					$error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
					break;
				case 7:
					$error = 'User not connected to the provider.';
					break;
			}
			if (isset($service)) {
				$service->logout();
			}
			show_error('Error authenticating user.');
		}
	}

	public function social_logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());

	}


	public function endpoint()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			$_GET = $_REQUEST;
		}
		require_once APPPATH.'/third_party/hybridauth/index.php';
	}




	// Register Doctors
	public function register_new_user(){

		//Create Validation Rules
		$this->form_validation->set_rules('form-name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('form-email', 'User Email', 'trim|xss_clean');
		$this->form_validation->set_rules('user-type', 'Registerd User Type', 'trim|xss_clean');
		$this->form_validation->set_rules('form-title', 'Title/Degree', 'trim|xss_clean');
		$this->form_validation->set_rules('form-bmdc', 'Form ', 'trim|xss_clean');
		$this->form_validation->set_rules('form-pcrn', 'Title/Degree', 'trim|xss_clean');
		$this->form_validation->set_rules('form-experties', 'Title/Degree', 'trim|xss_clean');
		$this->form_validation->set_rules('form-fbpagelink', 'Title/Degree', 'trim|xss_clean');
		$this->form_validation->set_rules('form-dist', 'Title/Degree', 'trim|xss_clean');
		$this->form_validation->set_rules('form-specility', 'Title/Degree', 'trim|xss_clean');


		if($this->form_validation->run() == FALSE)
		{

			$data['error'] = validation_errors();
			//fail validation
			$this->load->view('template/view_blank_header');
			$this->load->view('user/view_login',$data);
			$this->load->view('template/view_footer',$data);
		}
		else
		{
			//This insert for Doctor
			if($this->input->post('user-type') == 'doctor'){

				$user_data = array(
					'social_login_user' => $this->input->post('form-name'),
					'social_login_email' => $this->input->post('form-email'),
					'social_login_user_type' => $this->input->post('user-type'),
					'hybridauth_provider_name' => $this->input->post('Provider'),
					'hybridauth_provider_uid' => $this->input->post('provider-id'),
				);

				$this->db->insert('social_users', $user_data);

				$soc_id = $this->db->insert_id();

				$doctor_data = array(
					'doctor_name' => $this->input->post('form-name'),
					'doctor_title' => $this->input->post('form-title'),
					'doctor_bmdc_no' => $this->input->post('form-bmdc'),
					'doctor_district' => $this->input->post('form-dist'),
					'doctor_specialist' => $this->input->post('form-specility'),
				);

				$this->db->insert('doctors', $doctor_data);
				$doctor_id = $this->db->insert_id();

				$user_doctor_data = array(
					'user_id' => $soc_id,
					'doctor_id' => $doctor_id,
				);

				$this->db->insert('user_doc', $user_doctor_data);



				$this->session->set_userdata('user_id', $this->input->post('provider-id'));

				$user_id = $this->input->post('provider-id');

				$type = $this->login_model->get_user_type_by_provider_and_id($user_id);
				$this->session->set_userdata('user_type', $type);


				redirect(base_url());

			}elseif($this->input->post('user-type') == 'pharmacist'){

				$user_data = array(
					'social_login_user' => $this->input->post('form-name'),
					'social_login_email' => $this->input->post('form-email'),
					'social_login_user_type' => $this->input->post('user-type'),
					'hybridauth_provider_name' => $this->input->post('Provider'),
					'hybridauth_provider_uid' => $this->input->post('provider-id'),
				);

				$this->db->insert('social_users', $user_data);

				$soc_id = $this->db->insert_id();

				$health_business_data = array(
					'pharmacist_name' => $this->input->post('form-name'),
					'pharmacist_title' => $this->input->post('form-title'),
					'pharmacist_reg_no' => $this->input->post('form-pcrn'),
				);

				$this->db->insert('pharmacist', $health_business_data);
				$pharmacist_id = $this->db->insert_id();

				$user_doctor_data = array(
					'user_id' => $soc_id,
					'pharmacist_id' => $pharmacist_id,
				);

				$this->db->insert('user_pharma', $user_doctor_data);

				/****************Set session data*********************/

				$this->session->set_userdata('user_id', $this->input->post('provider-id'));

				$user_id = $this->input->post('provider-id');

				$type = $this->login_model->get_user_type_by_provider_and_id($user_id);
				$this->session->set_userdata('user_type', $type);

				//Redirect after successfully register
				redirect(base_url());

			}elseif($this->input->post('user-type') == 'health-business'){

				$user_data = array(
					'social_login_user' => $this->input->post('form-name'),
					'social_login_email' => $this->input->post('form-email'),
					'social_login_user_type' => $this->input->post('user-type'),
					'hybridauth_provider_name' => $this->input->post('Provider'),
					'hybridauth_provider_uid' => $this->input->post('provider-id'),
				);

				$this->db->insert('social_users', $user_data);

				$soc_id = $this->db->insert_id();

				$health_business_data = array(
					'health_business_name' => $this->input->post('form-name'),
					'health_business_experties' => $this->input->post('form-experties'),
					'health_business_facebook_link' => $this->input->post('form-fbpagelink'),
				);

				$this->db->insert('health_business', $health_business_data);
				$health_business_id = $this->db->insert_id();

				$user_health_business_data = array(
					'user_id' => $soc_id,
					'health_business_id' => $health_business_id,
				);

				$this->db->insert('user_health_business', $user_health_business_data);

				/****************Set session data*********************/

				$this->session->set_userdata('user_id', $this->input->post('provider-id'));

				$user_id = $this->input->post('provider-id');

				$type = $this->login_model->get_user_type_by_provider_and_id($user_id);
				$this->session->set_userdata('user_type', $type);

				//Redirect after successfully register
				redirect(base_url());
			}elseif($this->input->post('user-type') == 'fan'){

				$user_data = array(
					'social_login_user' => $this->input->post('form-name'),
					'social_login_email' => $this->input->post('form-email'),
					'social_login_user_type' => $this->input->post('user-type'),
					'hybridauth_provider_name' => $this->input->post('Provider'),
					'hybridauth_provider_uid' => $this->input->post('provider-id'),
				);

				$this->db->insert('social_users', $user_data);

				$soc_id = $this->db->insert_id();

				$fan_data = array(
					'fan_name' => $this->input->post('form-name'),
				);

				$this->db->insert('fan', $fan_data);
				$fan_id = $this->db->insert_id();

				$user_fan_data = array(
					'user_id' => $soc_id,
					'fan_id' => $fan_id,
				);

				$this->db->insert('user_fan', $user_fan_data);

				/****************Set session data*********************/

				$this->session->set_userdata('user_id', $this->input->post('provider-id'));

				$user_id = $this->input->post('provider-id');

				$type = $this->login_model->get_user_type_by_provider_and_id($user_id);
				$this->session->set_userdata('user_type', $type);

				//Redirect after successfully register
				redirect(base_url());
			}


		}

	}
	
	
	// Check for user login process
		/* public function user_login_process() {

			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			
				if(isset($this->session->userdata['logged_in'])){
					$this->load->view('admin/view_header');
					$this->load->view('admin/view_admin');
					$this->load->view('admin/view_footer');
				}else{
					$this->load->view('template/view_header');
					$this->load->view('user/view_login');
					$this->load->view('template/view_footer');
				}
			} else {
				$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
				);
				$result = $this->login_database->login($data);
				if ($result == TRUE) {

					$username = $this->input->post('username');
					$result = $this->login_database->read_user_information($username);
					if ($result != false) {
					$session_data = array(
					'username' => $result[0]->user_name,
					'email' => $result[0]->user_email,
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					$this->load->view('admin/view_header');
					$this->load->view('admin/view_admin');
					$this->load->view('admin/view_footer');
					}
				} else {
				$data = array(
				'error_message' => 'Invalid Username or Password'
				);
								
				$this->load->view('template/view_header', $data);
				$this->load->view('user/view_login', $data);
				$this->load->view('template/view_footer', $data);
				}
			}
		}

	*/
	
	// Logout from admin page
		/*
		public function logout() {

			// Removing session data
			$sess_array = array(
			'username' => ''
			);
			$this->session->unset_userdata('logged_in', $sess_array);
			$data['message_display'] = 'Successfully Logout';
			$this->load->view('template/view_header');
			$this->load->view('view_home');
			$this->load->view('template/view_footer');
		}
		
		*/
	
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	 
	 /* 
	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
			$this->load->view('template/view_header');
			$this->load->view('user/view_logout_success', $data);
			$this->load->view('template/view_footer');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
		}
		
	} */

	
	
}