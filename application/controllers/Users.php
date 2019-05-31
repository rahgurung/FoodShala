<?php
  class Users extends CI_Controller
  {
      /**
       * Register people.
       **/
      public function register()
      {
          $data['title'] = 'Sign Up';

          // Validation of form
          $this->form_validation->set_rules('name', 'Name', 'required');
          $this->form_validation->set_rules('email', 'Email', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');
          $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
          $this->form_validation->set_rules('vegan', 'vegan', 'required');

          if ($this->form_validation->run() === false) {
              $this->load->view('templates/header');
              $this->load->view('users/register', $data);
              $this->load->view('templates/footer');
          } else {
              // Password encryption
              $encrypt_password = md5($this->input->post('password'));

              $this->user_model->register($encrypt_password);

              // Flash message
              $this->session->set_flashdata('user_registered', 'Yeah ! You are now registered.');

              redirect('users/login');
          }
      }

      /**
       * Register restaurant.
       **/
      public function register_restaurant()
      {
          $data['title'] = 'Sign Up - Restaurant';

          // Form validation
          $this->form_validation->set_rules('name', 'Name', 'required');
          $this->form_validation->set_rules('email', 'Email', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');
          $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

          if ($this->form_validation->run() === false) {
              $this->load->view('templates/header');
              $this->load->view('users/register_restaurant', $data);
              $this->load->view('templates/footer');
          } else {
              // Password Encryption
              $encrypt_password = md5($this->input->post('password'));

              $this->user_model->register_restaurant($encrypt_password);

              // Flash Message
              $this->session->set_flashdata('user_registered', 'Yeah ! You are now registered.');

              redirect('users/login');
          }
      }

      /**
       * login functionality ;).
       **/
      public function login()
      {
          $data['title'] = 'Log In';

          $this->form_validation->set_rules('email', 'Email', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');

          if ($this->form_validation->run() === false) {
              $this->load->view('templates/header');
              $this->load->view('users/login', $data);
              $this->load->view('templates/footer');
          } else {
              // Logged In
              $email = $this->input->post('email');
              $password = md5($this->input->post('password'));

              // Getting user_id
              $user_id = $this->user_model->login($email, $password);

              // User type
              $user_type = $this->user_model->get_user_type($user_id);

              // Vegan or not ?
              $user_vegan = $this->user_model->get_user_vegan($user_id);

              // name
              $name = $this->user_model->get_user_name($user_id);

              if ($user_id) {
                  $user_data = [
            'user_id'    => $user_id,
            'email'      => $email,
            'logged_in'  => true,
            'user_type'  => $user_type,
            'user_vegan' => $user_vegan,
            'name'       => $name,
          ];

                  $this->session->set_userdata($user_data);

                  redirect('foods');
              } else {
                  $this->session->set_flashdata('login_failed', 'Email/Password is wrong.');

                  redirect('users/login');
              }
          }
      }

      /**
       * Logout functionality.
       **/
      public function logout()
      {

      // Unset user data
          $this->session->unset_userdata('logged_in');
          $this->session->unset_userdata('user_id');
          $this->session->unset_userdata('email');
          $this->session->unset_userdata('user_type');
          $this->session->unset_userdata('user_vegan');
          $this->session->unset_userdata('name');

          redirect('users/login');
      }
  }
