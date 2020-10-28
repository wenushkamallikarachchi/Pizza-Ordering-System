<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Order Status - CodeIgniter Shopping Cart by CodexWorld</title>
    <meta charset="utf-8">

    <!-- Include bootstrap library -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Include custom css -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

</head>
<body>
<div class="container">
    <h1>ORDER STATUS</h1>
    <div class="col-12">
        <?php
        if (!empty($order)) { ?>
            <div class="col-md-12">
                <div class="alert alert-success">Your order has been placed successfully.</div>
            </div>

            <div class="row col-lg-12 ord-addr-info">
                <div class="hdr">Order Info</div>
                <p><b>Reference ID:</b> #<?php echo $order['id']; ?></p>
                <p><b>Total:</b> <?php echo 'Rs' . $order['grand_total']; ?></p>
                <p><b>Placed On:</b> <?php echo $order['created']; ?></p>
                <p><b>Buyer Name:</b> <?php echo $order['name']; ?></p>
                <p><b>Email:</b> <?php echo $order['email']; ?></p>
                <p><b>Phone:</b> <?php echo $order['phone']; ?></p>
                <p><b>Delivery Time:</b>
                        <?php
                        date_default_timezone_set("Asia/Colombo");
                        echo "Now time is " . date("h:i:s a", strtotime("now")) . "\n";
                        echo "So,we will deliver at " . date("Y/m/d h:i:s a", strtotime("+30 minutes"));

                        ?></p>
            </div>

            <!-- Order items -->
            <div class="row col-lg-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Pizza Name</th>
                        <th>Price</th>
                        <th>QTY</th>
                        <th>Sub Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($order['items'])) {
                        foreach ($order['items'] as $item) {
                            ?>
                            <tr>
                                <td>
                                    <?php $imageURL = !empty($item["image"]) ? base_url('uploads/product_images/' . $item["image"]) : base_url('assets/images/pro-demo-img.jpeg'); ?>
                                    <img src="<?php echo $imageURL; ?>" width="75"/>
                                </td>
                                <td><?php echo $item["name"]; ?></td>
                                <td><?php echo 'Rs'." " . $item["price"]; ?></td>
                                <td><?php echo $item["quantity"]; ?></td>
                                <td><?php echo 'Rs'." " . $item["sub_total"]; ?></td>
                            </tr>
                        <?php }
                    } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="col-md-12">
                <div class="alert alert-danger">Your order submission failed.</div>
            </div>
        <?php } ?>
    </div>
    <div class="col mb-2">
        <div class="row">
            <div class="col-sm-12  col-md-12">
                <a href="<?php echo site_url('PizzaClass'); ?>" class="btn btn-block btn-primary">Back to Home</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
