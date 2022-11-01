<?php 
$id=$_REQUEST['id'];
$qty=$_REQUEST['qty'];
include('../db.php');
session_start();
if(!isset($_SESSION['user']['id']))exit(json_encode(array('res'=>'login')));
if($qty)mysqli_query($con,"update orders set quality={$qty} where id={$id}");
else mysqli_query($con,"delete from orders where id={$id}");
echo json_encode(array('res'=>'ok'));
?>