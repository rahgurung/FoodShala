<div class="jumbotron">
  <h2 class="display-4"> Welcome to <span style="font-family: 'Cookie', cursive; font-size:80px;">FoodShala</span> <br> Meals That Matter. ;)</h2>
  <?php if (!$this->session->userdata('logged_in')) : ?>
  <div class= "home_page">
    <a class="btn btn-primary btn-block btn-lg" href="/users/register" role="button">Register</a>
    <a class="btn btn-success btn-block btn-lg" href="/users/login" role="button">Login</a>
  </div>
  <?php endif; ?>
</div>
