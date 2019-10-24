<html>
  <head>
    <title> FoodShala: Meals That Matter </title>
    
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Imported stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    <!-- Imported Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Imported Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-custom">
      <span class="navbar-brand fs-header-title" >FoodShala</span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="<?php echo base_url(); ?>foods">Foods</a>
          <a class="nav-item nav-link" href="<?php echo base_url(); ?>about">About</a>

          <?php if ($this->session->userdata('user_type') != null) : ?>
            <?php if ($this->session->userdata('user_type') == 0) : ?>
              <a class="btn btn-info" style="margin-right:10px;" href="<?php echo base_url(); ?>foods/add_menu">Add Menu Items</a>
            <?php endif; ?>
          <?php endif; ?>
          <?php if ($this->session->userdata('user_type') != null) : ?>
            <?php if ($this->session->userdata('user_type') == 0) : ?>
              <a class="btn btn-warning" href="<?php echo base_url(); ?>foods/view_orders">View Orders</a>
            <?php endif; ?>
          <?php endif; ?>
          <?php if ($this->session->userdata('user_type') != null) : ?>
            <?php if ($this->session->userdata('user_type') == 1) : ?>
              <a class="btn btn-info" href="<?php echo base_url(); ?>foods/view_cart">View Cart</a>
            <?php endif; ?>
          <?php endif; ?>

        </div>
      </div>
      <div class="collapse navbar-collapse justify-content-end">
        <div class="navbar-nav">
          <?php if ($this->session->userdata('logged_in')) : ?>
            <a class="btn btn-danger" href="<?php echo base_url(); ?>users/logout">Logout ( <?php echo ucwords($this->session->userdata('name')); ?> )</a>
          <?php endif; ?>
        </div>
      </div>
    </nav>

    <div class="container">
      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
      <?php endif; ?>

      <?php if ($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
      <?php endif; ?>

      <?php if ($this->session->flashdata('food_ordered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('food_ordered').'</p>'; ?>
      <?php endif; ?>

      <?php if ($this->session->flashdata('added_to_cart')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('added_to_cart').'</p>'; ?>
      <?php endif; ?>
