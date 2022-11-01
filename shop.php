<?php
$page_title="Shop";
require_once('layout/header.php');
$page_size=isset($_REQUEST['page_size'])?$_REQUEST['page_size']:8;
$start=isset($_REQUEST['start'])?$_REQUEST['start']:1;
$sort=isset($_REQUEST['sort'])?$_REQUEST['sort']:0;
$view=isset($_REQUEST['view'])?$_REQUEST['view']:0;
$sql="select * from products ";
if($sort==1)$sql.=" order by code ";
else if($sort==2)$sql.=" order by code desc ";
else if($sort==3)$sql.=" order by price ";
$page_count=mysqli_num_rows(mysqli_query($con,$sql))/$page_size;
if($page_count>round($page_count))$page_count=round($page_count)+1;
else $page_count=round($page_count);
$sql.=" limit ".($page_size*($start-1)).",".$page_size;
$product_rows = mysqli_query($con,$sql);
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
                                <h1>shop</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">shop</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-space pb-0">
            <div class="container">
                <div class="row">
                    <!-- shop main wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a class="active" href="#" data-target="grid-view" data-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                                <a href="#" data-target="list-view" data-toggle="tooltip" title="List View"><i class="fa fa-list"></i></a>
                                            </div>
                                            <div class="product-amount">
                                                <p>Showing 1–<?php echo $page_count;?> of <?php echo $page_size;?> results</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Sort By : </p>
                                                <select class="nice-select" name="sortby" id="sortby" onchange="gotoShop(<?php echo $start;?>,$('#sortby').val());">
                                                    <option <?php if($sort==0)echo " selected";?> value="0">Relevance</option>
                                                    <option <?php if($sort==1)echo " selected";?> value="1">Name (A - Z)</option>
                                                    <option <?php if($sort==2)echo " selected";?> value="2">Name (Z - A)</option>
                                                    <option <?php if($sort==3)echo " selected";?> value="3">Price (Low &gt; High)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-40">
                                <!-- product single item start -->
                                <?php while($product = mysqli_fetch_array($product_rows)){
                                    $reviews=mysqli_query($con,"select * from reviews a left join users b on a.user_id=b.id where a.product_id=".$product['id']);
                                    $reviews_count=mysqli_num_rows($reviews);
                                    $reviews_avg=0;
                                    if($reviews_count)$reviews_avg=mysqli_fetch_array(mysqli_query($con,"select avg(rate) as rate from reviews where product_id=".$product['id']))[0];    
                                ?>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <!-- product grid start -->
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
                                                <a href="#" onclick="
                                                $('#quick_product_id').val(<?php echo $product['id'];?>);
                                                //$('#quick_view .product-details-inner .col-md-5 .product-large-slider').html('');
                                                $('#quick_img_01').attr('src','assets/img/product/<?php echo $product['image'];?>');
                                                $('#quick_img_02').attr('src','assets/img/product/<?php echo $product['detail_image'];?>');
                                                $('#quick_img_11').attr('src','assets/img/product/<?php echo $product['image'];?>');
                                                $('#quick_img_12').attr('src','assets/img/product/<?php echo $product['detail_image'];?>');
                                                $('#quick_view .product-name').html('<?php echo $product['code'];?>');
                                                $('#quick_star_0 i').addClass('<?php if($reviews_avg>0)echo 'fa fa-star';else echo 'lnr lnr-star';?>');
                                                $('#quick_star_1 i').addClass('<?php if($reviews_avg>1)echo 'fa fa-star';else echo 'lnr lnr-star';?>');
                                                $('#quick_star_2 i').addClass('<?php if($reviews_avg>2)echo 'fa fa-star';else echo 'lnr lnr-star';?>');
                                                $('#quick_star_3 i').addClass('<?php if($reviews_avg>3)echo 'fa fa-star';else echo 'lnr lnr-star';?>');
                                                $('#quick_star_4 i').addClass('<?php if($reviews_avg>4)echo 'fa fa-star';else echo 'lnr lnr-star';?>');
                                                $('#quick_view .pro-review').html('<span><?php echo $reviews_count.' review'.($reviews_count>1?'s':'');?></span>');
                                                $('#quick_view .price-box .price-regular').html('$<?php if($product['discount_percentage']>0)echo round($product['price']*(100-$product['discount_percentage'])/100,2);else echo round($product['price'],2);?>');
                                                $('#quick_view .price-box .price-old').html('<?php if($product['discount_percentage']>0)echo '<del>$'.round($product['price'],2).'</del>';else echo '';?>');
                                                <?php if($reviews_avg>0){?>$('#quick_view .ratings').addClass('d-flex');$('#quick_view .ratings').fadeIn();
                                                <?php }else{?>$('#quick_view .ratings').removeClass('d-flex');$('#quick_view .ratings').fadeOut();<?php }?>
                                                $('#quick_view .availability span').html('<?php echo $product['instock'];?> in stock');
                                                $('#quick_view .pro-desc').html('<?php //echo $product['description'];?>');
                                                " data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="lnr lnr-magnifier"></i></span></a>
                                                <a href="cart.php" onclick="addCart(<?php echo $product['id'];?>,1);" data-toggle="tooltip" data-placement="left" title="Add to Cart"><i class="lnr lnr-cart"></i></a>
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
                                    <!-- product grid end -->

                                    <!-- product list item end -->
                                    <div class="product-list-item">
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
                                        </figure>
                                        <div class="product-content-list">
                                            <h5 class="product-name"><a href="product-details.php"><?php echo $product['code'];?></a></h5>
                                            <div class="price-box">
                                                <?php
                                                    if($product['discount_percentage']>0){
                                                        echo "<span class=\"price-regular\">$".round($product['price']*(100-$product['discount_percentage'])/100,2)."</span>";
                                                        echo "<span class=\"price-old\"><del>$".round($product['price'],2)."</del></span>";
                                                    }else
                                                        echo "<span class=\"price-regular\">$".round($product['price'],2)."</span>";
                                                ?>
                                            </div>
                                            <p><?php echo $product['description'];?></p>
                                            <div class="button-group-list">
                                                <a class="btn-big" href="cart.php" onclick="addCart(<?php echo $product['id'];?>,1);" data-toggle="tooltip" title="Add to Cart"><i class="lnr lnr-cart"></i>Add to Cart</a>
                                                <a href="#" onclick="
                                                $('#quick_product_id').val(<?php echo $product['id'];?>);
                                                //$('#quick_view .product-details-inner .col-md-5 .product-large-slider').html('');
                                                $('#quick_img_01').attr('src','assets/img/product/<?php echo $product['image'];?>');
                                                $('#quick_img_02').attr('src','assets/img/product/<?php echo $product['detail_image'];?>');
                                                $('#quick_img_11').attr('src','assets/img/product/<?php echo $product['image'];?>');
                                                $('#quick_img_12').attr('src','assets/img/product/<?php echo $product['detail_image'];?>');
                                                $('#quick_view .product-name').html('<?php echo $product['code'];?>');
                                                $('#quick_star_0 i').addClass('<?php if($reviews_avg>0)echo 'fa fa-star';else echo 'lnr lnr-star';?>');
                                                $('#quick_star_1 i').addClass('<?php if($reviews_avg>1)echo 'fa fa-star';else echo 'lnr lnr-star';?>');
                                                $('#quick_star_2 i').addClass('<?php if($reviews_avg>2)echo 'fa fa-star';else echo 'lnr lnr-star';?>');
                                                $('#quick_star_3 i').addClass('<?php if($reviews_avg>3)echo 'fa fa-star';else echo 'lnr lnr-star';?>');
                                                $('#quick_star_4 i').addClass('<?php if($reviews_avg>4)echo 'fa fa-star';else echo 'lnr lnr-star';?>');
                                                $('#quick_view .pro-review').html('<span><?php echo $reviews_count.' review'.($reviews_count>1?'s':'');?></span>');
                                                $('#quick_view .price-box .price-regular').html('$<?php if($product['discount_percentage']>0)echo round($product['price']*(100-$product['discount_percentage'])/100,2);else echo round($product['price'],2);?>');
                                                $('#quick_view .price-box .price-old').html('<?php if($product['discount_percentage']>0)echo '<del>$'.round($product['price'],2).'</del>';else echo '';?>');
                                                <?php if($reviews_avg>0){?>$('#quick_view .ratings').addClass('d-flex');$('#quick_view .ratings').fadeIn();
                                                <?php }else{?>$('#quick_view .ratings').removeClass('d-flex');$('#quick_view .ratings').fadeOut();<?php }?>
                                                $('#quick_view .availability span').html('<?php echo $product['instock'];?> in stock');
                                                $('#quick_view .pro-desc').html('<?php //echo $product['description'];?>');
                                                " data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip"  title="Quick View"><i class="lnr lnr-magnifier"></i></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product list item end -->
                                </div>
                                <?php }?>
                                <!-- product single item start -->
                            </div>
                            <!-- product item list wrapper end -->

                            <!-- start pagination area -->
                            <div class="paginatoin-area text-center">
                                <ul class="pagination-box">
                                    <li><a class="previous" href="javascript:;" onclick="gotoShop(1,<?php echo $sort;?>);"><i class="lnr lnr-chevron-left"></i></a></li>
                                    <?php 
                                    for($i=1;$i<=$page_count;$i++){
                                        echo "<li ".($i==$start?" class=\"active\"":"")."><a href=\"javascript:;\" onclick=\"gotoShop({$i},{$sort});\">{$i}</a></li>";
                                    }
                                    ?>
                                    <li><a class="next" href="#"><i class="lnr lnr-chevron-right"></i></a></li>
                                </ul>
                            </div>
                            <!-- end pagination area -->
                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->
    </main>
    <!-- main wrapper end -->

<?php
require_once('layout/footer.php');
?>
<script>
function gotoShop(start,sort){
    location.href='shop.php?start='+start+'&sort='+sort+'&view=0';
}
</script>