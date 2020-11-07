<?php
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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

    <img class="rounded float-left"
         src="<?php echo base_url('uploads/product_images/logo.jpg'); ?>" style="height:50px;width: 50px"
         alt="">
    <a class="navbar-brand" style="margin-left: 20px;" href="#">Pizza Now</a>
    <div class=" navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto ">
            <li class="nav-item">
                <a class="nav-link" href="#pizza">Pizza</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#appetizer">Appetizer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#special">Special Deals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#section2">Contact</a>
            </li>
            <div class="cart-view">
                <a href="<?php echo site_url('Cartclass/'); ?>" title="View Cart"><i class="icart"></i>
                    (<?php echo ($this->cart->total_items() > 0) ? $this->cart->total_items() . ' Items' : 'Empty'; ?>)</a>
            </div>
        </ul>
    </div>
</nav>
<div class="container">
    <!-- List all products -->
    <section id="pizza">
        <h3>Pizza</h3><br>
        <div class="row col-md-12">
            <?php
            if (!empty($pizzas)) {
                foreach ($pizzas as $row) if ($row['type'] == "pizza") {
                    { ?>
                        <div class="card col-lg-3">
                            <img class="card-img-top"
                                 src="<?php echo base_url('uploads/product_images/' . $row['image']); ?>"
                                 alt="">
                            <div class="card-body" style="background-color: #1b1e21">
                                <h5 class="card-title" style="color: white"><?php echo $row["name"]; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted " style="color: white">
                                    Price: <?php echo 'Rs' . " " . $row["price"]; ?></h6>
                                <p class="card-text" style="color: white"><?php echo $row["description"]; ?></p>

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
    </section>

<section id="appetizer">
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
</section>
    <section id="special">
        <h3>Special Deals</h3><br>
        <div class="row col-lg-12">

            <?php
            if (!empty($pizzas)) {
                foreach ($pizzas as $row) if ($row['type'] == "special") {
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
    </section>
</div>
<footer class="bg-dark" style="background-color: #0b2e13;height: 280px">
    <div class="container py-10">
        <div class="row py-4">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
               <img src="<?php echo base_url('uploads/product_images/logo.jpg'); ?>"
                alt="" width="180" class="mb-3">

            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                <h6 class="font-weight-bold mb-4">Shop</h6>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a href="#" class="text-muted">For Women</a></li>
                    <li class="mb-2"><a href="#" class="text-muted">For Men</a></li>
                    <li class="mb-2"><a href="#" class="text-muted">Stores</a></li>
                    <li class="mb-2"><a href="#" class="text-muted">Our Blog</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 mb-lg-0">
                <h6 class="text-uppercase font-weight-bold mb-4">Newsletter</h6>
                <p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At itaque temporibus.</p>
            </div>
        </div>
    </div>
</footer>
<!-- End -->
</body>

</html>
