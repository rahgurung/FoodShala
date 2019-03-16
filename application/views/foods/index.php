<h2><?= $title ?></h2>
<?php foreach($foods as $key => $food) : ?>
  <h4> <?php echo $food['name']; ?> -
  <small><?php echo $food['price']; ?> </small>
  - <?php echo $rnames[$key]; ?>
  <a class="btn btn-dark" role="button" href="/foods/order_food/<?php echo $food['id']  ?>"> Order </a>
  <a class="btn btn-success" role="button" href="/foods/add_to_cart/<?php echo $food['id']  ?>"> Add to Cart </a>
 </h4>
  <br>
<?php endforeach; ?>
