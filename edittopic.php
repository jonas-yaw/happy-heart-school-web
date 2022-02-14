<?php

  if (isset($_POST['edit'])) {
    $topicid = $_POST['edit'];
  }
?>

<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Happy Heart School</title>

    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- Bootstrap-->
    <link rel="stylesheet" href="stylesheet/bootstrap.css">

    <!-- Template Style-->
    <link rel="stylesheet" href="stylesheet/font-awesome.css"> 
    <link rel="stylesheet" href="stylesheet/animate.css">
    <link rel="stylesheet" href="stylesheet/style.css">
    <link rel="stylesheet" href="stylesheet/shortcodes.css">
    <link rel="stylesheet" href="stylesheet/jquery-fancybox.css">
    <link rel="stylesheet" href="stylesheet/responsive.css">
    <link rel="stylesheet" href="stylesheet/flexslider.css">
    <link rel="stylesheet" href="stylesheet/owl.theme.default.min.css">
    <link rel="stylesheet" href="stylesheet/owl.carousel.min.css">
    <link rel="stylesheet" href="stylesheet/jquery.mCustomScrollbar.min.css">

    <link href="image/hhs-logo-resized.png" rel="shortcut icon">
</head>
<body>
    <div class="admin-bg">
        <div class="admin-wrapper">
            <div class='admin-top-section'>
                <p><a href='./admin.php'>Admin</a> / Edit</p>
            </div>

      <div class='edit-form'>

        <?php
        include_once 'includes/db.php';

        $sql = "SELECT * FROM forum where id = $topicid;";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo "SQL statement failed";
        }else {

            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
              echo'
              <form 
              name="forum-edit-form"
              action="update.php" 
              method="post"
              onsubmit="return validateEditForumForm()"
              >
                  <input type="text" name="topic-edit" id="topic" value='.$row["topic"].'>
                  <textarea name="description-edit" id="description" cols="30" rows="10">'.$row["description"].'</textarea>
                  <button type="submit" name="update">edit</button>
              </form>
              ';
            }

        }
        ?>
      </div>
  

    </div>
  </div>

</body>
</html>



