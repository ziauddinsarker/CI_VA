<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discount_model extends CI_Model
{

    /**
     * @param $social_uid
     * @return mixed
     */
    function getAllDiscountOfUser($social_uid)
    {
        $this->db->select('discount_id,discount_name,discount_area, discount_on,discount_duration');
        $this->db->from('discount');
        $this->db->join('social_users', 'social_users.social_login_id = discount.social_user_id');
        $this->db->where('hybridauth_provider_uid', $social_uid);
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Add Post
     */
    function addNewDiscount()
    {
        $social_user_id = $this->input->post('social-usr-id');
        $discount_title = $this->input->post('discount-title');
        $discount_area = $this->input->post('discount-area');
        $discount_on = $this->input->post('discount-on');
        $discount_duration = $this->input->post('discount-duration');
        $discount_phone = $this->input->post('discount-phone');
        $discount_contact_time = $this->input->post('discount-contact-time');
        $discount_email = $this->input->post('discount-email');
        $discount_web_or_page = $this->input->post('discount-web-or-page');
        $discount_instruction = $this->input->post('discount-instruction');
        $publish = $this->input->post('published');

        $data = array(
            'social_user_id' => $social_user_id,
            'discount_name' => $discount_title,
            'discount_area' => $discount_area,
            'discount_on' => $discount_on,
            'discount_duration' => $discount_duration,
            'discount_phone' => $discount_phone,
            'discount_contact_time' => $discount_contact_time,
            'discount_email' => $discount_email,
            'discount_website_or_page' => $discount_web_or_page,
            'discount_instruction' => $discount_instruction,
            'active' => $publish
        );

        $this->db->insert('discount', $data);
    }

    function getAllPosts()
    {
        $this->db->select();
        $this->db->from('posts');
        $query = $this->db->get();
        return $query->result();
    }

    function editDiscount($discount_id)
    {
        $data = $this->db->get_where('discount', array('discount_id' => $discount_id))->row();
        return $data;
    }

    function updateDiscount($id)
    {
        $discount_title = $this->input->post('discount-title');
        $discount_area = $this->input->post('discount-area');
        $discount_on = $this->input->post('discount-on');
        $discount_phone = $this->input->post('discount-phone');
        $discount_contact_time = $this->input->post('discount-contact-time');
        $discount_email = $this->input->post('discount-email');
        $discount_web_or_page = $this->input->post('discount-web-or-page');
        $discount_duration = $this->input->post('discount-duration');
        $publish = $this->input->post('published');

        $data = array(
            'discount_name' => $discount_title,
            'discount_area' => $discount_area,
            'discount_on' => $discount_on,
            'discount_duration' => $discount_duration,
            'discount_phone' => $discount_phone,
            'discount_contact_time' => $discount_contact_time,
            'discount_email' => $discount_email,
            'discount_website_or_page' => $discount_web_or_page,

            'active' => $publish
        );
        $this->db->where('discount_id', $id);
        $this->db->update('discount', $data);
    }

    function deletePost($discount_id)
    {
        $this->db->delete('discount', array('discount_id' => $discount_id));
        return;
    }
}
?>