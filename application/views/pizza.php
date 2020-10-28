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
        <a href="<?php echo site_url('Homepage/cart'); ?>" title="View Cart"><i class="icart"></i>
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
    <!---->
    <!--    <h4 style="margin-right: 50%">Customize your size</h4>-->
    <!--    <div class="col-md-8 order-md-1">-->
    <!---->
    <!--        --><?php //echo form_open('Custompizza/'); ?>
    <!---->
    <!--        <div class="card row-lg-3">-->
    <!--            <div class="card-body">-->
    <!--                <h4>Select your pizza size</h4>-->
    <!--                <div class="custom-radio">-->
    <!--                    <label class="radio-inline"><input type="radio" value="personal" name="size">Personal</label>-->
    <!--                    --><?php //echo form_error('size', '<p class="help-block error">', '</p>'); ?>
    <!--                </div>-->
    <!--                <div class="custom-radio">-->
    <!--                    <label class="radio-inline"><input type="radio" value="medium" name="size">Meduim</label>-->
    <!--                </div>-->
    <!--                <div class="custom-radio">-->
    <!--                    <label class="radio-inline"><input type="radio" value="large" name="size">Large</label>-->
    <!--                </div>-->
    <!--                <br>-->
    <!--                <h4>Select your pizza crust</h4>-->
    <!--                <div class="checkbox">-->
    <!--                    <label class="radio-inline"><input type="radio" value="Plain Crust" name="crust">Plain Crust</label>-->
    <!--                </div>-->
    <!--                <div class="checkbox">-->
    <!--                    <label class="radio-inline"><input type="radio" value="Spicy Crust" name="crust">Spicy Crust</label>-->
    <!--                </div>-->
    <!--                <div class="checkbox disabled">-->
    <!--                    <label class="radio-inline"><input type="radio" value="Special Crust" name="crust">House Special-->
    <!--                        Crust</label>-->
    <!--                </div>-->
    <!---->
    <!--                <h4>Select your pizza meat</h4>-->
    <!--                <div class="checkbox">-->
    <!--                    <label class="radio-inline"><input type="radio" value="Pepperoni" name="meat">Pepperoni</label>-->
    <!--                </div>-->
    <!--                <div class="checkbox">-->
    <!--                    <label class="radio-inline"><input type="radio" value="Chicken" name="meat">Chicken</label>-->
    <!--                </div>-->
    <!--                <div class="checkbox disabled">-->
    <!--                    <label class="radio-inline"><input type="radio" value="Pork" name="meat">Pork</label>-->
    <!--                </div>-->
    <!--                <input class="btn btn-success btn-md " type="submit" name="addtocart"-->
    <!--                       value="Add to cart">-->
    <!--            </div>-->
    <!--        </div>-->
    <!---->
    <!--        --><?php //echo form_close(); ?>
    <!--        </form>-->

</div>
</body>
</html>
