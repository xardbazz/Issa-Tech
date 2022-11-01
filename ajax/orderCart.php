<?php 
include('../db.php');
session_start();
if(!isset($_SESSION['user']['id']))exit(json_encode(array('res'=>'login')));
mysqli_query($con,"update users set order_count=".($_SESSION['user']['order_count']+1)." where id=".$_SESSION['user']['id']);
mysqli_query($con,"insert into bills (id,bill_no,user_id,price,status,created_at) values('','".$_SESSION['user']['order_count']."','".$_SESSION['user']['id']."','".$_REQUEST['price']."','0','".date('Y-m-d H:i:s')."')");
$_SESSION['user']['order_count']=$_SESSION['user']['order_count']+1;
echo json_encode(array('res'=>'ok'));
?>