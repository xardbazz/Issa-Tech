<?php
require_once('layout/header.php');
session_start();
$id=isset($_REQUEST['a'])?$_REQUEST['a']:0;
if(isset($_REQUEST['review'])&&$_REQUEST['review']!=''){
    mysqli_query($con,"insert into reviews (id,user_id,product_id,rate,comment,created_at) values('','".$_SESSION['user']['id']."','{$id}','".$_REQUEST['rating']."','".$_REQUEST['review']."','".date("Y-m-d H:i:s")."')");
    echo "<script>location.href='product-details.php?a={$id}';</script>";
}
$product=mysqli_fetch_array(mysqli_query($con,"select * from products where id={$id}"));
$page_title="Issa Tech - {$product['code']}";
$reviews=mysqli_query($con,"select * from reviews a left join users b on a.user_id=b.id where a.product_id={$id}");
$reviews_count=mysqli_num_rows($reviews);
$reviews_avg=0;
if($reviews_count)$reviews_avg=mysqli_fetch_array(mysqli_query($con,"select avg(rate) as rate from reviews where product_id={$id}"))[0];
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
                                <h1>product details</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">product details</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-space">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product-large-slider">
                                        <div class="pro-large-img img-zoom">
                                            <img src="assets/img/product/<?php echo $product['image'];?>" alt="product-details" />
                                        </div>
                                        <div class="pro-large-img img-zoom">
                                            <img src="assets/img/product/<?php echo $product['detail_image'];?>" alt="product-details" />
                                        </div>
                                    </div>
                                    <div class="pro-nav slick-row-10 slick-arrow-style">
                                        <div class="pro-nav-thumb">
                                            <img src="assets/img/product/<?php echo $product['image'];?>" alt="product-details" />
                                        </div>
                                        <div class="pro-nav-thumb">
                                            <img src="assets/img/product/<?php echo $product['detail_image'];?>" alt="product-details" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des">
                                        <h3 class="product-name"><?php echo $product['name'];?></h3>
                                        <?php if($reviews_count){?>
                                        <div class="ratings d-flex">
                                            <?php for($i=0;$i<5;$i++){
                                                if($i>=$reviews_avg)echo "<span><i class=\"lnr lnr-star\"></i></span>";
                                                else echo "<span class=\"good\"><i class=\"fa fa-star\"></i></span>";
                                            }?>
                                            <div class="pro-review">
                                                <span><?php echo $reviews_count;?> Reviews</span>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <div class="price-box">
                                        <?php
                                            if($product['discount_percentage']>0){
                                                echo "<span class=\"price-regular\">$".round($product['price']*(100-$product['discount_percentage'])/100,2)."</span>";
                                                echo "<span class=\"price-old\"><del>$".round($product['price'],2)."</del></span>";
                                            }else
                                                echo "<span class=\"price-regular\">$".round($product['price'],2)."</span>";
                                        ?>
                                        </div>
                                        <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                                        <div class="product-countdown" data-countdown="2020/07/25"></div>
                                        <div class="availability">
                                            <i class="fa fa-check-circle"></i>
                                            <span><?php echo $product['instock'];?> in stock</span>
                                        </div>
                                        <p class="pro-desc"><?php echo $product['description'];?></p>
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h5>qty:</h5>
                                            <div class="quantity">
                                                <div class="pro-qty"><input type="text" name="quality" id="quality" value="1"></div>
                                            </div>
                                            <div class="action_link">
                                                <a class="btn btn-cart2" href="javascript:;" onclick="addCart(<?php echo $product['id'];?>,$('#quality').val());">Add to cart</a>
                                            </div>
                                        </div>
                                        <div class="like-icon">
                                            <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                            <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                            <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                            <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-space pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-toggle="tab" href="#tab_one">description</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#tab_three">reviews (<?php echo $reviews_count;?>)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">
                                                    <p><?php echo $product['description'];?></p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_three">
                                                <form action="#" class="review-form" method="post">
                                                    <h5><?php echo $reviews_count;?> review<?php if($reviews_count>1)echo "s";?> for <span><?php echo $product['code'];?></span></h5>
                                                    <?php while($review=mysqli_fetch_array($reviews)){?>
                                                    <div class="total-reviews" style="padding-bottom: 20px;">
                                                        <div class="rev-avatar">
                                                            <img style="width:50px;height:50px;" src="assets/img/avatar/<?php if($review['profileimg']!='')echo $review['profileimg'];else echo "default.png";?>" alt="">
                                                        </div>
                                                        <div class="review-box">
                                                            <div class="ratings">
                                                                <?php for($i=0;$i<5;$i++){
                                                                    if($i>=$review['rate'])echo "<span><i class=\"lnr lnr-star\"></i></span>";
                                                                    else echo "<span class=\"good\"><i class=\"fa fa-star\"></i></span>";
                                                                }?>
                                                            </div>
                                                            <div class="post-author">
                                                                <p><span><?php echo $review['username']?> -</span> <?php echo friendly_date($review['created_at']);?></p>
                                                            </div>
                                                            <p><?php echo $review['comment']?></p>
                                                        </div>
                                                    </div>
                                                    <?php }?>
                                                    <?php if(isset($_SESSION['user']['id'])&&!mysqli_num_rows(mysqli_query($con,"select * from reviews where user_id=".$_SESSION['user']['id']." and product_id=".$product['id']))){?>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Your Review</label>
                                                            <textarea class="form-control" id="review" name="review" required></textarea>
                                                            <div class="help-block pt-10"><span
                                                                    class="text-danger">Note:</span>
                                                                HTML is not translated!
                                                            </div>
                                                        </div>
                                                    </div
                                                    
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Rating</label>
                                                            &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                            <input type="radio" value="1" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="2" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="3" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="4" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="5" name="rating" checked>
                                                            &nbsp;Good
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="a" id="a" value="<?php echo $id;?>">
                                                    <div class="buttons">
                                                        <button class="btn btn__bg d-block" type="submit">Continue</button>
                                                    </div>
                                                    <?php }?>
                                                </form> <!-- end of review-form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->
    </main>
    <!-- main wrapper end -->
    
<?php
require_once('layout/footer.php');
?>