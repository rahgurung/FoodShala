<?php

class Food_model extends CI_Model
{
    /**
     * Constructer to load database.
     **/
    public function __construct()
    {
        $this->load->database();
    }

    /**
     * Add menu feature for restaurants :).
     **/
    public function add_menu()
    {
        $data = [
      'name'    => $this->input->post('name'),
      'price'   => $this->input->post('price'),
      'user_id' => $this->session->userdata('user_id'),
      'veg'     => $this->input->post('veg'),
    ];

        if ($_FILES['image']['name'] !== null) {
            // create a slug from user name
            $slug = url_title($this->session->userdata('name'), 'dash', true);
            // create a hashed time
            $time = substr(md5(time()), 1, 8);
            // get file extension
            $fileext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            // slug by name, time hashed and extension
            $filename = "{$slug}-{$time}.{$fileext}";

            $config = [
        'upload_path'   => './assets/img/uploads/',
        'allowed_types' => 'gif|jpg|png',
        'max_sizes'     => '100',
        'max_width'     => '1024',
        'max_height'    => '768',
        'file_name'     => $filename,
      ];
            $this->load->library('upload', $config);

            // if uploaded, then send the path to database
            if ($this->upload->do_upload('image')) {
                // getting the errors
                // $this->upload->display_errors()
                $data['image'] = "{$config['upload_path']}{$filename}";
            }
        }

        return $this->db->insert('foods', $data);
    }

    /**
     * Add to cart for users.
     **/
    public function add_to_cart($restaurant_id, $people_id, $food_id)
    {
        $data = [
      'people_id'     => $people_id,
      'food_id'       => $food_id,
      'restaurant_id' => $restaurant_id,
    ];

        return $this->db->insert('cart', $data);
    }

    /**
     * Delete a food from cart after ordering through it.
     **/
    public function delete_food_from_cart($restaurant_id, $people_id, $food_id)
    {
        $this->db->where('restaurant_id', $restaurant_id);
        $this->db->where('people_id', $people_id);
        $this->db->where('food_id', $food_id);
        $this->db->limit(1);
        $this->db->delete('cart');
    }

    /**
     * See the cart for users.
     **/
    public function get_cart_foods($user_id)
    {
        $query = $this->db->where('people_id', $user_id);
        $result = $this->db->get('cart');

        return $result->result_array();
    }

    /**
     * Extracting emails.
     **/
    public function get_email($user_id)
    {
        $query = $this->db->where('id', $user_id);
        $result = $this->db->get('users');
        if ($result->num_rows() == 1) {
            return $result->row(0)->email;
        } else {
            return false;
        }
    }

    /**
     * Extracting all foods.
     **/
    public function get_foods()
    {
        $query = $this->db->get('foods');

        return $query->result_array();
    }

    /**
     * Extracting restaurant_id.
     **/
    public function get_restaurant_id($food_id)
    {
        $query = $this->db->where('id', $food_id);
        $result = $this->db->get('foods');
        if ($result->num_rows() == 1) {
            return $result->row(0)->user_id;
        } else {
            return false;
        }
    }

    /**
     * Extracting restaurant name.
     **/
    public function get_restaurant_name($restaurant_id)
    {
        $query = $this->db->where('id', $restaurant_id);
        $result = $this->db->get('users');
        if ($result->num_rows() == 1) {
            return $result->row(0)->name;
        } else {
            return false;
        }
    }

    /**
     * Extracting name.
     **/
    public function get_name($user_id)
    {
        $query = $this->db->where('id', $user_id);
        $result = $this->db->get('users');
        if ($result->num_rows() == 1) {
            return $result->row(0)->name;
        } else {
            return false;
        }
    }

    /**
     * Extracting name.
     **/
    public function get_food_name($food_id)
    {
        $query = $this->db->where('id', $food_id);
        $result = $this->db->get('foods');
        if ($result->num_rows() == 1) {
            return $result->row(0)->name;
        } else {
            return false;
        }
    }

    /**
     * See all orders for restaurants.
     **/
    public function get_orders($user_id)
    {
        $query = $this->db->where('restaurant_id', $user_id);
        $result = $this->db->get('orders');

        return $result->result_array();
    }

    /**
     * Order food functionality for users.
     **/
    public function order_food($restaurant_id, $people_id, $food_id)
    {
        $data = [
      'people_id'     => $people_id,
      'restaurant_id' => $restaurant_id,
      'food_id'       => $food_id,
    ];

        return $this->db->insert('orders', $data);
    }
}
