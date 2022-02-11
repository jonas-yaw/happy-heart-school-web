<?php

if (isset($_POST['update'])) {

    $sql = "update forum
    where topicid='$topicID';";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "SQL statement failed";
    }else {
        mysqli_stmt_execute($stmt);
        header("location:admin.html?edit= success");
    }

}

?>
