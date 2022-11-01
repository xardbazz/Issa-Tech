<?php
$page_title="Cart";
require_once('layout/header.php');
if(!isset($_SESSION['user']['id']))echo "<script>location.href='login-register.php';</script>";
$bill_no=$_SESSION['user']['order_count'];
if(isset($_REQUEST['a']))$bill_no=$_REQUEST['a'];
?>
    <!-- main wrapper start -->
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area common-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <h1>cart</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-space pb-0">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Thumbnail</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Price</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <th class="pro-subtotal">Total</th>
                                            <th class="pro-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $carts=mysqli_query($con,"select a.*,b.code,b.image from orders a left join products b on a.product_id=b.id where a.user_id=".$_SESSION['user']['id']." and a.order_count=".$bill_no);
                                            $tax=10;$vat=20;$total=0;
                                            while($cart=mysqli_fetch_array($carts)){
                                                $total+=$cart['quality']*$cart['price'];
                                        ?>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="javascript:;"><img class="img-fluid" src="assets/img/product/<?php echo $cart['image'];?>" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="javascript:;"><?php echo $cart['code'];?></a></td>
                                            <td class="pro-price"><span>$<?php echo $cart['price'];?></span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty"><input type="text" id="p_<?php echo $cart['id'];?>" value="<?php echo $cart['quality'];?>"></div>
                                            </td>
                                            <td class="pro-subtotal"><span>$<?php echo round($cart['price']*$cart['quality'],2);?></span></td>
                                            <td class="pro-remove"><a href="javascript:;" onclick="removeCart(<?php echo $cart['id'];?>);"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->
                            <div class="cart-update-option d-block d-md-flex justify-content-between">
                                <div class="apply-coupon-wrapper">
                                    <form action="#" method="post" class=" d-block d-md-flex">
                                        <input type="text" placeholder="Enter Your Coupon Code" required />
                                        <button class="btn btn__bg btn__sqr">Apply Coupon</button>
                                    </form>
                                </div>
                                <div class="cart-update">
                                    <a href="#" class="btn btn__bg">Update Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h3>Cart Totals</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td>$<?php echo round($total,2);?></td>
                                            </tr>
                                            <tr>
                                                <td>VAT</td>
                                                <td>$<?php echo round($total*0.2,2);?></td>
                                            </tr>
                                            <tr class="total">
                                                <td>Total</td>
                                                <td class="total-amount">$<?php echo round($total+$total*0.2,2);?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <a href="checkout.php?a=<?php echo $bill_no;?>" class="btn btn__bg d-block">Proceed To Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>
    <!-- main wrapper end -->

<?php
require_once('layout/footer.php');
?>
<script>
$( document ).ready(function(){
    $('.qtybtn').on('click',function(){
        var form_data = new FormData();
        form_data.append('id', $(this).parent().find('input').prop('id').replace('p_',''));
        form_data.append('qty', $(this).parent().find('input').val());
        $.ajax({
            url: 'ajax/updateCart.php',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            dataType: "json",
            success: function (response) {
            if(response.res=='login')location.href='login-register.php';
            else window.location.reload(true);
            },
            error: function (response) {
            }
        });
    });    
});    
</script>
</script>