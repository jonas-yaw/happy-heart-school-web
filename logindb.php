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
        echo '<div class="inns">
          <p>Failed to login. Either password or email was entered incorrectly.</p>
        </div>';
    }

}

$conn->close();

?>
