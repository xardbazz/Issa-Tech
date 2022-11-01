    <?php  
 session_start();
    ?> 
<!doctype html>
<html>

<link rel="stylesheet" href="_CSS/style.css" /> 
    <head lang="en">  
        <meta charset="UTF-8">  
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>Admin Login</title>  
    </head>  
    <style>  
        .login-panel {  
            margin-top: 150px;  
      
    </style>  
      
    <body>  
      
    <div class="container">  
        <div class="row">  
            <div class="col-md-4 col-md-offset-4">  
                <div class="login-panel panel panel-success">  
                    <div class="panel-heading">  
                        <h3 class="panel-title">Admin Sign In</h3>  
                    </div>  
                    <div class="panel-body">  
                        <form role="form" method="post" action="A_login.php">  
                            <fieldset>  
                                <div class="form-group"  >  
                                    <input class="form-control" placeholder="Name" name="admin_name" type="text" autofocus>  
                                </div>  
                                <div class="form-group">  
                                    <input class="form-control" placeholder="Password" name="admin_pass" type="password" value="">  
                                </div>  
      
      
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="admin_login" >  
      
      
                            </fieldset>  
                        </form>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
    <?php  
    include("dbconnect.php");  
    if(isset($_POST['admin_login']))//this will tell us what to do if some data has been post through form with button.  
    {  
        $admin_name=$_POST['admin_name'];  
        $admin_pass=$_POST['admin_pass'];  
      
        $admin_query="select * from admin where admin_name='$admin_name' AND admin_pass='$admin_pass'";  
      
        $run_query=mysqli_query($db,$admin_query);  
      
        if(mysqli_num_rows($run_query)>0)  
        {  
      
            echo "<script>window.open('A_View_users.php','_self')</script>";  
            $_SESSION['admin_name']=$admin_name;
        }  
        else {echo"<script>alert('Admin Details are incorrect..!')</script>";}  
      
    }  
      
    ?>  
   
        <h1 align="center">
            <th scope="col" class="font">
        Hi, <?php echo $_SESSION['admin_name'] ?>  
        </th>
        </tr>
        <tr>
            <td class="font" >
                    If it is not you, please 
                <a href="A_Logout.php?logout">
                    Sign Out
                </a>
            </td>
        </h1>  

<footer id= "main-footer">
    <p>Copyright &copy; 2018 Issa Tech. All Rights Reserved, Website Architecture by Kamal Issa.</p>
</footer>
</body>  
</html>  
      
   