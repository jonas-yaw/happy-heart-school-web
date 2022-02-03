<?php require_once("includes/db.php"); ?>
<?php
 session_start();
 $usern=$_SESSION['username'];
// echo "$use
unset($_SESSION['username']);

	session_destroy();
	echo "<script type='text/javascript'> document.location = 'index.html'; </script>";
	//redirect_to2("login.php");
	

?>