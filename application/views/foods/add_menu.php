<?php echo validation_errors(); ?>

<?php echo form_open_multipart('foods/add_menu'); ?>
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <h2 class="text-center"> <?= $title; ?> </h2>
  <div class="form-group">
    <label>Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter name of food.">
  </div>
  <div class="form-group">
  <label>Food Type</label>
  <select class="form-control" name="veg">
    <option value="1">Veg</option>
    <option value="0">Non- Veg</option>
  </select>
  </div>
  <div class="form-group">
    <label>Price</label>
    <input name="price" type="number" class="form-control" placeholder="Enter price.">
  </div>
  <div class="form-group">
    <label>Image</label>
    <input type="file" name="image" />
  </div>
  <button type="submit" class="btn btn-primary btn-block">Add</button>
</div>
</div>
<?php echo form_close(); ?>
