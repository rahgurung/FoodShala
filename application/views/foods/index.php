<h2><?= $title ?></h2>
<?php foreach($foods as $key => $food) : ?>
	<?php
		if($food['image'] !==null ) {
			// please! config size and position of this one!
			echo "<img alt=\"{$food['name']}\" src=\"{$food['image']}\"/>";
		}
	?>
  <h4 style="padding-top:15px;"> <?php echo $food['name']; ?> -
  <small><?php echo $food['price']; ?> </small>
	- <?php echo $rnames[$key]; ?>
  <a class="btn btn-dark food-page" role="button" href="/foods/order_food/<?php echo $food['id']  ?>"> Order </a>
  <a class="btn btn-success food-page" role="button" href="/foods/add_to_cart/<?php echo $food['id']  ?>"> Add to Cart </a>
 </h4>
  <br><hr>
<?php endforeach; ?>
