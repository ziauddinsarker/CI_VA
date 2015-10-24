<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();        
		$this->load->helper('captcha');	
		$this->load->library('email');
		
		$this->load->database(); // load database		
		$this->load->model('blog_model'); // load Blog model
		$this->load->model('event_model'); // load Event model
		$this->load->model('company_model'); // load Company model
		$this->load->model('doctor_model'); // load Doctor model
		$this->load->model('pharmacist_model'); // load Doctor model
		$this->load->model('user_model'); // load Users model
		$this->load->model('home_model'); // load Home model
		$this->load->model('location_model'); // load Location model
		$this->load->model('search_model');
		//$this->load->model('healthcare_model');
		$this->load->model('shop_model');
		
		//Get Blog Data
		//$this->data['blogs'] = $this->blog_model->getPosts(); // calling Blog model method getPosts()
		$this->data['blogs'] = $this->blog_model->get_all_posts();		
		
		//Get Events Data
		$this->data['events'] = $this->event_model->getEvents(); // calling Event model method getPosts()

		//Get Healthcare Data
		$this->data['company_category_first'] = $this->company_model->getCompanyCategory(4,0); // calling Company model method getPosts()
		$this->data['company_category_middle'] = $this->company_model->getCompanyCategory(4,4); // calling Company model method getPosts()
		$this->data['company_category_last'] = $this->company_model->getCompanyCategory(4,8); // calling Company model method getPosts()

		//Get Doctors Rating
		$this->data['doctors_rating'] = $this->doctor_model->getDoctorsRating(); // calling Blog model method getPosts()
		//var_dump($this->data['doctors_rating']);
		
		//Get All Districts
		$this->data['district'] = $this->home_model->getDistrict();
		
		//Get Doctors Data
		//$this->data['doctors_category_22_1'] = $this->home_model->getDoctorsCategoryOnly(15,0);
		//$this->data['doctors_category_22_2'] = $this->home_model->getDoctorsCategoryOnly(15,16);
		//$this->data['doctors_category_22_3'] = $this->home_model->getDoctorsCategoryOnly(15,30);

		$this->data['doctors_category_22_1'] = $this->home_model->getDoctorsCategoryOnly(21,0);
		$this->data['doctors_category_22_2'] = $this->home_model->getDoctorsCategoryOnly(21,22);






		$this->data['doctors_category_only'] = $this->home_model->getDoctorsCategoryOnly();
		
		$this->data['get_top_ten_doctor'] = $this->home_model->getTopTenDoctor();	
		//$this->data['get_rating_for_doctor'] = $this->doctor_model->get_rating_for_doctor();	

		//Get All Doctors Data
		$this->data['all_pharmacist'] = $this->pharmacist_model->getPharmacist();

		//Get All Doctors Data
		$this->data['all_doctors'] = $this->home_model->get_all_doctor();
		//var_dump($this->data['all_doctors']);
		
		//Get All Discount
		$this->data['all_discount'] = $this->home_model->getAllDiscount();
		
		  //Get Divistion
         $this->data['divisions'] = $this->location_model->get_division();

		 
    }

	//Index Function
	public function index()	
	{		
		 	$this->load->view('template/view_header', $this->data);
			$this->load->view('template/view_about', $this->data);
			$this->load->view('template/view_top_list', $this->data);
			$this->load->view('template/view_brand', $this->data);
			$this->load->view('template/view_pharmacist', $this->data);
			$this->load->view('template/view_doctor', $this->data);
			$this->load->view('template/view_healthcare', $this->data);
			$this->load->view('template/view_events', $this->data);
			$this->load->view('template/view_discount', $this->data);
			$this->load->view('template/view_review_news', $this->data);
			//$this->load->view('template/view_faq', $this->data);
			//$this->load->view('template/view_contact', $this->data);				
			$this->load->view('template/view_footer', $this->data);
	}	

	
	public function view_doctor(){
		$this->load->view('view_doctor');
		$this->load->view('template/view_footer', $this->data);
	}


	
	//Load all data from brand table and show as json 
	/*
	* @var data
	*
	*@model search_model
	*@method search_brand_strength
	*
	*Get Brand name from search_brand_strength table
	*/
	public function get_brand(){			
			$data = $this->search_model->search_brand_strength();
			echo json_encode($data);
	}


	//Get company by category 
	public function get_com_by_cat(){		
		$catgory = $this->input->post('data');	
		$data = $this->company_model->get_company_by_category($catgory);		
		echo json_encode($data);
	}


	/**********Doctor Tab*************/
	public function get_division(){
		$data = $this->location_model->get_division();
		echo json_encode($data);
	}

	public function get_district(){
		$division = $this->input->post('data');
		$data = $this->location_model->get_district($division);
		echo json_encode($data);
	}

	public function get_doctor(){
		$doctor_category = $this->input->post('doctorCategory');
		$doctor_district = $this->input->post('district');
		$data = $this->doctor_model->get_doc_based_on_category_and_district($doctor_category, $doctor_district);
		echo json_encode($data);
	}

	/*******End Doctor Tab***********/


	//Get District by Division 
	public function get_dist_from_division(){		
		$division = $this->input->post('data');	
		$data = $this->location_model->get_distrct_from_division($division);		
		echo json_encode($data);
	}
	
	//Get Thana from District 
	public function get_thana_from_district(){		
		$district = $this->input->post('data');
		$data = $this->location_model->get_thana_from_district($district);
		echo json_encode($data);
	}
	
	
	//Get shop based on thana and brand
	public function get_shop_based_on_thana_and_brand(){
		$thana = $this->input->post('thana');
		$brand = $this->input->post('brand');
		$data['thana'] = $this->shop_model->get_shop_from_thana($thana);
		$data['brand']= $this->shop_model->get_shop_based_on_thana_and_brand($brand);
		echo json_encode($data);
	}

	
	
	
	
	//Function for Sending contact information form contact form
	public function send_contact(){
		
		//Create Validation Rules
		$this->form_validation->set_rules('contact_subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('contact_name', 'Doctors Title', 'trim|xss_clean');
        $this->form_validation->set_rules('contact_email', 'Doctors Gender', 'trim|xss_clean');
        $this->form_validation->set_rules('contact_phone', 'Doctors BMDC', 'trim|xss_clean');
        $this->form_validation->set_rules('contact_text', 'Doctors Email', 'required');
        
		if($this->form_validation->run() == FALSE)
		{			
			$data['error'] = validation_errors();
			//fail validation
            $this->load->view('template/view_header');
            $this->load->view('template/view_contact', $data);
            $this->load->view('template/view_footer');
		}
		else 
		{
			$contact_data = array(				
				'contact_subject' => $this->input->post('contact_subject'),
				'contact_name' => $this->input->post('contact_name'),
				'contact_email' => $this->input->post('contact_email'),
				'contact_phone' => $this->input->post('contact_phone'),
				'contact_text' => $this->input->post('contact_text')
			);
			
			
			$this->db->insert('contact', $contact_data);
			
			// Email configuration
			  $config = Array(
				 'protocol' => 'smtp',
				 'smtp_host' => 'smtp.bhalo-achee.com.',
				 'smtp_port' => 465,
				 'smtp_user' => 'admin@bhalo-achee.com', // change it to yours
				 'smtp_pass' => '19A14t1&', // change it to yours
				 'mailtype' => 'html',
				 'charset' => 'iso-8859-1',
				 'wordwrap' => TRUE
			  ); 
			 
			  $this->load->library('email', $config);
			  $this->email->from($this->input->post('contact_email'), $this->input->post('contact_name'));
			  $this->email->to("ziauddin.sarker@gmail.com");
			  
			  $this->email->subject($this->input->post('contact_subject'));
			  $this->email->message($this->input->post('contact_text'));
			   
			  $data['message'] = "Sorry Unable to send email..."; 
			  if($this->email->send()){     
			   $data['message'] = "Mail sent...";   
			  } 
			
			redirect(base_url());
		}
	}
	
	//Get Doctors From Category
	/* function getDoctorsFromCategory(){		

		if ($district_from_districts = $this->input->post('district'))
		{
			$query = $this->doctor_model->get_all_doctor_from_category($district_from_districts);
			header('Content-Type: application/json');
			echo json_encode($query);
		} else {
			redirect('home/getDoctorsFromCategory');
		}

	} */
	
	function getDoctorsFromCategory(){	
	
		if (isset($_POST['category'])) {
		  $data['ajax_req'] = TRUE;
		  $data['doctor_list'] = $this->doctor_model->get_doctor_by_category($_POST['category']);
		  $this->load->view('view_home',$data);

		}
	}
	
	
	function add_rsb(){
		//Create Validation Rules
		$this->form_validation->set_rules('rsb_description', 'RSB Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('rsb_date', 'RSB Input Date', 'trim|xss_clean');
        $this->form_validation->set_rules('rsb_point', 'RSB Point', 'trim|xss_clean');
		
		if($this->form_validation->run() == FALSE)
		{			
			$data['error'] = validation_errors();
			//fail validation
            $this->load->view('template/view_header');
            $this->load->view('user/view_home', $data);
            $this->load->view('template/view_footer');
		}
		else 
		{
			
			$rsb_data = array(				
				'rating_description' => $this->input->post('rsb_description'),
				'rating_value' => $this->input->post('rsb_point'),
				'rating_date' => $this->input->post('rsb_date')
			);
			
			$this->db->insert('rating', $rsb_data);	
			
			$rating_id = $this->db->insert_id();
			
			$doctor_rating_data = array(
				'doctor_id' => $this->input->post('doctor_id'),
				'rating_id' => $rating_id
			);
					
			$this->doctor_model->add_rating_to_doctor($doctor_rating_data);
			
			redirect(base_url());
		}
		
		
		
		
	}
	
	
	//Get doctors from category when click
	function give_more_doctor() {
		$this->load->model('home_model'); // load Home model
        $category_name = $this->input->post('doctor_category_name');
		
		if ($category_name === NULL) {
            $results = $this->home_model->get_all();
        } else {
            $results = $this->home_model->get_doctor_by_cateogry($category_name);
        }
		
		//$results = $this->home_model->get_all();   
		
		//$results = $this->home_model->get_doctor_by_cateogry($category_name);		
		//$results = $this->home_model->get_doctor_by_cateogry('Andrologists  
//');		
        $data['doctor_list_from_doctor'] = $results;
        $filter_view = $this->load->view('doc_cat_filter', $data, TRUE);
	    echo json_encode($filter_view);
    }
	
	
	
	function add_new_entry()
    {
        //set validation rules
        $this->form_validation->set_rules('post_title', 'Title', 'required');
        $this->form_validation->set_rules('post', 'Post Body', 'required');
 
        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('template/view_header');
            $this->load->view('view_home',$data);			
            $this->load->view('template/view_footer');
        }
        else
        {
            //if valid
            $title = $this->input->post('post_title');
            $body = $this->input->post('post');
            $this->blog_model->add_new_entry($title,$body);
            $this->session->set_flashdata('message', '1 new entry added!');
			//if not valid
            redirect('home');
        }
    }
	
	
	//Add New post from homepage
	function new_post()//Creating new post page
    {
        if(!$this->check_permissions('author'))//when the user is not an admin and author
        {
            redirect(base_url().'users/login');
        }
        if($this->input->post())
        {
            $data = array(
                'post_title' => $this->input->post('post_title'),
                'post' => $this->input->post('post'),
                'active' => 1,
            );
            $this->blog_model->insert_post($data);
            redirect(base_url());
        }
        else{          
            $this->load->view('template/view_header');
            $this->load->view('view_home');
            $this->load->view('template/view_footer');
        }
    }
	//Add New Event from Homepage
	function new_event()//Creating new post page
		{
			if(!$this->check_permissions('author'))//when the user is not an admin and author
			{
				redirect(base_url().'users/login');
			}
			
			 //set validation rules
			$this->form_validation->set_rules('events_name', 'Event Name', 'required');
			$this->form_validation->set_rules('events_time', 'Event Time', 'required');
			$this->form_validation->set_rules('events_address', 'Event Address', 'required');
			$this->form_validation->set_rules('events_phone', 'Event Phone', 'required');
			$this->form_validation->set_rules('events_contact_time', 'Post Body', 'required');
			$this->form_validation->set_rules('events_email', 'Post Body', 'required');
			$this->form_validation->set_rules('events_email', 'Post Body', 'required');
			$this->form_validation->set_rules('events_content', 'Post Body', 'required');
	 
			if ($this->form_validation->run() == FALSE)
			{
				//if not valid
				$this->load->view('template/view_header');
				$this->load->view('view_home',$data);			
				$this->load->view('template/view_footer');
			}
			else
			{				
				if($this->input->post())
					{
						$data = array(
							'events_name' => $this->input->post('events_name'),
							'events_time' => $this->input->post('events_time'),
							'events_address' => $this->input->post('events_address'),
							'events_phone' => $this->input->post('events_phone'),
							'events_contact_time' => $this->input->post('events_contact_time'),
							'events_email' => $this->input->post('events_email'),
							'events_content' => $this->input->post('events_content'),
							'event_author' => $this->input->post($_GET['session_id']),
						);
						$this->event_model->insert_event($data);
						$this->session->set_flashdata('message', '1 new entry added!');
						redirect(base_url());
					}
					else{          
						$this->load->view('template/view_header');
						$this->load->view('view_home');
						$this->load->view('template/view_footer');
					}
			}		
		}

	
	function check_permissions($required)//checking current user's permission
		{
			$user_type = $this->session->userdata('user_type');//curren user
			if($required == 'user')//requirment is user 
			{
				if($user_type){return TRUE;}//all user have permission
			}
			elseif($required == 'author')//when requirement is author
			{
				if($user_type == 'author' || $user_type == 'admin')//author and admin have the permission
				{
					return TRUE;
				}
			}
			elseif($required == 'admin')//when required is admin
			{
				if($user_type == 'admin'){return TRUE;}//only admin have the permission
			}
		}
		
			
	
}