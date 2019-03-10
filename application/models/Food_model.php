<?php

class Food_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }

  public function get_foods($slug = FALSE){
	   if($slug === FALSE){
			 $query = $this->db->get('foods');
			 return $query->result_array();
		 }
		 $query = $this->db->get_where('posts', array('slug' => $slug));
		 return $query->row_array();
	}
}
