<?php require_once("includes/db.php"); 
//require_once("includes/session.php");
//$username=$_SESSION['username'] ?>

<?php
$val=$_GET['msg'];

$sender=$_GET['username'];
$timed=date("H:i:s");
$dated=date("Y-m-d");

$sele="INSERT INTO forum(message,dated,timed,sender) values('{$val}','{$dated}','{$timed}','{$sender}')";
$cc=mysqli_query($conn,$sele); 


 $data=array();
 $data['msg']=$val;
 $data['timed']=$timed;
 $data['sender']=$sender;
 $data['dated']=$dated; 
	echo json_encode($data);

?>

	
