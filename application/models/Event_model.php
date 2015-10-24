<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Event_model extends CI_Model{
	
	public function __construct()
	{
		//Load the Database module
		$this->load->database();
        $this->load->helper('url');
	}
	
	//GEta All events 
	function getEvents(){
	  $this->db->select("events_id,events_name,events_time,events_address,events_phone,events_contact_time,events_email,username");
	  $this->db->from('events');
	  $this->db->join('users','events.events_author = users.user_id');
	  $query = $this->db->get();
	  return $query->result();
	}
	
	
	
	 function insert_event($data)
    {
        $this->db->insert('events',$data);
        return $this->db->insert_id();
    }
	
	

}