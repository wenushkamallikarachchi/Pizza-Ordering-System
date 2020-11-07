<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Cart - Pizza Now!!!</title>
    <meta charset="utf-8">

    <!-- Include bootstrap library -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Include custom css -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

    <!-- Include jQuery library -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

    <script>
        // Update item quantity
        function updateCartItem(obj, rowid) {
            $.get("<?php echo site_url('/Cartclass/updatePizzaQty/'); ?>", {
                rowid: rowid,
                qty: obj.value
            }, function (resp) {
                if (resp == 'ok') {
                    location.reload();
                } else {
                    alert('Cart update failed, please try again.');
                }
            });
        }
    </script>
</head>
<body>

<div class="container">
    <h1 style="text-align:center">Pizza CART</h1>
    <div class="row justify-content-center col-md-12 ord-addr-info">
        <div class="cart">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th width="10%"></th>
                            <th width="30%">Pizza Name</th>
                            <th width="15%">Price</th>
                            <th width="13%">Quantity</th>
                            <th width="12%"></th>
                            <th width="20%" class="text-right">Subtotal</th>
                            <th width="12%"></th>
                        </tr>

                        <tbody>

                        <?php

                        if ($cartmodel->total_items() > 0){
                        foreach ($cartItems

                                 as $item){ ?>
                        <tr>

                        <td class="text-right">

                        </td>
                        <td><?php echo $item["name"]; ?></td>
                        <td><?php echo 'Rs' . " " . $item["price"]; ?></td>
                        <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>"
                                   onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                        <td class="text-right">
                            <button class="btn btn-sm"
                                    onclick="return confirm('Are you sure to delete item?')?window.location.href='<?php echo site_url('/Cartclass/deleteItem/' . $item["rowid"]); ?>':false;">
                                <i class="deletepizza"></i></button>

                        </td>
                        <td class="text-right"><?php echo 'Rs' . " " . $item["subtotal"]; ?></td>

                        <td class="text-right">
                            <?php $imageURL = !empty($item["image"]) ? base_url('assets/images/' . $item["image"]) : base_url('assets/images/pro-demo-img.jpeg'); ?>
                            <img src="<?php echo $imageURL; ?>" width="50"/>
                        </td>

                        <?php }
                        }else{ ?>
                        <tr>
                            <td colspan="6"><p>Pizza Now cart is empty.....</p></td>
                            <?php } ?>
                            <?php if ($cartmodel->total_items() > 0){ ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="1"></td>
                                <td><strong>Cart Total</strong></td>
                                <td class="text-right"><strong><?php echo 'Rs' . " " . $cartmodel->total(); ?></strong>
                                </td>
                                <td></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="<?php echo base_url('index.php/PizzaClass'); ?>" class="btn btn-dark">Back
                            to Home</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <?php if ($cartmodel->total_items() > 0) { ?>
                            <a href="<?php echo site_url('CheckoutClass/'); ?>"
                               class="btn btn-outline-info">Checkout</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
