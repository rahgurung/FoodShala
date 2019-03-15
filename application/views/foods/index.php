<h2><?= $title ?></h2>
<?php foreach($foods as $food) : ?>
  <h3> <?php echo $food['name']; ?> -
  <small><?php echo $food['price']; ?> </small>
  <a class="btn btn-dark" role="button" href="/foods/order_food/<?php echo $food['id']  ?>"> Order </a> </h3><br>
<?php endforeach; ?>
