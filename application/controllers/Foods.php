<?php

class Foods extends CI_Controller {
  public function index(){
    $data['title'] = 'All Foods Available';

    $data['foods'] = $this->food_model->get_foods();

    $this->load->view('templates/header');
    $this->load->view('foods/index', $data);
    $this->load->view('templates/footer');
  }


  // Add menu
  public function add_menu() {
    $data['title'] = 'Add Menu';
    if($this->session->userdata('user_type') != null) {
      if($this->session->userdata('user_type') == 0) {

        // Validation
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if($this->form_validation->run() === FALSE){
          $this->load->view('templates/header');
          $this->load->view('foods/add_menu', $data);
          $this->load->view('templates/footer');
        } else {
          $this->food_model->add_menu();

          redirect('foods');
        }

      } else {
        print_r('Sorry a user cannot add food, :(');
      }
    } else {
      print_r('please log in, :)');
    }
  }

  public function order_food($food_id) {
    //user validation

    $restaurant_id = $this->food_model->get_restaurant_id($food_id);

    $people_id = $this->session->userdata('user_id');

    $this->food_model->order_food($restaurant_id,$people_id,$food_id);
  }
}
