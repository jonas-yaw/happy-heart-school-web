<?php
session_start();

$loginID = $_POST["loginid"];
include_once 'includes/db.php';


if(!empty($loginID )){
    $sql = "SELECT * from parentsTable
    where loginID='$loginID'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if($row['loginID'] == $loginID){
        $_SESSION['userlogins'] = $row;
		$_SESSION['username'] = $row['firstname'];
        header("location:forum.php");
    }
    else{
        echo '<script>alert("Wrong LoginID. Contact School Administrator") </script>';
    }

}

$conn->close();

?>
