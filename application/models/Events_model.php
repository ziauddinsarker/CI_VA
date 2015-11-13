<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events_model extends CI_Model
{

    /**
     * @param $social_uid
     * @return mixed
     */
    function getAllEventOfUser($social_uid)
    {
        $this->db->select('events_id,events_name,events_area, events_date,events_on');
        $this->db->from('events');
        $this->db->join('social_users', 'social_users.social_login_id = `events`.social_user_id');
        $this->db->where('hybridauth_provider_uid', $social_uid);
        $query = $this->db->get();
        return $query->result();
    }

    //GEta All events
    function getEvents(){
        $this->db->select("events_id,events_name,events_time,events_date,events_location,events_phone,events_contact_time,events_email");
        $this->db->from('events');
        $query = $this->db->get();
        return $query->result();
    }



    function insert_event($data)
    {
        $this->db->insert('events',$data);
        return $this->db->insert_id();
    }


    /**
     * Add Post
     */
    function addNewEvent()
    {
        $social_user_id = $this->input->post('social-usr-id');
        $event_title = $this->input->post('event-title');
        $event_area = $this->input->post('event-area');

        $event_phone = $this->input->post('event-phone');
        $event_contact_time = $this->input->post('event-contact-time');
        $event_email = $this->input->post('event-email');
        $event_web_or_page = $this->input->post('event-web-or-page');
        $event_time = $this->input->post('event-time');
        $event_location = $this->input->post('event-location');


        $event_on = $this->input->post('event-on');
        $event_date = $this->input->post('event-date');
        $publish = $this->input->post('published');

        $data = array(
            'social_user_id' => $social_user_id,
            'events_name' => $event_title,
            'events_area' => $event_area,
            'events_phone' => $event_phone,
            'events_contact_time' => $event_contact_time,
            'events_email' => $event_email,
            'events_website_or_page' => $event_web_or_page,
            'events_time' => $event_time,
            'events_location' => $event_location,
            'events_on' => $event_on,
            'events_date' => $event_date,
            'events_active' => $publish
        );
        $this->db->insert('events', $data);
    }

    function getAllEvents()
    {
        $this->db->select();
        $this->db->from('posts');
        $query = $this->db->get();
        return $query->result();
    }

    function editEvent($event_id)
    {
        $data = $this->db->get_where('events', array('events_id' => $event_id))->row();
        return $data;
    }

    function updateEvent($id)
    {
        $event_title = $this->input->post('event-title');
        $event_area = $this->input->post('event-area');
        $event_on = $this->input->post('event-on');
        $event_date = $this->input->post('event-date');
        $event_phone = $this->input->post('event-phone');
        $event_contact_time = $this->input->post('event-contact-time');
        $event_email = $this->input->post('event-email');
        $event_web_or_page = $this->input->post('event-web-or-page');
        $event_time = $this->input->post('event-time');
        $event_location = $this->input->post('event-location');


        $publish = $this->input->post('published');

        $data = array(
            'events_name' => $event_title,
            'events_area' => $event_area,
            'events_on' => $event_on,

            'events_phone' => $event_phone,
            'events_contact_time' => $event_contact_time,
            'events_email' => $event_email,
            'events_website_or_page' => $event_web_or_page,
            'events_time' => $event_time,
            'events_location' => $event_location,
            'events_date' => $event_date,


            'events_active' => $publish
        );
        $this->db->where('events_id', $id);
        $this->db->update('events', $data);
    }

    function deleteEvent($events_id)
    {
        $this->db->delete('events', array('events_id' => $events_id));
        return;
    }
}
?>