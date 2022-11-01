<?php 
include('../db.php');
session_start();
if(!isset($_SESSION['user']['id']))exit(json_encode(array('res'=>'login')));
mysqli_query($con,"delete from orders where user_id=".$_SESSION['user']['id']);
echo json_encode(array('res'=>'ok'));
?>