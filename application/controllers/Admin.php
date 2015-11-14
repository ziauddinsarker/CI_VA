<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->library('pagination');

		$this->load->database(); // load database	
		$this->load->model('brand_model');
		$this->load->model('shop_model');
		$this->load->model('doctor_model');
		$this->load->model('pharmacist_model');
		$this->load->model('user_model');
		$this->load->model('blog_model');
		$this->load->model('discount_model');

		//$this->load->model('event_model');

		$this->load->model('events_model');
		$this->load->model('profile_model');
		$this->load->library('HybridAuthLib');


    }

	public function index()
	{
		if((Hybrid_Auth::getConnectedProviders())){

			$user_id = $this->session->userdata('user_id');

			$this->data['singleDoctor'] = $this->doctor_model->getSingleDoctorInfo($user_id);
			//var_dump($this->data['singleDoctor']);
			$this->data['singlePharmacist'] = $this->pharmacist_model->getSinglePharmacistInfo($user_id);

			$this->data['specility'] = $this->user_model->get_doctors_specility();
			$this->data['district'] = $this->user_model->get_district();

			$this->load->view('admin/view_header');
			$this->load->view('admin/view_admin',$this->data);
			$this->load->view('admin/view_footer');

		}elseif($this->session->userdata('user_id') && ($this->session->userdata('user_type') == "admin")){
			$this->load->view('admin/view_header');
			$this->load->view('admin/view_admin');
			$this->load->view('admin/view_footer');
		}

	}






	public function medicine($offset = 0)
	{
		// Config setup
		$config['base_url'] = base_url().'/admin/medicine/';
		$config['total_rows']= $this->db->count_all('brand');
		$config['per_page'] = 50;
		// I added this extra one to control the number of links to show up at each page.
		$config['num_links'] = 10;

		/******************************/
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		/******************************/
		// Initialize
		$this->pagination->initialize($config);
		// Query the database and get results
		//$data['books'] = $this->db->get('books');

		$data['medicines'] = $this->brand_model->getBrands(10,$offset);
		//var_dump($data['medicines']);
		$this->load->view('admin/view_header');
       	$this->load->view('admin/view_medicine',$data);
        $this->load->view('admin/view_footer');
		//echo json_encode($data);
	}
	
	public function shop()
	{ 		
		$data['shops'] = $this->shop_model->index();
		$this->load->view('admin/view_header');
       	$this->load->view('admin/view_shop', $data);
        $this->load->view('admin/view_footer');
	}
	
	public function doctor()
	{ 		
		$data['doctors'] = $this->doctor_model->getDoctorsInformation();
		$this->load->view('admin/view_header');
       	$this->load->view('admin/view_doctor',$data);
        $this->load->view('admin/view_footer');
	}

	/**
	 *
	 */
	public function user()
	{ 		
		$data['users'] = $this->user_model->get_all_users();
		$this->load->view('admin/view_header');
       	$this->load->view('admin/view_user',$data);
        $this->load->view('admin/view_footer');
	}



	/************************************************/
	/*****************Blog***********************/
	/************************************************/
	/**
	 * Get post of individual user in admin panel
	 */
	public function getAllPostOfUser(){
		$user_id = $this->session->userdata('user_id');
		$data['blogs'] = $this->blog_model->getAllPostOfUser($user_id);
		$this->load->view('admin/view_header');
		$this->load->view('admin/view_blog',$data);
		$this->load->view('admin/view_footer');
	}

	public function addNewPost(){
		$user_id = $this->session->userdata('user_id');
		$data['sui'] = $this->user_model->getSingleUserId($user_id);
		$this->load->view('admin/view_header');
		$this->load->view('admin/view_add_blog',$data);
		$this->load->view('admin/view_footer');
	}

	public function SaveNewPost(){
		$this->form_validation->set_rules('social-usr-id', 'User Id', 'required');
		$this->form_validation->set_rules('post-title', 'Post Title', 'required');
		$this->form_validation->set_rules('post-description', 'Post Description', 'required');
		$this->form_validation->set_rules('published', 'Published or Not', 'required');

		if ($this->form_validation->run() == FALSE){
			redirect('admin/addNewPost');
		}else{
			$this->blog_model->addNewPost();

			redirect('admin/getAllPostOfUser');
		}
	}


	/**
	 * Get All post from all users and this is only for admin
	 */
	public function blog()
	{
		$data['blogs'] = $this->blog_model->getAllPosts();
		$this->load->view('admin/view_header');
       	$this->load->view('admin/view_blog',$data);
        $this->load->view('admin/view_footer');
	}

	public function all_blog(){
		$data['blogs'] = $this->blog_model->getAllPosts();
		$this->load->view('admin/view_header');
		$this->load->view('admin/view_blog_admin',$data);
		$this->load->view('admin/view_footer');
	}

	public function editPost(){
		$post_id = $this->uri->segment(3);
		if ($post_id == NULL) {
			redirect('admin/getAllPostOfUser');
		}
		$dt = $this->blog_model->editPost($post_id);

		$data['post_id'] = $post_id;
		$data['post_title'] = $dt->post_title;
		$data['post_desc'] = $dt->post;
		$data['active_or_not'] = $dt->active;


		$this->load->view('admin/view_header');
		$this->load->view('admin/view_edit_blog',$data);
		$this->load->view('admin/view_footer');
	}

	function updatePost() {

		if ($this->input->post('updatepost')) {
			$postId = $this->input->post('post-id');
			$this->blog_model->updatePost($postId);
			redirect('admin/getAllPostOfUser');
		} else{
			$id = $this->input->post('post-id');
			redirect('admin/editPost/'. $id);
		}
	}

	/**
	 *
	 */
	function deletePost() {
		$u = $this->uri->segment(3);
		$this->blog_model->deletePost($u);
		redirect('admin/getAllPostOfUser');
	}


	/************************************************/
	/*****************Discount***********************/
	/************************************************/
	public function getAllDiscountOfUser(){
		$user_id = $this->session->userdata('user_id');
		$data['discounts'] = $this->discount_model->getAllDiscountOfUser($user_id);
		$this->load->view('admin/view_header');
		$this->load->view('admin/view_discount',$data);
		$this->load->view('admin/view_footer');
	}

	public function addNewDiscount(){
		$user_id = $this->session->userdata('user_id');
		$data['sui'] = $this->user_model->getSingleUserId($user_id);
		$this->load->view('admin/view_header');
		$this->load->view('admin/view_add_discount',$data);
		$this->load->view('admin/view_footer');
	}

	public function SaveNewDiscount(){
		$this->form_validation->set_rules('social-usr-id', 'User Id', 'required');
		$this->form_validation->set_rules('discount-title', 'Discount Title', 'required');
		$this->form_validation->set_rules('discount-area', 'Discount Area', 'required');
		$this->form_validation->set_rules('discount-on', 'Discount On', 'required');
		$this->form_validation->set_rules('discount-phone', 'Discount Phone', 'required');
		$this->form_validation->set_rules('discount-contact-time', 'Discount Contact Time', 'required');
		$this->form_validation->set_rules('discount-email', 'Discount Email', 'required');
		$this->form_validation->set_rules('discount-web-or-page', 'Discount Website or facebook page', 'required');
		$this->form_validation->set_rules('discount-instruction', 'Instruction', 'required');
		$this->form_validation->set_rules('published', 'Published or Not', 'required');

		if ($this->form_validation->run() == FALSE){
			redirect('admin/addNewDiscount');
		}else{
			$this->discount_model->addNewdiscount();

			redirect('admin/getAllDiscountOfUser');
		}
	}


	public function editDiscount(){
		$discount_id = $this->uri->segment(3);
		if ($discount_id == NULL) {
			redirect('admin/getAllDiscountOfUser');
		}
		$dt = $this->discount_model->editDiscount($discount_id);


		$data['discount_id'] = $discount_id;
		$data['discount_name'] = $dt->discount_name;
		$data['discount_area'] = $dt->discount_area;
		$data['discount_on'] = $dt->discount_on;
		$data['discount_phone'] = $dt->discount_phone;
		$data['discount_contact_time'] = $dt->discount_contact_time;
		$data['discount_email'] = $dt->discount_email;
		$data['discount_website_or_page'] = $dt->discount_website_or_page;
		$data['discount_duration'] = $dt->discount_duration;
		$data['discount_instruction'] = $dt->discount_instruction;
		$data['active_or_not'] = $dt->active;


		$this->load->view('admin/view_header');
		$this->load->view('admin/view_edit_discount',$data);
		$this->load->view('admin/view_footer');
	}

	function updateDiscount() {

		if ($this->input->post('updatediscount')) {
			$discountId = $this->input->post('discount-id');
			$this->discount_model->updateDiscount($discountId);
			redirect('admin/getAllDiscountOfUser');
		} else{
			$id = $this->input->post('discount-id');
			redirect('admin/editDiscount/'. $id);
		}
	}

	/**
	 *
	 */
	function deleteDiscount() {
		$u = $this->uri->segment(3);
		$this->discount_model->deletePost($u);
		redirect('admin/getAllDiscountOfUser');
	}

	/************************************************/
	/*****************Event***********************/
	/************************************************/
	public function getAllEventOfUser(){
		$user_id = $this->session->userdata('user_id');
		$data['events'] = $this->events_model->getAllEventOfUser($user_id);
		$this->load->view('admin/view_header');
		$this->load->view('admin/view_event',$data);
		$this->load->view('admin/view_footer');
	}

	public function addNewEvent(){
		$user_id = $this->session->userdata('user_id');
		$data['sui'] = $this->user_model->getSingleUserId($user_id);
		$this->load->view('admin/view_header');
		$this->load->view('admin/view_add_event',$data);
		$this->load->view('admin/view_footer');
	}

	public function SaveNewEvent(){
		$this->form_validation->set_rules('social-usr-id', 'User Id', 'required');

		$this->form_validation->set_rules('event-title', 'event Title', 'required');
		$this->form_validation->set_rules('event-area', 'event Area', 'required');
/*
		$this->form_validation->set_rules('event-event-phone', 'event Phone', 'required');
		$this->form_validation->set_rules('event-contact-time', 'event Contact /time', 'required');
		$this->form_validation->set_rules('event-email', 'event Email', 'required');
		$this->form_validation->set_rules('event-web-or-page', 'event web-or-page', '');

		$this->form_validation->set_rules('event-time', 'event time', 'required');
		$this->form_validation->set_rules('event-location', 'event location', 'required');

		$this->form_validation->set_rules('event-on', 'event On', 'required');
		$this->form_validation->set_rules('event-date', 'event duration', 'required');

		$this->form_validation->set_rules('published', 'Published or Not', 'required');
*/
		if ($this->form_validation->run() == FALSE){
			redirect('admin/addNewEvent');
		}else{
			$this->events_model->addNewEvent();

			redirect('admin/getAllEventOfUser');
		}
	}


	public function editEvent(){
		$event_id = $this->uri->segment(3);
		if ($event_id == NULL) {
			redirect('admin/getAllEventOfUser');
		}
		$dt = $this->events_model->editEvent($event_id);


		$data['event_id'] = $event_id;
		$data['event_name'] = $dt->events_name;
		$data['event_area'] = $dt->events_area;
		$data['event_on'] = $dt->events_on;

		$data['event_phone'] = $dt->events_phone;
		$data['event_contact_time'] = $dt->events_contact_time;
		$data['event_email'] = $dt->events_email;
		$data['event_website_or_page'] = $dt->events_website_or_page;
		$data['event_on'] = $dt->events_on;

		$data['event_date'] = $dt->events_time;
		$data['active_or_not'] = $dt->events_active;


		$this->load->view('admin/view_header');
		$this->load->view('admin/view_edit_event',$data);
		$this->load->view('admin/view_footer');
	}

	function updateEvent() {

		if ($this->input->post('updateevent')) {
			$eventId = $this->input->post('event-id');
			$this->events_model->updateEvent($eventId);
			redirect('admin/getAllEventOfUser');
		} else{
			$id = $this->input->post('event-id');
			redirect('admin/editEvent/'. $id);
		}
	}
	/*************************************************/
	/******************Doctor*********************/
	/*************************************************/
	function updateDocInfo() {
		if ($this->input->post('updatedoctor')) {
			$doctorId = $this->input->post('doctor-id');

			$this->doctor_model->updateDoctor($doctorId);

			redirect('admin');
		} else{
			redirect('admin');
		}
	}

	/*************************************************/
	/******************Pharmacist*********************/
	/*************************************************/
	function updatePharmaInfo() {
		if ($this->input->post('updatepharma')) {
			$pharmaId = $this->input->post('pharma-id');
			$this->pharmacist_model->updatePharma($pharmaId);
			redirect('admin');
		} else{
			redirect('admin');
		}
	}
	/**
	 *
	 */
	function deleteEvent() {
		$u = $this->uri->segment(3);
		$this->events_model->deleteEvent($u);
		redirect('admin/getAllEventOfUser');
	}


	/**
	 * General Profile of User
	 */
	public function profile(){
		//Get user type from session
		$user_type = $this->session->userdata('user_type');
		$user_id = $this->session->userdata('user_id');

		//var_dump($user_type);
		//var_dump($user_id);
		//If user is Doctor
		if($user_type == 'doctor'){
			$this->data['profiles'] = $this->profile_model->get_single_doctor($user_id, $user_type);


		//If user is Pharmacist
		}elseif($user_type == 'pharmacist'){
			$this->data['profiles'] = $this->profile_model->get_single_pharmacist($user_id, $user_type);

		//If user is health-business
		}elseif($user_type == 'health-business'){
			$this->data['profiles'] = $this->profile_model->get_single_healthcare($user_id, $user_type);

		//If user is health-business
		}elseif($user_type == 'fan'){
			$this->data['profiles'] = $this->profile_model->get_single_fan($user_id, $user_type);
		}

		$this->load->view('admin/view_header');
       	$this->load->view('admin/view_user_profile',$this->data);
        $this->load->view('admin/view_footer');
		//echo json_encode($data['profiles']);
	}


	function discount(){
		$data['discounts'] = $this->discount_model->getDiscountInformation();
		$this->load->view('admin/view_header');
		$this->load->view('admin/view_discount_admin',$data);
		$this->load->view('admin/view_footer');
	}

	function event(){
		$data['events'] = $this->events_model->getEventInformation();
		$this->load->view('admin/view_header');
		$this->load->view('admin/view_event_admin',$data);
		$this->load->view('admin/view_footer');
	}



}

