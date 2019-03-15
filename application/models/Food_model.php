<?php

class Food_model extends CI_Model{

  public function __construct(){
    $this->load->database();
  }

  public function add_menu() {
    $data = array(
      'name' => $this->input->post('name'),
      'price' => $this->input->post('price'),
      'user_id' => $this->session->userdata('user_id')
    );
    return $this->db->insert('foods', $data);
  }

  public function get_foods(){
	   $query = $this->db->get('foods');
		 return $query->result_array();
	}

  public function get_restaurant_id($food_id) {
    $query = $this->db->where('id', $food_id);
    $result = $this->db->get('foods');
    if($result->num_rows() == 1){
      return $result->row(0)->user_id;
    } else {
      return false;
    }
  }

  public function order_food($restaurant_id, $people_id, $food_id) {
    $data = array(
      'people_id' => $people_id,
      'restaurant_id' => $restaurant_id,
      'food_id' => $food_id
    );

    return $this->db->insert('orders', $data);
  }
}
