<?php

class Food_model extends CI_Model{

  public function __construct(){
    $this->load->database();
  }

  public function add_menu() {
    $data = array(
      'name' => $this->input->post('name'),
      'price' => $this->input->post('price'),
      'user_id' => $this->session->userdata('user_id'),
      'veg' => $this->input->post('veg')
    );
    return $this->db->insert('foods', $data);
  }

  public function add_to_cart($restaurant_id, $people_id, $food_id) {
    $data = array(
      'people_id' => $people_id,
      'food_id' => $food_id,
      'restaurant_id' => $restaurant_id
    );

    return $this->db->insert('cart', $data);
  }

  public function delete_food_from_cart($restaurant_id, $people_id, $food_id) {
    $this->db->where('restaurant_id', $restaurant_id);
    $this->db->where('people_id', $people_id);
    $this->db->where('food_id', $food_id);
    $this->db->limit(1);
    $this->db->delete('cart');
  }

  public function get_cart_foods($user_id) {
    $query = $this->db->where('people_id', $user_id);
    $result = $this->db->get('cart');

    return $result->result_array();
  }

  public function get_email($user_id) {
    $query = $this->db->where('id', $user_id);
    $result = $this->db->get('users');
    if($result->num_rows() == 1){
      return $result->row(0)->email;
    } else {
      return false;
    }
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

  public function get_restaurant_name($restaurant_id) {
    $query = $this->db->where('id', $restaurant_id);
    $result = $this->db->get('users');
    if($result->num_rows() == 1){
      return $result->row(0)->name;
    } else {
      return false;
    }
  }

  public function get_name($user_id) {
    $query = $this->db->where('id', $user_id);
    $result = $this->db->get('users');
    if($result->num_rows() == 1){
      return $result->row(0)->name;
    } else {
      return false;
    }
  }

  public function get_food_name($food_id) {
    $query = $this->db->where('id', $food_id);
    $result = $this->db->get('foods');
    if($result->num_rows() == 1){
      return $result->row(0)->name;
    } else {
      return false;
    }
  }

  public function get_orders($user_id) {
    $query = $this->db->where('restaurant_id', $user_id);
    $result = $this->db->get('orders');

    return $result->result_array();
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
