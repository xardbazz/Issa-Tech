<?php
$page_title="Login/Profile";
require_once('layout/header.php');
if (isset($_REQUEST['email'])){
    $email = stripslashes($_REQUEST['email']);
    $firstname = stripslashes($_REQUEST['firstname']);
    $lastname = stripslashes($_REQUEST['lastname']);
    $current_pwd = stripslashes($_REQUEST['current_pwd']);
    $new_pwd = stripslashes($_REQUEST['new_pwd']);
    $confirm_pwd = stripslashes($_REQUEST['confirm_pwd']);
    $uploaddir = 'assets/img/avatar/';
    $avatar=$_FILES['avatar']['name'];
    if($avatar!=''){
        $avatar=md5(basename($avatar));
        move_uploaded_file($_FILES['avatar']['tmp_name'], $uploaddir.$avatar);
        mysqli_query($con,"update users set profileimg='{$avatar}' where id=".$_SESSION['user']['id']);
    }
    mysqli_query($con,"update users set email='{$email}',firstname='{$firstname}',lastname='{$lastname}' where id=".$_SESSION['user']['id']);
    if($new_pwd!=''&&$current_pwd!=''&&$confirm_pwd!=''){
        if($_SESSION['user']['password']!=md5($current_pwd))echo "<script>alert('current password is wrong!');</script>";
        else if($new_pwd!=$confirm_pwd)echo "<script>alert('password doesn't match!');</script>";
        else{
            mysqli_query($con,"update users set password='".md5($new_pwd)."' where id=".$_SESSION['user']['id']);
        }
    }
    $res=mysqli_query($con,"select * from users where id=".$_SESSION['user']['id']);
    $cnt=mysqli_num_rows($res);
    if($cnt){
        $row=mysqli_fetch_array($res);
        $_SESSION['username'] = $row['username'];
        $_SESSION['user'] = $row;
        echo "<script>location.href='my-account.php';</script>";
    }
}
$page=0;
if(isset($_REQUEST['a']))$page=$_REQUEST['a'];
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
                                <h1><img style="width:50px;height:50px;border-radius: 50%;" src="assets/img/avatar/<?php if($_SESSION['user']['profileimg']!='')echo $_SESSION['user']['profileimg'];else echo "default.png";?>"></h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">my account</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- my account wrapper start -->
        <div class="my-account-wrapper section-space pb-0">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- My Account Page Start -->
                            <div class="myaccount-page-wrapper">
                                <!-- My Account Tab Menu Start -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="myaccount-tab-menu nav" role="tablist">
                                            <a href="#dashboad" <?php if($page==0)echo " class=\"active\"";?> data-toggle="tab"><i class="fa fa-dashboard"></i>
                                                Dashboard</a>
                                            <a href="#orders" <?php if($page==1)echo " class=\"active\"";?> data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                                                Orders</a>
                                            <a href="#account-info" <?php if($page==2)echo " class=\"active\"";?> data-toggle="tab"><i class="fa fa-user"></i> Account
                                                Details</a>
                                            <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                        </div>
                                    </div>
                                    <!-- My Account Tab Menu End -->

                                    <!-- My Account Tab Content Start -->
                                    <div class="col-lg-9 col-md-8">
                                        <div class="tab-content" id="myaccountContent">
                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade <?php if($page==0)echo " show active";?>" id="dashboad" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Dashboard</h3>
                                                    <div class="welcome">
                                                        <p>Hello, <strong><?php echo $_SESSION['user']['firstname']." ".$_SESSION['user']['lastname'];?></strong> (If Not <strong><?php echo $_SESSION['user']['firstname'];?>
                                                            !</strong><a href="login-register.php" class="logout"> Logout</a>)</p>
                                                    </div>
                                                    <p class="mb-0">From your account dashboard. you can easily check &
                                                        view your recent orders, manage your shipping and billing addresses
                                                        and edit your password and account details.</p>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade <?php if($page==1)echo " show active";?>" id="orders" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Orders</h3>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Order</th>
                                                                    <th>Date</th>
                                                                    <th>Status</th>
                                                                    <th>Total</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                    $i=0;$status=explode(",","pending,accepted,hold on");
                                                                    $bills=mysqli_query($con,"select * from bills where user_id=".$_SESSION['user']['id']);
                                                                    while($bill=mysqli_fetch_array($bills)){
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo ++$i;?></td>
                                                                    <td><?php echo friendly_date($bill['created_at']);?></td>
                                                                    <td><?php echo $status[$bill['status']];?></td>
                                                                    <td>$<?php echo $bill['price'];?></td>
                                                                    <td><a href="cart.php?a=<?php echo $bill['bill_no'];?>" class="btn btn__bg">View</a>
                                                                    </td>
                                                                </tr>
                                                                <?php }?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade <?php if($page==2)echo " show active";?>" id="account-info" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Account Details</h3>
                                                    <div class="account-details-form">
                                                        <form method="post" action="#" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="first-name" class="required">First
                                                                            Name</label>
                                                                        <input type="text" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $_SESSION['user']['firstname'];?>" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="last-name" class="required">Last
                                                                            Name</label>
                                                                        <input type="text" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $_SESSION['user']['lastname'];?>" required/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="single-input-item">
                                                                <label for="email" class="required">Email Addres</label>
                                                                <input type="email" name="email" id="email" placeholder="Email Address" value="<?php echo $_SESSION['user']['email'];?>" required/>
                                                            </div>
                                                            <div class="single-input-item">
                                                                <label for="email" class="required">Avatar image</label>
                                                                <input type="file" id="avatar" name="avatar" />
                                                            </div>
                                                            <fieldset>
                                                                <legend>Password change</legend>
                                                                <div class="single-input-item">
                                                                    <label for="current-pwd" class="required">Current
                                                                        Password</label>
                                                                    <input type="password" name="current_pwd" id="current_pwd" placeholder="Current Password" />
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="new-pwd" class="required">New
                                                                                Password</label>
                                                                            <input type="password" name="new_pwd" id="new_pwd" placeholder="New Password" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="confirm-pwd" class="required">Confirm
                                                                                Password</label>
                                                                            <input type="password" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm Password" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <div class="single-input-item">
                                                                <button class="btn btn__bg">Save Changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> <!-- Single Tab Content End -->
                                        </div>
                                    </div> <!-- My Account Tab Content End -->
                                </div>
                            </div> <!-- My Account Page End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
    </main>
    <!-- main wrapper end -->
<?php
require_once('layout/footer.php');
?>
   