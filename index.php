<?php
$page_title="Home";
require_once('layout/header.php');
?>
    <!-- main wrapper start -->
    <main>
        <!-- slider area start -->
        <section class="slider-area">
            <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                <!-- single slider item start -->
                <div class="hero-single-slide ">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/home1-slide1.jpg">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hero-slider-content slide-1">
                                        <span>Issa Tech</span>
                                        <h1>Issa Tech, Your one stop shop for</h1>
                                        <h2>All things tech</h2>
                                        <a href="shop.php" class="btn-hero">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single slider item end -->

                <!-- single slider item start -->
                <div class="hero-single-slide">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/home1-slide2.jpg">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hero-slider-content slide-2">
                                        <span>Issa Tech</span>
                                        <h1>Issa Tech, Where tech creates</h1>
                                        <h2>the leader in you</h2>
                                        <a href="shop.php" class="btn-hero">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single slider item start -->
            </div>
        </section>
        <!-- slider area end -->

        <!-- banner statistics start -->
        <section class="banner-statistics section-space">
            <div class="container">
                <div class="row mbn-30">
                    <!-- start store item -->
                    <div class="col-md-8">
                        <h1>Welcome</h1>
                        <p>Issa Tech is a website that connects tech lovers from all around the world, a one stop shop for all things tech, Issa Tech allows you to write elaborate reviews of the technological products you love, helping others find meaningful content about the technology they like the most.</p>
                    </div>
                    <!-- start store item -->

                    <!-- start store item -->
                    <div class="col-md-4" style="background-color: #eedeeb;color: #111111;padding: 20px;">
                        <p>Tech is the main purpose of the website, focusing only on Technologies (computers, platforms, mobile phones, smart phones, and attachable gadgets, software copies, video game applications, Software android and IOS applications, etc.).</p>
                    </div>
                    <!-- start store item -->
                </div>
            </div>
        </section>
        <!-- banner statistics end -->

        <!-- service policy start -->
        <section class="service-policy-area section-space p-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <!-- start policy single item -->
                        <div class="service-policy-item">
                            <div class="icons">
                                <img src="assets/img/icon/free_shipping.png" alt="">
                            </div>
                            <div class="policy-terms">
                                <h5>free shipping</h5>
                                <p>Free shipping for all orders</p>
                            </div>
                        </div>
                        <!-- end policy single item -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <!-- start policy single item -->
                        <div class="service-policy-item">
                            <div class="icons">
                                <img src="assets/img/icon/support247.png" alt="">
                            </div>
                            <div class="policy-terms">
                                <h5>SUPPORT 24/7</h5>
                                <p>Support 24 hours a day</p>
                            </div>
                        </div>
                        <!-- end policy single item -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <!-- start policy single item -->
                        <div class="service-policy-item">
                            <div class="icons">
                                <img src="assets/img/icon/money_back.png" alt="">
                            </div>
                            <div class="policy-terms">
                                <h5>Money Return</h5>
                                <p>30 days for free return</p>
                            </div>
                        </div>
                        <!-- end policy single item -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <!-- start policy single item -->
                        <div class="service-policy-item">
                            <div class="icons">
                                <img src="assets/img/icon/promotions.png" alt="">
                            </div>
                            <div class="policy-terms">
                                <h5>ORDER DISCOUNT</h5>
                                <p>On every order over $15</p>
                            </div>
                        </div>
                        <!-- end policy single item -->
                    </div>
                </div>
            </div>
        </section>
        <!-- service policy end -->

        <!-- our product area start -->
        <section class="our-product section-space">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2>New Products</h2>
                            <p>Freash out of the cargo ship, have a look at the latest wares!</p>
                        </div>
                    </div>
                </div>
                <div class="row mtn-40">
                    <!-- product single item start -->
                    <?php $product_rows = mysqli_query($con,"SELECT * FROM `products` order by modification_date desc limit 20");
                    $i=0;while($product = mysqli_fetch_array($product_rows)){if($i++>7)break;?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product-item mt-40">
                            <figure class="product-thumb">
                                <a href="product-details.php?a=<?php echo $product['id'];?>">
                                    <img class="pri-img" src="assets/img/product/<?php echo $product['image'];?>" alt="product">
                                    <img class="sec-img" src="assets/img/product/<?php echo $product['detail_image'];?>" alt="product">
                                </a>
                                <div class="product-badge">
                                    <?php if($product['is_new']){?>
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                    <?php }?>
                                    <?php if($product['discount_percentage']){?>
                                    <div class="product-label discount">
                                        <span><?php echo $product['discount_percentage'];?>%</span>
                                    </div>
                                    <?php }?>
                                </div>
                                <div class="button-group">
                                    <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="lnr lnr-magnifier"></i></span></a>
                                    <a href="cart.php" data-toggle="tooltip" data-placement="left" title="Add to Cart"><i class="lnr lnr-cart"></i></a>
                                </div>
                            </figure>
                            <div class="product-caption">
                                <p class="product-name">
                                    <a href="product-details.php"><?php echo $product['code'];?></a>
                                </p>
                                <div class="price-box">
                                    <?php
                                        if($product['discount_percentage']>0){
                                            echo "<span class=\"price-regular\">$".round($product['price']*(100-$product['discount_percentage'])/100,2)."</span>";
                                            echo "<span class=\"price-old\"><del>$".round($product['price'],2)."</del></span>";
                                        }else
                                            echo "<span class=\"price-regular\">$".round($product['price'],2)."</span>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <!-- product single item end -->
                    <div class="col-12">
                        <div class="view-more-btn">
                            <a class="btn-hero btn-load-more" href="shop.php">view more products</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- our product area end -->

        <!-- banner statistics start -->
        <section class="banner-statistics-right">
            <div class="container">
                <div class="row">
                    <!-- start banner item start -->
                    <div class="col-md-6">
                        <div class="banner-item banner-border">
                            <figure class="banner-thumb">
                                <a href="shop.php">
                                    <img src="assets/img/banner/banner-1.jpg" alt="">
                                </a>
                                <figcaption class="banner-content banner-content-right">
                                    <h2 class="text1">for you</h2>
                                    <h2 class="text2">Protect glass</h2>
                                    <a class="store-link" href="shop.php">shop now</a>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <!-- start banner item end -->

                    <!-- start banner item start -->
                    <div class="col-md-6">
                        <div class="banner-item banner-border">
                            <figure class="banner-thumb">
                                <a href="shop.php">
                                    <img src="assets/img/banner/banner-2.jpg" alt="">
                                </a>
                                <figcaption class="banner-content banner-content-right">
                                    <h2 class="text1">for you</h2>
                                    <h2 class="text2">Headsets</h2>
                                    <a class="store-link" href="shop.php">shop now</a>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <!-- start banner item end -->
                </div>
            </div>
        </section>
        <!-- banner statistics end -->

        <!-- trending product area start -->
        <section class="top-sellers section-space">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2>top seller</h2>
                            <p>Items that won the hearts of the geek squad</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-carousel--4 slick-row-15 slick-sm-row-10 slick-arrow-style">
                            <!-- product single item start -->
                            <?php $product_rows = mysqli_query($con,"SELECT * FROM `products` order by sell_count desc,modification_date desc limit 4");
                            $i=0;while($product = mysqli_fetch_array($product_rows)){?>
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="product-details.php?a=<?php echo $product['id'];?>">
                                        <img class="pri-img" src="assets/img/product/<?php echo $product['image'];?>" alt="product">
                                        <img class="sec-img" src="assets/img/product/<?php echo $product['detail_image'];?>" alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <?php if($product['is_new']){?>
                                        <div class="product-label new">
                                            <span>new</span>
                                        </div>
                                        <?php }?>
                                        <?php if($product['discount_percentage']){?>
                                        <div class="product-label discount">
                                            <span><?php echo $product['discount_percentage'];?>%</span>
                                        </div>
                                        <?php }?>
                                    </div>
                                    <div class="button-group">
                                        <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="lnr lnr-magnifier"></i></span></a>
                                        <a href="cart.php" data-toggle="tooltip" data-placement="left" title="Add to Cart"><i class="lnr lnr-cart"></i></a>
                                    </div>
                                </figure>
                                <div class="product-caption">
                                    <p class="product-name">
                                        <a href="product-details.php"><?php echo $product['code'];?></a>
                                    </p>
                                    <div class="price-box">
                                        <?php
                                            if($product['discount_percentage']>0){
                                                echo "<span class=\"price-regular\">$".round($product['price']*(100-$product['discount_percentage'])/100,2)."</span>";
                                                echo "<span class=\"price-old\"><del>$".round($product['price'],2)."</del></span>";
                                            }else
                                                echo "<span class=\"price-regular\">$".round($product['price'],2)."</span>";
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            <!-- product single item end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- trending product area end -->

        <!-- Instagram Feed Area Start -->
        <div class="instagram-feed-area">
            <div class="instagram-feed-thumb">
                <div id="instafeed" class="instagram-carousel" data-userid="6666969077" data-accesstoken="6666969077.1677ed0.d325f406d94c4dfab939137c5c2cc6c2">
                </div>
            </div>
        </div>
        <!-- Instagram Feed Area End -->

    </main>
    <!-- main wrapper end -->

    
<?php
require_once('layout/footer.php');
?>