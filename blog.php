<?php
$page_title="Blog";
require_once('layout/header.php');
if(isset($_REQUEST['title'])&&isset($_REQUEST['description'])){
    if(!isset($_SESSION['user']['id']))echo "<script>location.href='login-register.php';</script>";
    $title=$_REQUEST['title'];
    $description=$_REQUEST['description'];
    $image=$_FILES['image']['name'];
    if($image!=''){
        $uploaddir="assets/img/blog/";
        $image=md5(basename($image.date("Y-m-d H:i:s")));
        move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir.$image);
        mysqli_query($con,"insert into blogs (id,title,description,user_id,image,created_at) values('','{$title}','{$description}','".$_SESSION['user']['id']."','{$image}','".date("Y-m-d H:i:s")."')");
        echo "<script>location.href='blog.php';</script>";
    }
}
$page_size=isset($_REQUEST['page_size'])?$_REQUEST['page_size']:8;
$start=isset($_REQUEST['start'])?$_REQUEST['start']:1;
$view=isset($_REQUEST['view'])?$_REQUEST['view']:0;
$sql="select a.*,b.username from blogs a left join users b on a.user_id=b.id ";
$sql.=" order by a.created_at desc ";
$page_count=mysqli_num_rows(mysqli_query($con,$sql))/$page_size;
if($page_count>round($page_count))$page_count=round($page_count)+1;
else $page_count=round($page_count);
$sql.=" limit ".($page_size*($start-1)).",".$page_size;
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
                                    <li class="breadcrumb-item active" aria-current="page">blog</li>
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
                                        $blogs = mysqli_query($con,$sql);
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
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="row mbn-30">
                            <?php 
                                $blogs = mysqli_query($con,$sql);
                                while($blog=mysqli_fetch_array($blogs)){
                            ?>
                            <!-- blog single item start -->
                            <div class="col-md-6">
                                <div class="blog-post-item mb-30">
                                    <div class="blog-post-thumb">
                                        <a href="blog-details.php?a=<?php echo $blog['id'];?>">
                                            <img style="max-height:500px;" src="assets/img/blog/<?php echo $blog['image'];?>" alt="">
                                        </a>
                                        <div class="post-date">
                                            <p class="date"><?php echo friendly_day($blog['created_at']);?></p>
                                            <p class="month"><?php echo friendly_month($blog['created_at']);?></p>
                                        </div>
                                    </div>
                                    <div class="post-info-wrapper">
                                        <div class="entry-header">
                                            <h2 class="entry-title">
                                            <a href="blog-details.php?a=<?php echo $blog['id'];?>"><?php echo $blog['title'];?></a>
                                            </h2>
                                            <div class="post-meta">
                                                <div class="post-author">
                                                    Written by: <a href="javascript:;"><?php echo $blog['username'];?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="entry-summary">
                                            <p><?php echo substr($blog['description'],0,240);?></p>
                                        </div>
                                        <a href="blog-details.php?a=<?php echo $blog['id'];?>" class="btn-read">read more...</a>
                                    </div>
                                </div>
                            </div>
                            <!-- blog single item end -->
                            <?php }?>
                        </div>

                        <!-- start pagination area -->
                        <div class="paginatoin-area text-center">
                            <ul class="pagination-box">
                                <li><a class="previous" href="javascript:;" onclick="gotoShop(1);"><i class="lnr lnr-chevron-left"></i></a></li>
                                <?php 
                                for($i=1;$i<=$page_count;$i++){
                                    echo "<li ".($i==$start?" class=\"active\"":"")."><a href=\"javascript:;\" onclick=\"gotoShop({$i});\">{$i}</a></li>";
                                }
                                ?>
                                <li><a class="next" href="#"><i class="lnr lnr-chevron-right"></i></a></li>
                            </ul>
                        </div>
                        <!-- end pagination area -->

                        <!-- start blog comment box -->
                        <div class="blog-comment-wrapper" style="margin-top:30px;">
                            <h3>Create new</h3>
                            <form action="#" enctype="multipart/form-data" method="post">
                                <div class="comment-post-box">
                                    <div class="row">
                                        <div class="col-12 mt-20">
                                            <label>Title</label>
                                            <input type="text" name="title" class="coment-field" placeholder="Title" required>
                                        </div>
                                        <div class="col-12">
                                            <label>comment</label>
                                            <textarea name="description" placeholder="Write a comment" required></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label>Image</label>
                                            <input type="file" name="image" class="coment-field" placeholder="Image" required>
                                        </div>
                                        <div class="col-12">
                                            <div class="coment-btn mt-30">
                                                <input class="btn btn__bg" type="submit" name="submit" value="post blog">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- start blog comment box -->
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
<script>
function gotoShop(start){
    location.href='blog.php?start='+start;
}
</script>