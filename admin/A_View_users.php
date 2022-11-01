<?php  
ob_start();
session_start();
require_once 'dbconnect.php';
include("auth.php");
?>

<!DOCTYPE html> 
<head lang="en">  
<meta charset="UTF-8">   
<link rel="stylesheet" type="text/css" href="style.css" /><!--css file link in bootstrap folder-->  
<title>View Users</title>  
</head>  
<body>  
    <div class="table-scrol">  
        <h1 align="center">All the Users</h1>
        <h1 align="center">
    <th>Hi,</th>
    <th scope="col" >
       <a class="UserName"><?php echo $_SESSION['admin_name'] ?></a>
    </th>
    </tr>
    <tr>
    <td align="center" >
        If it is not you, please 
    <a id=ClickMe class href="A_Logout.php?logout">
        Sign Out
    </a>
    </td>
</h1>
<hr>  
    <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
        <thead>    
            <tr>  
                <th>Id</th>  
                <th>User Name</th>
                <th>First Name</th>
                <th>Last Name</th>  
                <th>User E-mail</th>  
                <th>User Pass</th>
                <th>Profile Image</th>
                <th>Turn Date</th>  
                <th>Delete User</th>  
            </tr>  
        </thead>  
        <?php   
            $view_users_query="select * from users";//select query for viewing users.  
            $run=mysqli_query($db,$view_users_query);//here run the sql query.  
            
            while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
            {  
                $user_id=$row[0];  
                $user_name=$row[1];
                $user_fname=$row[2];
                $user_lname=$row[3];  
                $user_email=$row[4];  
                $user_pass=$row[5];
                $user_profileimg=$row[6];
                $user_date=$row[7];  
            ?>  
      
            <tr>  
    <!--here showing results in the table -->  
                <td><?php echo $user_id;  ?></td>  
                <td><?php echo $user_name;  ?></td>
                <td><?php echo $user_fname;  ?></td>
                <td><?php echo $user_lname;  ?></td>  
                <td><?php echo $user_email;  ?></td>  
                <td><?php echo $user_pass;  ?></td>
                <td><?php if($user_profileimg!=''){?><img class="prdimg" src= "../assets/img/avatar/<?php echo $user_profileimg;?>" height="50" width ="50"><?php }?></td>
                <td><?php echo $user_date;  ?></td>

                <td><a href="Delete.php?del=<?php echo $user_id ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->  
            </tr>  
      
            <?php } ?>  
      
        </table>  
    </div>  
</div>  
    
<hr>   
<div class="table-scrol">          
    <h1 align="center">All the Products</h1> 
    <h1 id="add" align="center">Register New products
    <a id="ClickMe" href="Add.php">Click me</a>
</h1>  
<hr>

        <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
        <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
            <thead>  
            <tr>  
                <th>Id</th>  
                <th>Code</th> 
                <th>Name</th>
                <th>Description</th>  
                <th>Price</th> 
                <th>Image</th>
                <th>Detail image</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Created By</th>
                <th>Updated By</th>
                <th>Edit </th> 
                <th>Delete</th> 
                
            </tr>  
            </thead>

    <?php  
            $count=1;
            $view_product_query="select * from products ORDER BY id desc";//select query for viewing users.  
            $run=mysqli_query($db,$view_product_query);//here run the sql query.  
      
      
            while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
            {  
                $product_id=$row['id'];  
                $product_code=$row['code']; 
                $product_description=$row['description']; 
                $product_name=$row['name'];  
                $product_price=$row['price'];
                $product_img=$row['image'];
                $product_detail_img=$row['detail_image'];
                $product_CD=$row['creation_date'];
                $product_MD=$row['modification_date'];
                $submittedby=$row['submittedby'];
                $editedby=$row['editedby'];                
            ?>  
            <tr>  
    <!--here showing results in the table -->  
                <td><?php echo $product_id;  ?></td>  
                <td><?php echo $product_code;  ?></td> 
                <td><?php echo $product_name;  ?></td>
                <td><?php echo $product_description;  ?></td>  
                <td><?php echo $product_price;  ?></td> 
            <td><?php if($product_img!=''){?><img class="prdimg" src= "../assets/img/product/<?php echo $product_img;?>" height="50" width ="50"><?php }?></td>  
                <td><?php if($product_detail_img!=''){?><img class="prdimg" src= "../assets/img/product/<?php echo $product_detail_img;?>" height="50" width ="50"><?php }?></td>  
                <td><?php echo $product_CD;  ?></td>
                <td><?php echo $product_MD;  ?></td>
                <td><?php echo $submittedby;  ?></td>
                <td><?php echo $editedby;  ?></td>
                <td><a href="Edit.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-danger">Edit</button></a></td>
                <td><a href="Delete.php?del2=<?php echo $product_id ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
            </tr>  
      
            <?php $count++; } ?>  
        </table>  
    </div>  
</div>

<hr>   
<div class="table-scrol">          
    <h1 align="center">All the Blogs</h1> 
    <h1 id="add" align="center">Here to Edit Blogs
</h1>  
<hr>

        <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
        <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
            <thead>  
            <tr>  
                <th>Id</th>  
                <th>Title</th> 
                <th>Image</th>
                <th>Description</th>
                <th>User_ID</th>  
                <th>Created At</th>
                <th>Delete</th> 
                
            </tr>  
            </thead>

    <?php  
            $count=1;
            $view_product_query="select * from blogs ORDER BY id desc";//select query for viewing users.  
            $run=mysqli_query($db,$view_product_query);//here run the sql query.  
      
      
            while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
            {  
                $blog_id=$row['id'];  
                $blog_title=$row['title'];
                $blog_img=$row['image'];
                $blog_description=$row['description'];
                $blog_user=$row['user_id'];  
                $blog_CD=$row['created_at'];        
            ?>  
            <tr>  
    <!--here showing results in the table -->  
                <td><?php echo $blog_id;  ?></td>  
                <td><?php echo $blog_title;  ?></td>
                <td><?php if($blog_img!=''){?><img class="prdimg" src= "../assets/img/blog/<?php echo $blog_img;?>" height="50" width ="50"><?php }?></td>
                <td><?php echo $blog_description;  ?></td>
                <td><?php echo $blog_user;  ?></td>
                <td><?php echo $blog_CD;  ?></td>  
                <td><a href="Delete.php?del3=<?php echo $blog_id ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
            </tr>  
      
            <?php $count++; } ?>  
        </table>  
    </div>  
</div>

<hr>


<footer id= "main-footer">
    <p>Copyright &copy; 2018 Issa Tech. All Rights Reserved, Website Architecture by Kamal Issa.</p>
</footer>
</body>  
</html>

