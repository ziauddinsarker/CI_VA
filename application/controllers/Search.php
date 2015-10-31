<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		$this->load->model('search_model');
		$config['uri_protocol']	= 'PATH_INFO';
		parse_str($_SERVER['QUERY_STRING'], $_GET);
	}

	public function get_brand_form_strength(){
		$keyword = $this->input->post('keyword');
		$data = $this->search_model->search_brand_form_strength($keyword);
		echo json_encode($data);
	}

		public function get_brand(){
			$data = $this->search_model->get();
			echo json_encode($data);
	}

}
