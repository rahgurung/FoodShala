<?php

class Foods extends CI_Controller
{
    /**
     * Main foods page which containes all
     * all available foods.
     **/
    public function index()
    {
        $data['title'] = 'All Foods Available';
        $data['foods'] = $this->food_model->get_foods();

        // Extracting name of restaurants for corresponding foods
        $data['rnames'] = [];
        for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
            $name = $this->food_model->get_name($data['foods'][$x]['user_id']);
            array_push($data['rnames'], $name);
        }

        $this->load->view('templates/header');
        $this->load->view('foods/index', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Add a new food as a restaurant.
     **/
    public function add_menu()
    {
        $data['title'] = 'Add Menu';
        // Backend validation to check only restaurant should access add menu section.
        if ($this->session->userdata('user_type') != null) {
            if ($this->session->userdata('user_type') == 0) {

        // Form validation
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('price', 'Price', 'required');

                if ($this->form_validation->run() === false) {
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
            redirect('users/login');
        }
    }

    /**
     * Order food as a user.
     **/
    public function add_to_cart($food_id)
    {

    // Validation to check only users should add food to cart.
        if ($this->session->userdata('user_type') != null) {
            if ($this->session->userdata('user_type') == 1) {
                $people_id = $this->session->userdata('user_id');

                $restaurant_id = $this->food_model->get_restaurant_id($food_id);

                $this->food_model->add_to_cart($restaurant_id, $people_id, $food_id);

                // Flash message
                $this->session->set_flashdata('added_to_cart', 'Your food is added to cart.');

                redirect('foods');
            } else {
                print_r('Sorry a restaurant can\'t add food to cart. :(');
            }
        } else {
            redirect('users/login');
        }
    }

    /**
     * Order food from cart.
     **/
    public function order_cart($food_id)
    {

    // Validation to check only users should order food from cart.
        if ($this->session->userdata('user_type') != null) {
            if ($this->session->userdata('user_type') == 1) {
                $restaurant_id = $this->food_model->get_restaurant_id($food_id);

                $people_id = $this->session->userdata('user_id');

                $this->food_model->order_food($restaurant_id, $people_id, $food_id);

                $this->food_model->delete_food_from_cart($restaurant_id, $people_id, $food_id);

                // Flash message
                $this->session->set_flashdata('food_ordered', 'Your food is ordered.');

                redirect('foods');
            } else {
                print_r('Sorry a restaurant can\'t order food. :(');
            }
        } else {
            redirect('users/login');
        }
    }

    /**
     * Order food as a user.
     **/
    public function order_food($food_id)
    {

    // Validation to check only users should order food.
        if ($this->session->userdata('user_type') != null) {
            if ($this->session->userdata('user_type') == 1) {
                $restaurant_id = $this->food_model->get_restaurant_id($food_id);

                $people_id = $this->session->userdata('user_id');

                $this->food_model->order_food($restaurant_id, $people_id, $food_id);

                // Flash message
                $this->session->set_flashdata('food_ordered', 'Your food is ordered.');

                redirect('foods');
            } else {
                print_r('Sorry a restaurant can\'t order food. :(');
            }
        } else {
            redirect('users/login');
        }
    }

    /**
     * View cart for users.
     **/
    public function view_cart()
    {
        $data['title'] = 'Cart';
        // Validation to check only users should view cart.
        if ($this->session->userdata('user_type') != null) {
            if ($this->session->userdata('user_type') == 1) {
                $user_id = $this->session->userdata('user_id');

                $data['foods'] = $this->food_model->get_cart_foods($user_id);

                // Extracting name of foods
                $data['fname'] = [];
                for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
                    $name = $this->food_model->get_food_name($data['foods'][$x]['food_id']);
                    array_push($data['fname'], $name);
                }

                // Extracting name of restaurants
                $data['rname'] = [];
                for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
                    $name = $this->food_model->get_restaurant_name($data['foods'][$x]['restaurant_id']);
                    array_push($data['rname'], $name);
                }

                $this->load->view('templates/header');
                $this->load->view('foods/view_cart', $data);
                $this->load->view('templates/footer');
            } else {
                print_r('Sorry, a user cannot view orders, :(');
            }
        } else {
            redirect('users/login');
        }
    }

    /**
     * View orders for restaurants.
     **/
    public function view_orders()
    {
        $data['title'] = 'Orders';
        // Backend validation to check only restaurant should access view_orders section.
        if ($this->session->userdata('user_type') != null) {
            if ($this->session->userdata('user_type') == 0) {
                $user_id = $this->session->userdata('user_id');

                $data['orders'] = $this->food_model->get_orders($user_id);

                // Extracting name of users who ordered
                $data['uname'] = [];
                for ($x = 0; $x <= count($data['orders']) - 1; $x++) {
                    $name = $this->food_model->get_name($data['orders'][$x]['people_id']);
                    array_push($data['uname'], $name);
                }

                // Extracting email of user who ordered
                $data['email'] = [];
                for ($x = 0; $x <= count($data['orders']) - 1; $x++) {
                    $name = $this->food_model->get_email($data['orders'][$x]['people_id']);
                    array_push($data['email'], $name);
                }

                $this->load->view('templates/header');
                $this->load->view('foods/view_orders', $data);
                $this->load->view('templates/footer');
            } else {
                print_r('Sorry a user cannot view orders, :(');
            }
        } else {
            redirect('users/login');
        }
    }
}
