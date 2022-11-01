<?php
$page_title="Blog";
require_once('layout/header.php');
if(!isset($_REQUEST['a']))echo "<script>location.href='blog.php';</script>";
if(isset($_SESSION['user']['id'])&&isset($_REQUEST['comment'])){
    mysqli_query($con,"insert into comments (id,user_id,blog_id,comment,created_at) values('','".$_SESSION['user']['id']."','".$_REQUEST['a']."','".$_REQUEST['comment']."','".date("Y-m-d H:i:s")."')");
    echo "<script>location.href='blog-details.php?a=".$_REQUEST['a']."';</script>";
}
$comments=mysqli_query($con,"select a.*,b.username,b.profileimg from comments a left join users b on a.user_id=b.id where blog_id=".$_REQUEST['a']." order by a.created_at desc ");
$comment_count=mysqli_num_rows($comments);
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
                                <h1>blog</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="blog.php">blog</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- blog main wrapper start -->
        <div class="blog-main-wrapper section-space pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-2 order-lg-1">
                        <div class="blog-sidebar-wrapper">
                            <div class="blog-sidebar">
                                <h4 class="title">search</h4>
                                <div class="sidebar-serch-form">
                                    <form action="#">
                                        <input type="text" class="search-field" placeholder="search here">
                                        <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div> 
                            <div class="blog-sidebar">
                                <h4 class="title">recent post</h4>
                                <div class="recent-post">
                                    <?php 
                                        $blogs = mysqli_query($con,"select * from blogs order by created_at desc");
                                        while($blog=mysqli_fetch_array($blogs)){
                                    ?>
                                    <div class="recent-post-item">
                                        <div class="product-thumb">
                                            <a href="blog-details.php?a=<?php echo $blog['id'];?>">
                                                <img  style="width: 70px;height: 70px;" src="assets/img/blog/<?php echo $blog['image'];?>" alt="">
                                            </a>
                                        </div>
                                        <div class="recent-post-description">
                                            <div class="product-name">
                                                <h4><a href="blog-details.php?a=<?php echo $blog['id'];?>"><?php echo $blog['title'];?></a></h4>
                                                <p><?php echo friendly_date($blog['created_at']);?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <?php $blog=mysqli_fetch_array(mysqli_query($con,"select a.*,b.username from blogs a left join users b on a.user_id=b.id where a.id=".$_REQUEST['a']));?>
                    <div class="col-lg-9 order-1 order-lg-2">
                        <!-- blog single item start -->
                        <div class="blog-post-item blog-grid">
                            <div class="blog-post-thumb">
                                <img style="max-height:600px; max-width:900px;" src="assets/img/blog/<?php echo $blog['image'];?>" alt="">
                                <div class="post-date">
                                    <p class="date"><?php echo friendly_day($blog['created_at']);?></p>
                                    <p class="month"><?php echo friendly_month($blog['created_at']);?></p>
                                </div>
                            </div>
                            <div class="post-info-wrapper">
                                <div class="entry-header">
                                    <h2 class="entry-title"><?php echo $blog['title'];?></h2>
                                    <div class="post-meta">
                                        <div class="post-author">
                                            Written by: <a href="#"><?php echo $blog['username'];?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="entry-summary">
                                    <p><?php echo $blog['description'];?></p>
                                    <div class="blog-share-link">
                                        <h5>share :</h5>
                                        <div class="blog-social-icon">
                                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- blog single item end -->

                        <!-- comment area start -->
                        <?php if($comment_count){?>
                        <div class="comment-section section-space">
                            <h3><?php echo $comment_count;?> comment<?php if($comment_count>1)echo "s";?></h3>
                            <ul>
                                <?php 
                                    $i=0;
                                    while($comment=mysqli_fetch_array($comments)){
                                ?>
                                <li <?php if($i++%2)echo "class=\"comment-children\"";?>>
                                    <div class="author-avatar">
                                        <img style="width: 60px;height: 60px;" src="assets/img/avatar/<?php echo $comment['profileimg'];?>" alt="">
                                    </div>
                                    <div class="comment-body">
                                        <span class="reply-btn"><a href="#"></a></span>
                                        <h5 class="comment-author"><?php echo $comment['username'];?></h5>
                                        <div class="comment-post-date">
                                            <?php echo friendly_datetime($comment['created_at']);?>
                                        </div>
                                        <p><?php echo $comment['comment'];?></p>
                                    </div>
                                </li>
                                <?php }?>
                            </ul>
                        </div>
                        <?php }?>
                        <!-- comment area end -->

                        <?php if(isset($_SESSION['user']['id'])){?>
                        <!-- start blog comment box -->
                        <div class="blog-comment-wrapper">
                            <h3>leave a reply</h3>
                            <form action="#" method="post">
                                <div class="comment-post-box">
                                    <div class="row">
                                        <div class="col-12">
                                            <label>comment</label>
                                            <textarea name="comment" placeholder="Write a comment" required></textarea>
                                            <input type="hidden" name="a" value="<?php echo $_REQUEST['a'];?>">
                                        </div>
                                        <div class="col-12">
                                            <div class="coment-btn mt-30">
                                                <input class="btn btn__bg" type="submit" name="submit" value="post comment">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- start blog comment box -->
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog main wrapper end -->
    </main>
    <!-- main wrapper end -->
<?php
require_once('layout/footer.php');
?>