<div class="jumbotron">
  <h2 class="display-4 text-center"> Welcome to <span style="font-family: 'Cookie', cursive; font-size:80px;">FoodShala</span> <br> Meals That Matter. ;)</h2>
  <?php if (!$this->session->userdata('logged_in')) : ?>
  <div class= "home_page">
    <button class="btn btn-primary home-button" href="/users/register" role="button">Register</button>
    <button class="btn btn-success home-button" href="/users/login" role="button">Login</button>
  </div>
  <?php endif; ?>
</div>
