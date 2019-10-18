<h2><?= $title ?></h2>
<div class="row">
	<?php foreach ($foods as $key => $food) : ?>
	<div class="col-12 col-sm-6 col-md-4">
		<div class="card mb-4">
			<?php
                if ($food['image'] !== null) {
                    // please! config size and position of this one!
                    echo "<img class=\"card-img-top\" src=\"{$food['image']}\" alt=\"{$food['name']}\">";
                }
            ?>
			<div class="card-body p-3">
				<h4 class="card-title" style="padding-top:15px;"> <?php echo $food['name']; ?> </h4>
				<span ><?php echo $food['price']; ?> </span> -
				<span class="font-weight-bold"><?php echo $rnames[$key]; ?> </span>
				<hr>
				<a class="btn btn-dark fs-food-page" role="button" href="/foods/order_food/<?php echo $food['id']  ?>"> Order </a>
				<a class="btn btn-success fs-food-page" role="button" href="/foods/add_to_cart/<?php echo $food['id']  ?>"> Add to Cart </a>
			</div>
    </div>
	</div>
	<?php endforeach; ?>
</div>
