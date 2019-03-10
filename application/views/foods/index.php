<h2><?= $title ?></h2>
<?php foreach($foods as $food) : ?>
  <h3> <?php echo $food['name']; ?> -
  <small><?php echo $food['price']; ?> </small>
  <a class="btn btn-success" role="button" href="/order"> Order </a> </h3><br>
<?php endforeach; ?>
