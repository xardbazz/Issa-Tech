<?php
require('dbconnect.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from products where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" type="text/css" href="style.css" /> 
</head>
<body>
<div class="form">
<h1>Update Record</h1>
 <?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$product_MD = date("Y-m-d H:i:s");
$product_code =$_REQUEST['code'];
$product_name =$_REQUEST['name'];
$product_price =$_REQUEST['price'];
$editedby = $_SESSION["admin_name"];
$update="update products set modification_date ='".$product_MD."',code ='".$product_code."', name='".$product_name."', price='".$product_price."', editedby='".$editedby."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='A_View_users.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else{ ?>
<div> 
    <form name="form" method="post" action="">
			<input type="hidden" name="new" value="1" />
			<input name="id" type="hidden" value="<?php echo $row['id'];?>" /> 
            
            <p>
            	<input type="text" name="code" placeholder="Enter Code" required value="<?php echo $row['code'];?>" />
            </p>  
            <p>
            	<input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['name'];?>" />
            </p>  
            <p>
            	<input type="text" name="price" placeholder="Enter Price" required value="<?php echo $row['price'];?>" />
            </p>
            <p>
            	<input name="submit" type="submit" value="Update" />
            </p>      
    </form>
<?php } ?>
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



