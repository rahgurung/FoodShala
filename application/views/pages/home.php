<div class="jumbotron">
  <h2 class="display-4 text-center"> Welcome to <span class="fs-home-logo">FoodShala</span> <br> Meals That Matter.</h2>
  <?php if (!$this->session->userdata('logged_in')) : ?>
  <div class= "fs-home-main-buttons">
    <button class="btn btn-primary fs-home-main-button" href="/users/register" role="button">Register</button>
    <button class="btn btn-success fs-home-main-button" href="/users/login" role="button">Login</button>
  </div>
  <?php endif; ?>
</div>
