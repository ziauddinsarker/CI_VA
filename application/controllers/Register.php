<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
     	$this->load->database(); // load database			
		$this->load->model('model_user'); // load Users model
		$this->load->model('user_model'); // load Users model
    }

	
	function index()
    {
        $data['error'] = NULL;
		
		$data['specility'] = $this->user_model->get_doctors_specility();
		$data['district'] = $this->user_model->get_district();
		
        $this->load->view('template/view_blank_header');
        $this->load->view('user/view_registers', $data);
        $this->load->view('template/view_footer');
    }
	
	
	
	// Register Doctors
	public function register_doctor(){
		
		//Create Validation Rules
		$this->form_validation->set_rules('doctor_full_name', 'Doctors Full Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('doctor_title', 'Doctors Title', 'trim|xss_clean');
        $this->form_validation->set_rules('doctor_gender', 'Doctors Gender', 'trim|xss_clean');
        $this->form_validation->set_rules('doctor_bmdc', 'Doctors BMDC', 'trim|xss_clean');
        $this->form_validation->set_rules('doctor_user_email', 'Doctors Email', 'required');
        $this->form_validation->set_rules('doctor_phone', 'Doctors Phone', 'required|numeric');
        $this->form_validation->set_rules('doctor_specility', 'Doctors Specility', 'xss_clean');		
        $this->form_validation->set_rules('doctor_address', 'Doctors Address', 'required|xss_clean');
        $this->form_validation->set_rules('doctor_district', 'Doctors District', 'xss_clean');
        $this->form_validation->set_rules('doctor_user_name', 'Doctors User Name', 'required|xss_clean');
        $this->form_validation->set_rules('doctor_user_password_new', 'Doctors Password New', 'required');
        $this->form_validation->set_rules('doctor_user_password_repeat', 'Doctors Repeat Password', 'required');
		
		if($this->form_validation->run() == FALSE)
		{
			
			$data['error'] = validation_errors();
			//fail validation
            $this->load->view('template/view_header');
            $this->load->view('user/view_registers', $data);
            $this->load->view('template/view_footer');
		}
		else 
		{
		
			$user_data = array(				
				'username' => $this->input->post('doctor_user_name'),
				'password' => sha1($this->input->post('doctor_user_password_new')),
				'email' => $this->input->post('doctor_user_email'),
				'user_type' => $this->input->post('doctor_user_type'),
			);
			
			$this->db->insert('users', $user_data);			
			$user_id = $this->db->insert_id();
			
			$doctor_data = array(
				'doctor_name' => $this->input->post('doctor_full_name'),
				'doctor_title' => $this->input->post('doctor_title'),
				'doctor_gender' => $this->input->post('doctor_gender'),
				'doctor_bmdc_no' => $this->input->post('doctor_bmdc'),
				'doctor_email' => $this->input->post('doctor_user_email'),
				'doctor_phone' => $this->input->post('doctor_phone'),
				'doctor_specialist' => $this->input->post('doctor_specility'),
				'doctor_address' => $this->input->post('doctor_address'),
				'doctor_district' => $this->input->post('doctor_district'),
				'doctor_user_name' => $user_id
			);
					
			$this->model_user->create_doctor($doctor_data);
			
			$this->session->set_userdata('user_id',$user_id);
			$this->session->set_userdata('username',$this->input->post('username'));
			$this->session->set_userdata('user_type',$this->input->post('user_type')); 
			
			redirect(base_url());
		}

	}
	
	
	// Register Pharmacist
	public function register_pharmacist(){
		
		//Create Validation Rules
		$this->form_validation->set_rules('doctor_full_name', 'Doctors Full Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('doctor_title', 'Doctors Title', 'trim|xss_clean');
        $this->form_validation->set_rules('doctor_gender', 'Doctors Gender', 'trim|xss_clean');
        $this->form_validation->set_rules('doctor_bmdc', 'Doctors BMDC', 'trim|xss_clean');
        $this->form_validation->set_rules('doctor_user_email', 'Doctors Email', 'required');
        $this->form_validation->set_rules('doctor_phone', 'Doctors Phone', 'required|numeric');
        $this->form_validation->set_rules('doctor_specility', 'Doctors Specility', 'xss_clean');		
        $this->form_validation->set_rules('doctor_address', 'Doctors Address', 'required|xss_clean');
        $this->form_validation->set_rules('doctor_district', 'Doctors District', 'xss_clean');
        $this->form_validation->set_rules('doctor_user_name', 'Doctors User Name', 'required|xss_clean');
        $this->form_validation->set_rules('doctor_user_password_new', 'Doctors Password New', 'required');
        $this->form_validation->set_rules('doctor_user_password_repeat', 'Doctors Repeat Password', 'required');
		
		if($this->form_validation->run() == FALSE)
		{
			
			$data['error'] = validation_errors();
			//fail validation
            $this->load->view('template/view_header');
            $this->load->view('user/view_registers', $data);
            $this->load->view('template/view_footer');
		}
		else 
		{
		
			$user_data = array(				
				'username' => $this->input->post('doctor_user_name'),
				'password' => sha1($this->input->post('doctor_user_password_new')),
				'email' => $this->input->post('doctor_user_email'),
				'user_type' => $this->input->post('doctor_user_type'),
			);
			
			$this->db->insert('users', $user_data);			
			$user_id = $this->db->insert_id();
			
			$doctor_data = array(
				'doctor_name' => $this->input->post('doctor_full_name'),
				'doctor_title' => $this->input->post('doctor_title'),
				'doctor_gender' => $this->input->post('doctor_gender'),
				'doctor_bmdc_no' => $this->input->post('doctor_bmdc'),
				'doctor_email' => $this->input->post('doctor_user_email'),
				'doctor_phone' => $this->input->post('doctor_phone'),
				'doctor_specialist' => $this->input->post('doctor_specility'),
				'doctor_address' => $this->input->post('doctor_address'),
				'doctor_district' => $this->input->post('doctor_district'),
				'doctor_user_name' => $user_id
			);
					
			$this->model_user->create_doctor($doctor_data);
			
			$this->session->set_userdata('user_id',$user_id);
			$this->session->set_userdata('username',$this->input->post('username'));
			$this->session->set_userdata('user_type',$this->input->post('user_type')); 
			
			redirect(base_url());
		}

	}
	
	
	
	
	
	
	
	
	
	
	
	
	/* 
	
	//Index Function
	public function index()	
	{
		
		
		
		
		
		
		//fetch data from department and designation tables
        $data['specility'] = $this->user_model->get_doctors_specility();
        $data['district'] = $this->user_model->get_district();
        $data['business_type'] = $this->user_model->get_company_category();
		
		
		//set validation rules
        $this->form_validation->set_rules('doctorfullname', 'Doctors Full Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('doctortitle', 'Doctors Title', 'trim|xss_clean');
        $this->form_validation->set_rules('doctorgender', 'Doctors Gender', 'trim|xss_clean');
        $this->form_validation->set_rules('doctorbmdc', 'Doctors BMDC', 'trim|xss_clean');
        $this->form_validation->set_rules('doctoruser_email', 'Doctors Email', 'required');
        $this->form_validation->set_rules('doctorphone', 'Doctors Phone', 'required|numeric');
        $this->form_validation->set_rules('specility', 'Doctors Specility', 'required|xss_clean');
        $this->form_validation->set_rules('doctoraddress', 'Doctors Address', 'required|xss_clean');
        $this->form_validation->set_rules('district', 'Doctors District', 'required|xss_clean');
        $this->form_validation->set_rules('doctoruser_name', 'Doctors User Name', 'required|xss_clean');
        $this->form_validation->set_rules('doctoruser_password_new', 'Doctors Password New', 'required');
        $this->form_validation->set_rules('doctoruser_password_repeat', 'Doctors Repeat Password', 'required');
		
		if ($this->form_validation->run() == FALSE)
        {
            //fail validation
            $this->load->view('template/view_header');
            $this->load->view('user/view_registers', $data);
            $this->load->view('template/view_footer');
        }
        else
		{  //pass validation
			
			$userpass = array(
				'user_name' => $this->input->post('doctoruser_name'),
                'user_password' => $this->input->post('doctoruser_password_new')	
			);
			
			$this->db->insert('user_login', $userpass);
				
			$doc_user_name = $this->db->insert_id();
			
			
            $data = array(
                'doctor_name' => $this->input->post('doctorfullname'),
                'doctor_title' => $this->input->post('doctortitle'),
                'doctor_gender' => $this->input->post('doctorgender'),
                'doctor_bmdc_no' => $this->input->post('doctorbmdc'),
                'doctor_email' => $this->input->post('doctoruser_email'),
                'doctor_phone' => $this->input->post('doctorphone'),
                'doctor_specialist' => $this->input->post('specility'),
                'doctor_address_1' => $this->input->post('doctoraddress'),
                'doctor_district' => $this->input->post('district'),  
                'doctor_user_name' => $doc_user_name
            );

			
			
            //insert the form data into database
            $this->db->insert('doctors', $data);

            //display success message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Employee details added to Database!!!</div>');
            redirect('home/index');
        }
	
	} */
	
	

}