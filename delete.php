<?php

include_once "includes/db.php";

if (isset($_POST['delete'])) {
$topicID = $_POST['delete'] ;


$sql = "DELETE from forum
where topicid='$topicID';";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt,$sql)) {
  echo "SQL statement failed";
}else {
    mysqli_stmt_execute($stmt);
    header("location:admin.html?delete= success");
}


}

 ?>
