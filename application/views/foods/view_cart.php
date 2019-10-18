<h2><?= $title ?></h2>
<?php foreach ($foods as $key => $food) : ?>
  <h4> <?php echo $fname[$key]; ?> -
  <small><?php echo $rname[$key]; ?> </small>
  <a class="btn btn-dark fs-food-page" role="button" href="/foods/order_cart/<?php echo $food['food_id']  ?>"> Order </a>
  <br><hr>
</h4>
<?php endforeach; ?>
