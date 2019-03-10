<?php
  class User_model extends CI_Model{
    public function register($encrypt_password) {
      // User data in form of array
      $data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'password' => $encrypt_password,
        'type' => true
      );

      //Insert User
      return $this->db->insert('users', $data);
    }

    public function login($email, $password){
      $this->db->where('email', $email);
      $this->db->where('password', $password);
      $result = $this->db->get('users');
      if($result->num_rows() == 1){
        return $result->row(0)->id;
      } else {
        return false;
      }
    }
  }
