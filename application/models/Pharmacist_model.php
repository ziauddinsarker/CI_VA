<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pharmacist_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getPharmacist(){
        $this->db->select('*');
        $this->db->from('pharmacist');
        $query = $this->db->get();
        return $query->result();
    }

    function get_pharmacist($pharmacist_id){
        $this->db->select('*');
        $this->db->from('pharmacist');
        $this->db->where('pharmacist_id', $pharmacist_id);
        $query = $this->db->get();
        return $query->first_row('array');
    }


    /**
     * @param $social_uid
     * @return mixed
     */
    function getSinglePharmacistInfo($social_uid){
        $this->db->select('*');
        $this->db->from('pharmacist');
        $this->db->join('user_pharma','user_pharma.pharmacist_id = pharmacist.pharmacist_id');
        $this->db->join('social_users','user_pharma.user_id = social_users.social_login_id');
        $this->db->where('hybridauth_provider_uid',$social_uid);
        $query = $this->db->get();
        return $query->result();
    }

    function updatePharma($id)
    {
        $pharma_name = $this->input->post('pharma-name');
        $pharma_email = $this->input->post('pharma-email');
        $pharma_title = $this->input->post('pharma-title');
        $pharma_address = $this->input->post('pharma-address');
        $pharma_other_address = $this->input->post('pharma-other-address');
        $pharma_phone = $this->input->post('pharma-phone');
        $pharma_reg_no = $this->input->post('pharma-reg-no');
        $pharma_gender = $this->input->post('pharma-gender');

        $data = array(
            'pharmacist_name' => $pharma_name,
            'pharmacist_email' => $pharma_email,
            'pharmacist_title' =>  $pharma_title,
            'pharmacist_contact' => $pharma_address,
            'pharmacist_other_contact' => $pharma_other_address,
            'pharmacist_phone' => $pharma_phone,
            'pharmacist_reg_no' => $pharma_reg_no,
            'pharmacist_gender' => $pharma_gender,
        );
        $this->db->where('pharmacist_id', $id);
        $this->db->update('pharmacist', $data);
    }


}