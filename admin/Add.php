    <?php  
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 include("auth.php");
?>

<!DOCTYPE html> 
    <head lang="en">  
    <meta charset="UTF-8">   
    <link rel="stylesheet" type="text/css" href="style.css" /> 
    <title>View Users</title>  
    </head>  
    <style>  
        .container{padding: 50px;}
      
    </style>  

<body>  

<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
       <div class="table-scrol">  
<h1 align="center">Register New products</h1> 
    <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
<div class="panel-body">  
    <form role="form" method="post" action="Add.php" enctype="multipart/form-data">  
        <fieldset>  
            <div class="form-group">  
                <input class="form-control" placeholder="Product Code" name="code" type="text" autofocus>
            </div>  
            <div class="form-group">  
                <input class="form-control" placeholder="Product Name" name="name" type="char" autofocus>  
            </div> 
            <div class="form-group">  
                <input class="form-control" placeholder="Product Price" name="price" type="float" value="">  
            </div>
            <div class="form-group">  
                <textarea class="form-control" placeholder="Product Description" name="description" type="char" autofocus></textarea>  
            </div>
            <div class="form-group">  
                Product image: <input type="file" class="form-control" placeholder="Product Image" name="image">  
            </div> 
            <div class="form-group">  
                Detail image: <input type="file" class="form-control" placeholder="Product Image" name="detail_image">  
            </div>  
            <input class="btn btn-lg btn-success btn-block" type="submit" value="add new product" name="add" >     
        </fieldset>  
    </form>  
</div>
</div>
</div> 
</div> 

<hr>
<h1  align="center">To go back
    <a href="A_View_users.php">Click me</a>
</h1> 


<footer id= "main-footer">
    <p>Copyright &copy; 2018 Issa Tech. All Rights Reserved, Website Architecture by Kamal Issa.</p>
</footer>

</body>  
</html>

<?php  
    if(isset($_POST['add']))  
    {  
        $product_code=$_REQUEST['code'];
        //here getting result from the post array after submitting the form.  
        $product_name=$_REQUEST['name'];//same
        $product_price=$_REQUEST['price'];//same   
        $submittedby = $_SESSION['admin_name']; 
        $product_description = $_REQUEST['description']; 
        
        if($product_name=='' )  
        {  
            //javascript use for input checking  
            echo"<script>alert('Please enter the product name')</script>";  
    exit();//this use if first is not work then other will not show  
        }  
        if($product_code=='')  
        {  
            echo"<script>alert('Please enter the product code')</script>";  
    exit();  
        }  
        if($product_price=='')  
        {  
            echo"<script>alert('Please enter the product price')</script>";  
        exit();  
        }
    //here query check weather if product already registered so can't register again.          
        $check_query="select * from products WHERE code ='$product_code'";  
        $run_query=mysqli_query($db,$check_query);  
      
        if(mysqli_num_rows($run_query)>0)  
        {  
    echo "<script>alert('Product code: $product_code is already exist in our database, Please try another one!')</script>";  
    exit();  
      } else {
        $uploaddir = '../assets/img/product/';
        $product_image=$_FILES['image']['name'];
        $product_detail_image=$_FILES['detail_image']['name']; 
        if($product_image!='')move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir.basename($product_image));
        if($product_detail_image!='')move_uploaded_file($_FILES['detail_image']['tmp_name'], $uploaddir.basename($product_detail_image));
        
        //insert the data into the database.
        $insert_user="insert into products (`name`,`description`, `code`, `price`, `image`, `detail_image`, `submittedby`) value ('$product_name','$product_description','$product_code','$product_price','$product_image','$product_detail_image','$submittedby' )";  

        if($err=mysqli_query($db,$insert_user))  
        {  
                echo"<script>window.open('A_View_users.php','_self')</script>";  
                }
            else{
             echo"<script>alert('$err>>>>$insert_user')</script>";   
            }        exit();  
        }
    }  
?>    
