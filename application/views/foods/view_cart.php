<h2><?= $title ?></h2>
<?php foreach($foods as $key => $food) : ?>
  <h4> <?php echo $fname[$key]; ?> -
  <small><?php echo $rname[$key]; ?> </small>
<?php endforeach; ?>
