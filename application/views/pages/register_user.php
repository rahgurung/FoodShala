<form action="users/actionRegister" method="post">
  <div class="form-group">
    <label>Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label>Email address</label>
    <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input name="password" type="password" class="form-control" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
  <a class="btn btn-success" href="/register_restaurant" role="button" > Sell Food With Us </a>
</form>
