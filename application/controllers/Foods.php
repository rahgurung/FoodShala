<?php

class Foods extends CI_Controller {
  public function index(){
    $data['title'] = 'Foods Available';

    $data['foods'] = $this->food_model->get_foods();

    $this->load->view('templates/header');
    $this->load->view('foods/index', $data);
    $this->load->view('templates/footer');
  }
}
