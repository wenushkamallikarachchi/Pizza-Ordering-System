<?php
include 'header.php';
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Pizza now</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Pizza Menu</h2>
    <!-- Cart view -->
    <div class="cart-view">
        <a href="<?php echo site_url('Cartclass/'); ?>" title="View Cart"><i class="icart"></i>
            (<?php echo ($this->cart->total_items() > 0) ? $this->cart->total_items() . ' Items' : 'Empty'; ?>)</a>
    </div>

    <!-- List all products -->
    <div class="row col-lg-12">
        <?php
        if (!empty($pizzas)) {
            foreach ($pizzas as $row) if ($row['type'] == "pizza") {
                { ?>
                    <div class="card col-lg-3">
                        <img class="card-img-top"
                             src="<?php echo base_url('uploads/product_images/' . $row['image']); ?>"
                             alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Price: <?php echo 'Rs' . " " . $row["price"]; ?></h6>
                            <p class="card-text"><?php echo $row["description"]; ?></p>

                            <a href="<?php echo site_url('PizzaClass/addToCart/' . $row['id']); ?>"
                               class="btn btn-primary">Add
                                to Cart</a>
                        </div>
                    </div>
                <?php }
            }

        } else { ?>
            <p>Product(s) not found...</p>
        <?php } ?>
    </div>
    <h3>Appetizer</h3><br>
    <div class="row col-lg-12">

        <?php
        if (!empty($pizzas)) {
            foreach ($pizzas as $row) if ($row['type'] == "appetizer") {
                { ?>
                    <div class="card col-lg-3">
                        <img class="card-img-top"
                             src="<?php echo base_url('uploads/product_images/' . $row['image']); ?>"
                             alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Price: <?php echo 'Rs' . " " . $row["price"]; ?></h6>
                            <p class="card-text"><?php echo $row["description"]; ?></p>

                            <a href="<?php echo site_url('PizzaClass/addToCart/' . $row['id']); ?>"
                               class="btn btn-primary">Add
                                to Cart</a>
                        </div>
                    </div>
                <?php }
            }

        } else { ?>
            <p>Product(s) not found...</p>
        <?php } ?>
    </div>
</div>
</body>
</html>
