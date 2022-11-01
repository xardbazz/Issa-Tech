<?php
 // this will avoid mysql_connect() deprecation error.
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 
 define('DBHOST', 'localhost');
 define('DBUSER', 'root');
 define('DBPASS', '');
 define('DBNAME', 'issatech');
 
$db=mysqli_connect("localhost","root",""); 
 	mysqli_select_db($db,"issatech");  

$con = mysqli_connect("localhost","root","","issatech");

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}

if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

