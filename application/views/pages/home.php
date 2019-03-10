
<h2> Welcome to FoodShala: Meals That Matter </h2>
<?php if(!$this->session->userdata('logged_in')) : ?>
<a class="btn btn-primary" href="/users/register" role="button">Register</a><br>
<a class="btn btn-success" href="/users/login" role="button">Login</a>
<?php endif; ?>
