<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
/*

    function get_single_doctor(){
        $user_id = $this->session->userdata('user_id');
        $user_type = $this->session->userdata('user_type');
        //var_dump($user_type,$user_id);
        print_r($user_type,$user_id);
        $this->db->select('doctors.doctor_name,doctors.doctor_title,doctors.doctor_gender,username,user_id,users.email');
        $this->db->from('doctors');
        $this->db->join('users','doctors.doctor_user_name = users.user_id');
        $this->db->where('users.user_id',$user_id);
        $this->db->where('users.user_type',$user_type);
        $query = $this->db->get();
        return $query->result();
    }*/

    function get_single_doctor($user_id, $user_type){
        $this->db->select('*');
        $this->db->from('doctors');
        $this->db->join('user_doc','user_doc.doctor_id = doctors.doctor_id');
        $this->db->join('social_users','user_doc.user_id = social_users.social_login_id');
        $this->db->where('social_users.hybridauth_provider_uid',$user_id);
        $this->db->where('social_users.social_login_user_type',$user_type);
        $query = $this->db->get();
        return $query->result();
    }




    function get_post($post_id)
    {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where(array('active'=>1,'post_id'=>$post_id));
        $this->db->order_by('date_added','desc');
        $query = $this->db->get();
        return $query->first_row('array');
    }
	
	
    function insert_post($data)
    {
        $this->db->insert('posts',$data);
        return $this->db->insert_id();
    }
    
    function update_post($post_id, $data)
    {
        $this->db->where('post_id',$post_id);
        $this->db->update('posts',$data);
    }
    
    function delete_post($post_id)
    {
        $this->db->where('post_id',$post_id);
        $this->db->delete('posts');
    }
	
}

?>