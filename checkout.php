<?php
$page_title="Checkout";
require_once('layout/header.php');
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
                                <h1>checkout</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">checkout</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-space pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Checkout Login Coupon Accordion Start -->
                        <div class="checkoutaccordion" id="checkOutAccordion">
                            <div class="card">
                                <h3>Have A Coupon? <span data-toggle="collapse" data-target="#couponaccordion">Click
                                            Here To Enter Your Code</span></h3>
                                <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                                    <div class="card-body">
                                        <div class="cart-update-option">
                                            <div class="apply-coupon-wrapper">
                                                <form action="#" method="post" class=" d-block d-md-flex">
                                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                                    <button class="btn btn__bg">Apply Coupon</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Checkout Login Coupon Accordion End -->
                    </div>
                </div>
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h2>Billing Details</h2>
                            <div class="billing-form-wrap">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="f_name" class="required">First Name</label>
                                                <input type="text" id="f_name" placeholder="First Name" required />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="l_name" class="required">Last Name</label>
                                                <input type="text" id="l_name" placeholder="Last Name" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="email" class="required">Email Address</label>
                                        <input type="email" id="email" placeholder="Email Address" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="com-name">Company Name</label>
                                        <input type="text" id="com-name" placeholder="Company Name" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="country" class="required">Country</label>
                                        <select name="country nice-select" id="country">
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="India">India</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="England">England</option>
                                            <option value="London">London</option>
                                            <option value="London">London</option>
                                            <option value="China">China</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Syria">Syria</option>
                                        </select>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="street-address" class="required mt-20">Street address</label>
                                        <input type="text" id="street-address" placeholder="Street address Line 1" required />
                                    </div>

                                    <div class="single-input-item">
                                        <input type="text" placeholder="Street address Line 2 (Optional)" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="town" class="required">Town / City</label>
                                        <input type="text" id="town" placeholder="Town / City" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="state">State / Divition</label>
                                        <input type="text" id="state" placeholder="State / Divition" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="postcode" class="required">Postcode / ZIP</label>
                                        <input type="text" id="postcode" placeholder="Postcode / ZIP" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" placeholder="Phone" />
                                    </div>

                                    <div class="checkout-box-wrap">
                                        <div class="single-input-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="create_pwd">
                                                <label class="custom-control-label" for="create_pwd">Create an
                                                    account?</label>
                                            </div>
                                        </div>
                                        <div class="account-create single-form-row">
                                            <p>Create an account by entering the information below. If you are a
                                                returning customer please login at the top of the page.</p>
                                            <div class="single-input-item">
                                                <label for="pwd" class="required">Account Password</label>
                                                <input type="password" id="pwd" placeholder="Account Password" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="checkout-box-wrap">
                                        <div class="single-input-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ship_to_different">
                                                <label class="custom-control-label" for="ship_to_different">Ship to a
                                                    different address?</label>
                                            </div>
                                        </div>
                                        <div class="ship-to-different single-form-row">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="single-input-item">
                                                        <label for="f_name_2" class="required">First Name</label>
                                                        <input type="text" id="f_name_2" placeholder="First Name" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="single-input-item">
                                                        <label for="l_name_2" class="required">Last Name</label>
                                                        <input type="text" id="l_name_2" placeholder="Last Name" required />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="single-input-item">
                                                <label for="email_2" class="required">Email Address</label>
                                                <input type="email" id="email_2" placeholder="Email Address" required />
                                            </div>

                                            <div class="single-input-item">
                                                <label for="com-name_2">Company Name</label>
                                                <input type="text" id="com-name_2" placeholder="Company Name" />
                                            </div>

                                            <div class="single-input-item">
                                                <label for="country_2" class="required">Country</label>
                                                <select name="country" id="country_2">
                                            		<option value="Afghanistan">Afghanistan</option>
                                            		<option value="Albania">Albania</option>
                                            		<option value="Algeria">Algeria</option>
                                            		<option value="Armenia">Armenia</option>
                                            		<option value="Bangladesh">Bangladesh</option>
                                            		<option value="India">India</option>
                                           			<option value="Pakistan">Pakistan</option>
                                            		<option value="England">England</option>
                                            		<option value="London">London</option>
                                            		<option value="London">London</option>
                                            		<option value="China">China</option>
                                            		<option value="Russia">Russia</option>
                                            		<option value="Syria">Syria</option>
                                                </select>
                                            </div>

                                            <div class="single-input-item">
                                                <label for="street-address_2" class="required mt-20">Street address</label>
                                                <input type="text" id="street-address_2" placeholder="Street address Line 1" required />
                                            </div>

                                            <div class="single-input-item">
                                                <input type="text" placeholder="Street address Line 2 (Optional)" />
                                            </div>

                                            <div class="single-input-item">
                                                <label for="town_2" class="required">Town / City</label>
                                                <input type="text" id="town_2" placeholder="Town / City" required />
                                            </div>

                                            <div class="single-input-item">
                                                <label for="state_2">State / Divition</label>
                                                <input type="text" id="state_2" placeholder="State / Divition" />
                                            </div>

                                            <div class="single-input-item">
                                                <label for="postcode_2" class="required">Postcode / ZIP</label>
                                                <input type="text" id="postcode_2" placeholder="Postcode / ZIP" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="ordernote">Order Note</label>
                                        <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h2>Your Order Summary</h2>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><strong>Products</strong></th>
                                                <th><strong>Total</strong></th>
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
                                                <td><a href="product-details.html"><?php echo $cart['code'];?> <strong> × <?php echo $cart['quality'];?></strong></a>
                                                </td>
                                                <td>$<?php echo round($cart['quality']*$cart['price'],2);?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td>$<?php echo round($total,2);?></td>
                                            </tr>
                                            <tr>
                                                <td>VAT</td>
                                                <td class="d-flex justify-content-center">$<?php echo round($total*0.2,2);?></td>
                                            </tr>
                                            <tr>
                                                <td>Total Amount</td>
                                                <td>$<?php echo round($total+$total*0.2,2);?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="directbank" name="paymentmethod" value="bank" class="custom-control-input" />
                                                <label class="custom-control-label" for="directbank">Direct Bank
                                                    Transfer</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="bank">
                                            <p>Make your payment directly into our bank account. Please use your Order
                                                ID as the payment reference. Your order will not be shipped until the
                                                funds have cleared in our account..</p>
                                        </div>
                                    </div>
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="checkpayment" name="paymentmethod" value="check" class="custom-control-input" />
                                                <label class="custom-control-label" for="checkpayment">Pay with
                                                    Check</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="check">
                                            <p>Please send a check to Store Name, Store Street, Store Town, Store State
                                                / County, Store Postcode.</p>
                                        </div>
                                    </div>
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="paypalpayment" name="paymentmethod" value="paypal" class="custom-control-input" />
                                                <label class="custom-control-label" for="paypalpayment">
                                                    Paypal 
                                                    <p>
                                                    <div id="smart-button-container" style="padding:10px;">
                                                        <div style="text-align: center;">
                                                            <div id="paypal-button-container"></div>
                                                        </div>
                                                    </div>
                                                    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD" data-sdk-integration-source="button-factory"></script>
                                                    <script>
                                                        function initPayPalButton() {
                                                        paypal.Buttons({
                                                            style: {
                                                            shape: 'rect',
                                                            color: 'gold',
                                                            layout: 'vertical',
                                                            label: 'paypal',
                                                            
                                                            },

                                                            createOrder: function(data, actions) {
                                                            return actions.order.create({
                                                                purchase_units: [{"amount":{"currency_code":"USD","value":1}}]
                                                            });
                                                            },

                                                            onApprove: function(data, actions) {
                                                            return actions.order.capture().then(function(details) {
                                                                alert('Transaction completed by ' + details.payer.name.given_name + '!');
                                                            });
                                                            },

                                                            onError: function(err) {
                                                            console.log(err);
                                                            }
                                                        }).render('#paypal-button-container');
                                                        }
                                                        initPayPalButton();
                                                    </script>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="paypal">
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                PayPal account.</p>
                                        </div>
                                    </div>
                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-20">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">I have read and agree to
                                                the website <a href="index.php">terms and conditions.</a></label>
                                        </div>
                                        <?php if($total&&$bill_no==$_SESSION['user']['order_count']){?>
                                        <button type="submit" class="btn btn__bg" onclick="orderCart(<?php echo round($total+$total*0.2,2);?>);">Place Order</button>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>
    <!-- main wrapper end -->
    
<?php
require_once('layout/footer.php');
?>