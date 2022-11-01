<?php
include 'db.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>News</title>
<link rel='stylesheet' href='CSS/Style.css' type='text/css' media='all' />
</head>
<body>
<header>
 <a id="title"  href="index.php">Issa Tech</a>

 <div class="logReg">
 	<?php
 	
 	if(isset($_SESSION['username'])){
 		$user = $_SESSION['username'];
 	echo '<a id="lr" href="profile.php">Welcome '.$user.'!</a>
 	<a id="lr" href="logout.php">Logout</a>';
 }else{
 	echo '<a id="lr" href="login.php">Sign in</a>
 	<a id="lr" href="register.php">Register</a>';	}
 	?>
 </div>
 <ul class=topnav>
 	<li><a href="index.php">Home</a></li>
 	<li><a href="contact.php">Contact</a></li>
 	<li><a href="news.php">News</a></li>
 	<li><a href="shop.php">Shopping</a></li>
 </ul>
</header>

<footer id= "main-footer">
	<p>Copyright &copy; 2018 Issa Tech. All Rights Reserved, Website Architecture by Kamal Issa.</p>
</footer>

</body>
</html>
