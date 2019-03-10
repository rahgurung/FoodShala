<?php echo form_open('users/login'); ?>
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <h2 class="text-center"> <?= $title; ?> </h2>
  <div class="form-group">
    <label>Email address</label>
    <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input name="password" type="password" class="form-control" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary btn-block">Submit</button>
</div>
</div>
<?php echo form_close(); ?>
