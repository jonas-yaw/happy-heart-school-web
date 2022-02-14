<?php

if (isset($_POST['update'])) {
    $topicID = $_POST['update'];
    $topic = $_POST['topic-edit'];
    $description = $_POST['description-edit'];


    $sql = "update forum
    set topic = $topic,description= $description
    where topicid='$topicID';";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "SQL statement failed";
    }else {
        mysqli_stmt_execute($stmt);
        header("location:admin.php?edit= success");
    }

}

?>
