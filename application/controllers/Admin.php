<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();      
		
		$this->load->database(); // load database	
		$this->load->model('brand_model');
		$this->load->model('shop_model');
		$this->load->model('doctor_model');
		$this->load->model('user_model');
		$this->load->model('blog_model');
		$this->load->model('discount_model');

		$this->load->model('event_model');

		$this->load->model('events_model');
		$this->load->model('profile_model');
		$this->load->library('HybridAuthLib');
    }

	public function index()
	{
		if((Hybrid_Auth::getConnectedProviders())){
			$this->load->view('admin/view_header');
			$this->load->view('admin/view_admin');
			$this->load->view('admin/view_footer');
		}else{
			redirect(base_url('login'));
		}

	}
	
	public function medicine()
	{ 		
		$data['medicines'] = $this->brand_model->get_shop_based_on_thana_and_brand();
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
		$this->form_validation->set_rules('discount-duration', 'Discount duration', 'required');
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
		$data['discount_duration'] = $dt->discount_duration;
		$data['active_or_not'] = $dt->active;


		$this->load->view('admin/view_header');
		$this->load->view('admin/view_edit_discount',$data);
		$this->load->view('admin/view_footer');
	}

	function updateDiscount() {

		if ($this->input->post('updatediscount')) {
			$discountId = $this->input->post('discount-id');
			$this->discount_model->updatePost($discountId);
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
		$this->form_validation->set_rules('event-on', 'event On', 'required');
		$this->form_validation->set_rules('event-date', 'event duration', 'required');
		$this->form_validation->set_rules('published', 'Published or Not', 'required');

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
		$data['event_date'] = $dt->events_time;
		$data['active_or_not'] = $dt->events_active;


		$this->load->view('admin/view_header');
		$this->load->view('admin/view_edit_event',$data);
		$this->load->view('admin/view_footer');
	}

	function updateEvent() {

		if ($this->input->post('updateevent')) {
			$discountId = $this->input->post('discount-id');
			$this->discount_model->updatePost($discountId);
			redirect('admin/getAllDiscountOfUser');
		} else{
			$id = $this->input->post('discount-id');
			redirect('admin/editDiscount/'. $id);
		}
	}

	/**
	 *
	 */
	function deleteEvent() {
		$u = $this->uri->segment(3);
		$this->discount_model->deletePost($u);
		redirect('admin/getAllDiscountOfUser');
	}

















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
			$data['profiles'] = $this->profile_model->get_single_pharmacist();

		//If user is health-business
		}elseif($user_type == 'health-business'){
			$data['profiles'] = $this->profile_model->get_single_healthcare();
		}

		$this->load->view('admin/view_header');
       	$this->load->view('admin/view_user_profile',$this->data);
        $this->load->view('admin/view_footer');
		//echo json_encode($data['profiles']);
	}

	
}