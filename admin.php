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
                <p>Admin</p>
            </div>
            <!-- add new topic and comments -->
            <div class="topic-div">
                <p class="inner-title">Add new topic</p>
                <form class="topics"
                    method='POST' 
                    action = 'forumdb.php'
                    name = 'topic-form'
                    onsubmit="return validateForumForm()"
                >
                    <div class="message-wrap">
                        <input type="text" name="topic-title" id="topic-title" placeholder="topic">
                        <textarea name="description" id="comment-message" rows="3" placeholder="Type topic description here"></textarea>
                    </div>
                    <div class="mg-top30">
                        <button type="submit" class="submit-btn" name='new-forum'>
                            submit
                        </button>
                        
                    </div>
                </form>                                     
            </div>  
            
            <!-- read -->
            <div class="all-topics">
                <div>
                    <table>
                        <tr>
                            <th>id</th>
                            <th>topic</th>
                            <th></th>
                            <th></th>
                        </tr>

                    <?php
                    include_once 'includes/db.php';

                    $sql = "SELECT * FROM forum;";

                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt,$sql)) {
                        echo "SQL statement failed";
                    }else {

                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        $rowCount = mysqli_num_rows($result);
                        if ($rowCount==0) {
                        echo '<div class="empty">
                        <p>Oops, there are no topics.</p>
                        </div>';
                        }else{

                        while ($row = mysqli_fetch_assoc($result)) {
                        echo ' 
                        <tr>
                            <td>'.$row["id"].'</td>
                            <td>'.$row["topic"].'</td>
                            <td>
                                <form action="edittopic.php" method="post">
                                    <button type="submit" name="edit" value='.$row["id"].' class="edit-btn">edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="delete.php" method="post">
                                    <button type="submit" name="delete" value='.$row["id"].' class="forum-delete-btn">delete</button>
                                </form>
                            </td>
                        </tr>';
                        }
                    }


                    }

                    ?>
                    
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="javascript/main.js"></script>
    <script src="javascript/add-in.js"></script>

</body>
</html>

