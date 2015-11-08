<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
		$this->load->database(); // load database	
        $this->load->model('blog_model');
    }

    function index($start = 0)//index page
    {
        $data['posts'] = $this->blog_model->get_posts(5, $start);
        
        //pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url().'blog/index/';//url to set pagination
        $config['total_rows'] = $this->blog_model->get_post_count();
        $config['per_page'] = 5; 
        $this->pagination->initialize($config); 
        $data['pages'] = $this->pagination->create_links(); //Links of pages
        
        $class_name = array(
            'home_class'=>'current', 
            'login_class' => '', 
            'register_class' => '',
            'upload_class'=>'',
            'contact_class'=>'');
        $this->load->view('header',$class_name);
        $this->load->view('v_home',$data);
        $this->load->view('footer');
    }

    function post($post_id = NULL )//single post page
    {   
		
        $this->load->model('model_comment');
        $data['comments'] = $this->model_comment->get_comment($post_id);    
        $data['post'] = $this->blog_model->get_post($post_id);
        
        $this->load->view('template/view_blank_header');
        $this->load->view('view_single_post',$data);
        $this->load->view('template/view_blank_footer');
    }
    
    function new_post()//Creating new post page
    {
        if($this->input->post())
        {
            $data = array(
                'post_title' => $this->input->post('post_title'),
                'post' => $this->input->post('post'),
                'active' => 1,
				'post_category' => 1
            );
            $this->blog_model->insert_post($data);
            redirect(base_url());
        }
        else{
           
            $this->load->view('template/view_header');
            $this->load->view('view_new_post');
            $this->load->view('template/view_footer');
        }
    }
    function editpost($post_id)//Edit post page
    {
        if(!$this->check_permissions('author'))//when the user is not an andmin and author
        {
            redirect(base_url().'users/login');
        }
        $data['success'] = 0;
        
        if($this->input->post())
        {
            $data = array(
                'post_title' => $this->input->post('post_title'),
                'post' => $this->input->post('post'),
                'active' => 1
            );
            $this->m_db->update_post($post_id, $data);
            $data['success'] = 1;
        }
        $data['post'] = $this->m_db->get_post($post_id);
        
        $class_name = array(
            'home_class'=>'current', 
            'login_class' =>'', 
            'register_class' => '',
            'upload_class'=>'',
            'contact_class'=>'');
        $this->load->view('header',$class_name);
        $this->load->view('v_edit_post',$data);
        $this->load->view('footer');
    }
    function deletepost($post_id)//delete post page
    {
        if(!$this->check_permissions('author'))//when the user is not an andmin and author
        {
            redirect(base_url().'users/login');
        }
        $this->blog_model->delete_post($post_id);
        redirect(base_url());
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