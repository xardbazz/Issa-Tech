<?php 
$id=$_REQUEST['id'];
include('../db.php');
session_start();
if(!isset($_SESSION['user']['id']))exit(json_encode(array('res'=>'login')));
mysqli_query($con,"delete from orders where id={$id}");
echo json_encode(array('res'=>'ok'));
?>