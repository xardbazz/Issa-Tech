<?php
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 define('DBHOST', 'localhost');
 define('DBUSER', 'root');
 define('DBPASS', '');
 define('DBNAME', 'issatech');
 
 //define('DBHOST', 'localhost');
 //define('DBUSER', 'root');
 //define('DBPASS', '');
 //define('DBNAME', 'issatech');
 
$db=mysqli_connect("localhost","root",""); 
 	mysqli_select_db($db,"issatech");  
 	
$con = mysqli_connect("localhost","root","","issatech");
// Check connection
if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}

if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  function friendly_date($d){
    $d=explode(' ',$d)[0];
    $d=explode('-',$d);
    $month=explode(",",",Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec");
    return $d[2]." ".$month[$d[1]].", ".$d[0];
  }
  function friendly_day($d){
    $d=explode(' ',$d)[0];
    $d=explode('-',$d);
    return $d[2];
  }
  function friendly_month($d){
    $d=explode(' ',$d)[0];
    $d=explode('-',$d);
    $month=explode(",",",Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec");
    return $month[$d[1]];
  }
  function friendly_datetime($d){
    $d=explode(' ',$d);
    $t=explode(':',$d[1]);
    $d=explode('-',$d[0]);
    $month=explode(",",",Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec");
    return $d[2]." ".$month[$d[1]].", ".$d[0]." at ".($t[0]%12).":".$t[1].($t[0]<12?"pm":"am");
  }
?>