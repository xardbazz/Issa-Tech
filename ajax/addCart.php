<?php 
$id=$_REQUEST['id'];
$qty=$_REQUEST['qty'];
include('../db.php');
session_start();
if(!isset($_SESSION['user']['id']))exit(json_encode(array('res'=>'login')));
$product=mysqli_fetch_array(mysqli_query($con,'select * from products where id='.$id));
$price=$product['price'];
if($product['discount_percentage']>0)$price=round($product['price']*(100-$product['discount_percentage'])/100,2);
$updates=mysqli_query($con,"select * from orders where user_id=".$_SESSION['user']['id']." and product_id={$id} and order_count=".$_SESSION['user']['order_count']);
if(mysqli_num_rows($updates))mysqli_query($con,"update orders set quality=quality+{$qty},price={$price} where id=".mysqli_fetch_array($updates)['id']);
else mysqli_query($con,"insert into orders (id,user_id,product_id,quality,price,order_count,created_at) values('','".$_SESSION['user']['id']."','{$id}','{$qty}','{$price}','".$_SESSION['user']['order_count']."','".date("Y-m-d H:i:s")."')");
echo json_encode(array('res'=>'ok'));
?>