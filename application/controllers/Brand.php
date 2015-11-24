<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
		$this->load->database(); // load database	
        $this->load->model('brand_model');
    }

    public function edit_brand()
    {
        $brand_id = $this->uri->segment(3);
        if ($brand_id == NULL) {
            redirect('admin/medicine');
        }

        $dt = $this->brand_model->edit_brand($brand_id);
        //var_dump($brand_id);
        //var_dump($dt);

        $data['brand_name'] = $dt->brand_name;
        $data['brand_generic'] = $dt->brand_generic;
        $data['brand_manufacturer'] = $dt->brand_manufacturer;
        $data['brand_use'] = $dt->brand_use;

        $this->load->view('admin/view_header');
        $this->load->view('admin/view_edit_medicine',$data);
        $this->load->view('admin/view_footer');


    }



    function deletepost($post_id)//delete post page
    {
        $this->blog_model->delete_post($post_id);
        redirect(base_url());
    }
	
}