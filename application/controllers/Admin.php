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
		var_dump($dt);

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