<?php
session_start();
if(!isset($_SESSION["admin_name"])){
header("Location: A_login.php");
exit(); }
?>
