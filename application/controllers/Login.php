<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->database(); // load database	
		$this->load->library('HybridAuthLib');
		//$this->load->model('login_database');

		$this->load->model('blog_model'); // load Blog model
		$this->load->model('event_model'); // load Event model
		$this->load->model('company_model'); // load Company model
		$this->load->model('doctor_model'); // load Doctor model
		$this->load->model('user_model'); // load Users model
		$this->load->model('home_model'); // load Users model
		$this->data['get_top_ten_doctor'] = $this->home_model->getTopTenDoctor();
    }

	//Index Function
	public function index()		
	{
		$this->load->view('template/view_blank_header');
		$this->load->view('user/view_login',$this->data);
		$this->load->view('template/view_footer',$this->data);
	}
	
	
	
	function social_login($provider) {
		try {
			
			if ($this->hybridauthlib->providerEnabled($provider)) {
				
				$service = $this->hybridauthlib->authenticate($provider);
				
				if ($service->isUserConnected()) {
					
					$user_profile = $service->getUserProfile();
					
					$data['soc'] = $provider;
					
					$data['user_profile'] = $user_profile;
					
					$this->load->view('user/signup', $data);
					
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
	
	
	public function login_process(){
		
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