<?php
if(isset($_SESSION['username'])){
    echo "<script>location.href='index.php';</script>";
}
$page_title="Login/Register";
require_once('layout/header.php');

$err="";
if (isset($_POST['email'])&&$_POST['login_flag']){
    $username = stripslashes($_REQUEST['email']); // removes backslashes
    //$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
    $password = stripslashes($_REQUEST['password']);
    //$password = mysqli_real_escape_string($con,$password);
    $cnt=mysqli_num_rows(mysqli_query($con,"select * from users where username='{$username}' or email='{$username}'"));
    if(!$cnt)$err="There is no username or email!";
    else{
        $res=mysqli_query($con,"select * from users where (username='{$username}' or email='{$username}') and password='".md5($password)."'");
        $cnt=mysqli_num_rows($res);
        if(!$cnt)$err="Password is wrong!";
        else{
            $row=mysqli_fetch_array($res);
            $_SESSION['username'] = $row['username'];
            $_SESSION['user'] = $row;
            echo "<script>location.href='my-account.php';</script>";
        }
    }
}
if (isset($_POST['_email'])&&$_POST['signup_flag']){
    $firstname = $_REQUEST['firstname'];$lastname = $_REQUEST['lastname'];
    $username = stripslashes($_REQUEST['_username']);
    $email = stripslashes($_REQUEST['_email']);
    $password = stripslashes($_REQUEST['_password']);$confirm = stripslashes($_REQUEST['_confirm']);
    $cnt=mysqli_num_rows(mysqli_query($con,"select * from users where username='{$username}'"));
    if($cnt)$err="Username is exist already!";
    else{
        $cnt=mysqli_num_rows(mysqli_query($con,"select * from users where email='{$email}'"));
        if($cnt)$err="Email is exist already!";
        else{
            if($password!=$confirm)$err="Password don't match!";
            else{
                $res=mysqli_query($con,"insert into users (id,email,username,password,firstname,lastname,profileimg,trn_date)
                 values('','{$email}','{$username}','".md5($password)."','{$firstname}','{$lastname}','','".date("Y-m-d H:i:s")."')");      
                $res=mysqli_query($con,"select * from users where username='{$username}' and password='".md5($password)."'");
                $cnt=mysqli_num_rows($res);
                if(!$cnt)$err="error!";
                else{
                    $row=mysqli_fetch_array($res);
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user'] = $row;
                    echo "<script>location.href='my-account.php';</script>";
                }
            }
        }
    }
}
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
                                <h1>login/register</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">login/register</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- login register wrapper start -->
        <div class="login-register-wrapper section-space pb-0">
            <div class="container">
                <div class="member-area-from-wrap">
                    <div class="row">
                        <!-- Login Content Start -->
                        <div class="col-lg-6">
                            <div class="login-reg-form-wrap">
                                <h2>Sign In</h2>
                                <?php if($err!=''&&$_POST['login_flag'])echo "<div style=\"padding: 0px;font-size: 11px;color: #cc2121;margin-bottom: -20px;\">{$err}</div>";?>
                                <form action="#" method="post">
                                    <input type="hidden" name="login_flag" id="login_flag" value="0"/>
                                    <div class="single-input-item">
                                        <input type="text" placeholder="Email or Username" name="email" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="password" placeholder="Enter your Password" name="password" required />
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                            <div class="remember-meta">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                    <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                                </div>
                                            </div>
                                            <a href="#" class="forget-pwd">Forget Password?</a>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button class="btn btn__bg" onclick="$('#login_flag').val(1);">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login Content End -->

                        <!-- Register Content Start -->
                        <div class="col-lg-6">
                            <div class="login-reg-form-wrap sign-up-form">
                                <h2>Singup Form</h2>
                                <?php if($err!=''&&$_POST['signup_flag'])echo "<div style=\"padding: 0px;font-size: 11px;color: #cc2121;margin-bottom: -20px;\">{$err}</div>";?>
                                <form action="#" method="post" style="margin-top:-20px;">
                                    <input type="hidden" name="signup_flag" id="signup_flag" value="0"/>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="text" placeholder="First name" name="first_name" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="text" placeholder="Last name" name="last_name" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <input type="text" placeholder="Username" name="_username" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="email" placeholder="Enter your Email" name="_email" required />
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="password" placeholder="Enter your Password" name="_password" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="password" placeholder="Repeat your Password" name="_confirm" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta">
                                            <div class="remember-meta">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="subnewsletter">
                                                    <label class="custom-control-label" for="subnewsletter">Subscribe
                                                        Our Newsletter</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button class="btn btn__bg" onclick="$('#signup_flag').val(1);">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Register Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- login register wrapper end -->
    </main>
    <!-- main wrapper end -->
<?php
require_once('layout/footer.php');
?>
   