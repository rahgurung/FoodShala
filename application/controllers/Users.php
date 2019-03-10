<?php
  class Users extends CI_Controller{
    // Register
    public function register(){
      $data['title'] =  'Sign Up';

      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

      if($this->form_validation->run() === FALSE){
        $this->load->view('templates/header');
        $this->load->view('users/register', $data);
        $this->load->view('templates/footer');
      } else {
        // Password Encryption
        $encrypt_password = md5($this->input->post('password'));

        $this->user_model->register($encrypt_password);

        redirect('foods');
      }
    }

    // Login
    public function login(){
      $data['title'] =  'Log In';

      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');

      if($this->form_validation->run() === FALSE){
        $this->load->view('templates/header');
        $this->load->view('users/login', $data);
        $this->load->view('templates/footer');
      } else {
        // Logged In
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        // Login user
        $user_id = $this->user_model->login($email, $password);

        if($user_id){
          $user_data = array(
            'user_id' => $user_id,
            'email' => $email,
            'logged_in' => true
          );

          $this->session->set_userdata($user_data);

          redirect('foods');
        } else {


          redirect('foods');

        }
      }
    }

    public function logout(){
      // Unset user data
      $this->session->unset_userdata('logged_in');
      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('email');

      redirect('users/login');
    }

  }
