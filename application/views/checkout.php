<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Checkout - Pizza Now!!!</title>
    <meta charset="utf-8">

    <!-- Include bootstrap library -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Include custom css -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

</head>
<body>
<div class="container">
    <h1 style="text-align:center">CHECKOUT</h1>
    <div class="col-12">
        <div class="checkout">
            <div class="row col-lg-12 ord-addr-info" >
                <?php if (!empty($fail_message)) { ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger"><?php echo $fail_message; ?></div>
                    </div>
                <?php } ?>

                <div class="col-md-4 order-md-2 mb-4">
                    <h3 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your Cart</span>
                        <span class="badge badge-pill badge-success"><?php echo $cartModel->total_items(); ?></span>
                    </h3>
                    <ul class="list-group mb-3">
                        <?php
                        if ($this->cart->total_items() > 0) {
                            foreach ($cartItems as $item) { ?>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <?php $imageURL = !empty($item["image"]) ? base_url('assets/images/' . $item["image"]) : base_url('assets/images/pro-demo-img.jpeg'); ?>
                                        <img src="<?php echo $imageURL; ?>" width="75"/>
                                        <h6 class="my-0"><?php echo $item["name"]; ?></h6>

                                        <small class="text-muted "><?php echo 'Rs :' . " " . $item["price"]; ?>
                                            (<?php echo $item["qty"]; ?>)</small>
              <h6 class="my-0">Type<?php echo  ":"." " . $item["type"]; ?></h6></u>
                                    </div>
                                    <span class="text-muted"><?php echo 'Rs' . " " . $item["subtotal"]; ?></span>
                                </li>
                            <?php }
                        } else { ?>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <p>No items in your cart...</p>
                            </li>
                        <?php } ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (Rs) :</span>
                            <strong><?php echo 'Rs' . " " . $cartModel->total(); ?></strong>
                        </li>
                    </ul>
                    <a href="<?php echo site_url('PizzaClass/'); ?>" class="btn text-center btn-info">Add Items</a>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Fill the Contact form </h4>
                    <?php echo form_open('CheckoutClass/'); ?>
                    <div class="mb-3">
                       <h4><label for="name">Name</label></h4>
                        <input type="text" class="form-control " name="name"
                               value="<?php echo !empty($userData['name']) ? $userData['name'] : ''; ?>"
                               placeholder="Enter your name" required>

                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email"
                               value="<?php echo !empty($userData['email']) ? $userData['email'] : ''; ?>"
                               placeholder="Enter your email" required>
                        <small id="passwordHelpInline" class="text-muted">
                            Must be Unique Email.
                        </small>
                        <?php echo form_error('email', '<p class="help-block error">', '</p>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone"
                               value="<?php echo !empty($userData['phone']) ? $userData['phone'] : ''; ?>"
                               placeholder="Enter your phone number" required>
                        <small id="passwordHelpInline" class="text-muted">
                            Must be Unique Phone Number.
                        </small>
                        <?php echo form_error('phone', '<p class="help-block error">', '</p>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address"
                               value="<?php echo !empty($userData['address']) ? $userData['address'] : ''; ?>"
                               placeholder="Enter your address" required>
                    </div>
                    <input class="btn btn-outline-success" type="submit" name="placeOrder"
                           value="Place your Order">
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
