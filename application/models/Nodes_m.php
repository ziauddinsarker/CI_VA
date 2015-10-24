<?php

class Nodes_m extends CI_Model {
    private $table = "doctors";
 
  function get_node_list() {
    $this->db->select('doctor_name,doctor_email');
    $this->db->order_by('doctor_name','DESC');
    $this->db->limit(30,0);
    $query = $this->db->get($this->table);
 
    return $query->result();
  }
 
  function get_node_by_type($type) {
    $this->db->select('doctor_name,doctor_email');
    $this->db->where('doctor_name',$type,'=');
    $this->db->order_by('doctor_name','DESC');
    $query = $this->db->get($this->table);
 
    return $query->result();
  }
}