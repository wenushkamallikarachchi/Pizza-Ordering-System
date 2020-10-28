<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Cart - CodeIgniter Shopping Cart by CodexWorld</title>
    <meta charset="utf-8">

    <!-- Include bootstrap library -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Include custom css -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

    <!-- Include jQuery library -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

    <script>
        // Update item quantity
        function updateCartItem(obj, rowid){
            $.get("<?php echo site_url('Cartclass/updatePizzaQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
                if(resp == 'ok'){
                    location.reload();
                }else{
                    alert('Cart update failed, please try again.');
                }
            });
        }
    </script>
</head>
<body>

<div class="container">
    <h1>SHOPPING CART</h1>
    <div class="row">
        <div class="cart">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>

                            <th width="10%"></th>
                            <th width="30%">Pizza Name</th>
                            <th width="15%">Price</th>
                            <th width="13%">Quantity</th>
                            <th width="20%" class="text-right">Subtotal</th>
                            <th width="12%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        if($this->cart->total_items() > 0){ foreach($this->cart->contents() as $item){	?>
                            <tr>
                                <td>
                                    <?php $imageURL = !empty($item["image"])?base_url('uploads/product_images/'.$item["image"]):base_url('assets/images/pro-demo-img.jpeg'); ?>
                                    <img src="<?php echo $imageURL; ?>" width="50"/>
                                </td>
                                <td><?php echo $item["name"]; ?></td>
                                <td><?php echo 'Rs'." ".$item["price"]; ?></td>
                                <td><input  class="form-control text-center" value="<?php echo $item["qty"]; ?>"></td>
                                <td class="text-right"><?php echo 'Rs'." ".$item["subtotal"]; ?></td>
                        <?php } }else{ ?>
                        <tr><td colspan="6"><p>Your cart is empty.....</p></td>
                            <?php } ?>
                            <?php if($this->cart->total_items() > 0){ ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Cart Total</strong></td>
                                <td class="text-right"><strong><?php echo 'Rs'." ".$this->cart->total(); ?></strong></td>
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
                        <a href="<?php echo base_url('index.php/PizzaClass'); ?>" class="btn btn-block btn-light">Continue Shopping</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <?php if($this->cart->total_items() > 0){ ?>
                            <a href="<?php echo site_url('Homepage/checkout'); ?>" class="btn btn-lg btn-block btn-primary">Checkout</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
