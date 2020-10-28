<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Checkout - CodeIgniter Shopping Cart by CodexWorld</title>
    <meta charset="utf-8">

    <!-- Include bootstrap library -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Include custom css -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

</head>
<body>
<div class="container">
    <h1>CHECKOUT</h1>
    <div class="col-12">
        <div class="checkout">
            <div class="row">
                <?php if (!empty($fail_message)) { ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger"><?php echo $fail_message; ?></div>
                    </div>
                <?php } ?>

                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your Cart</span>
                        <span class="badge badge-secondary badge-pill"><?php echo $this->cart->total_items(); ?></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php
                        if ($this->cart->total_items() > 0) {
                            foreach ($this->cart->contents() as $item) { ?>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <?php $imageURL = !empty($item["image"]) ? base_url('uploads/product_images/' . $item["image"]) : base_url('assets/images/pro-demo-img.jpeg'); ?>
                                        <img src="<?php echo $imageURL; ?>" width="75"/>
                                        <h6 class="my-0"><?php echo $item["name"]; ?></h6>

                                        <small class="text-muted"><?php echo 'Rs' . " " . $item["price"]; ?>
                                            (<?php echo $item["qty"]; ?>)</small>
                                        <h6 class="my-0"><?php echo "Type" . ":" . $item["type"]; ?></h6>
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
                            <strong><?php echo 'Rs' . " " . $this->cart->total(); ?></strong>
                        </li>
                    </ul>
                    <a href="<?php echo site_url('PizzaClass/'); ?>" class="btn btn-block btn-info">Add Items</a>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Contact Details</h4>
                    <?php echo form_open('CheckoutClass'); ?>
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name"
                               value="<?php echo !empty($userData['name']) ? $userData['name'] : ''; ?>"
                               placeholder="Enter name" required>

                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email"
                               value="<?php echo !empty($userData['email']) ? $userData['email'] : ''; ?>"
                               placeholder="Enter email" required>
                        <?php echo form_error('email', '<p class="help-block error">', '</p>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone"
                               value="<?php echo !empty($userData['phone']) ? $userData['phone'] : ''; ?>"
                               placeholder="Enter contact no" required>
                        <?php echo form_error('phone', '<p class="help-block error">', '</p>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address"
                               value="<?php echo !empty($userData['address']) ? $userData['address'] : ''; ?>"
                               placeholder="Enter address" required>
                    </div>
                    <input class="btn btn-success btn-lg btn-block" type="submit" name="placeOrder"
                           value="Place Order">
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
