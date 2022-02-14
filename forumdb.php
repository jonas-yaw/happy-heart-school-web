<?php

include_once "includes/db.php";

if (isset($_POST['new-forum'])) {
$topic = $_POST['topic-title'] ;
$description = $_POST['description'] ;


$sql = "insert into forum(topic,description)
        values('$topic','$description')';";

if ($conn->query($sql) === TRUE) {
  header("location:admin.php?newrecord= success");
} else {
  echo '<div class="inns">
    <p>New record failed '. $description .'</p>
  </div>';
  }

}

 ?>