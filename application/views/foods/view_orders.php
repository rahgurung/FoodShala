<h2><?= $title ?></h2>
<?php foreach ($orders as $key => $order) : ?>
  <h4> <?php echo $uname[$key]; ?> -
  <small><?php echo $email[$key]; ?> </small>
  <br><hr>
</h4>
<?php endforeach; ?>
