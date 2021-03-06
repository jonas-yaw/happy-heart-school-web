


<!DOCTYPE html>
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
<body id="login-body">
   <!-- <div id="loading-overlay">
        <div class="loader"></div>
    </div> -->
    <div class="login-header">
        <div class="flat-header-blog">
            <header class="header flat-header lh-header header-style5 clearfix">
                <div class="site-header-inner">
                    <div class="container">
                        <div id="logo" class="logo">
                            <h4>HAPPY HEART</h4>
                        </div>                        <div class="mobile-button"><span></span></div>
                        <div class="header-menu">
                            <nav id="main-nav" class="main-nav">
                                <ul class="menu">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="classes.html">Our classes</a></li>
                                    <li><a href="special-event.html">Special Event</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li class="nav-sing">
                                    <a class="sing-in" href="contact.html">Apply</a>
                                </li>
                                </ul>
                            </nav>
                        </div> 
                    </div>
                </div>
            </header>
            
        </div>
    </div><!-- bg-header -->

    <div class="wrapper">
        <div class="top-title">
            <p>Happy Heart School Parents Forum</p>
        </div><br>
		
		<div style=" display: flex; justify-content: center; align-items: center;"> <span id="invalid"  style="color:white; visibility:hidden"> Ooops!!Wrong LoginID. Contact School Administrator  </span> </div>
<?php
session_start();


if(isset($_POST['login']))
{
$loginID = $_POST["loginid"];
include_once 'includes/db.php';


if(!empty($loginID )){
    $sql = "SELECT * from parentsTable
    where loginID='$loginID'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if($row['loginID'] == $loginID){
        $_SESSION['userlogins'] = $row;
		$_SESSION['username'] = $row['loginID'];
        header("location:forum.php");
    }
    else{
            echo '<script type="text/javascript">  
		
		document.getElementById("invalid").style.visibility = "visible";
		
		 </script>';

    }

}

$conn->close();
}
?>

        <div class="form-wrapper">
            <div class="form-div">
                <form method="post" >
                    <input type="text" required="required" name="loginid" id="loginid" placeholder="Login ID">
                    <div class="submit-btn-div">
                        <button name="login">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <footer class="login-footer">
        <p>?? 2022 SpecUp IT solutions. All Rights Reserved</p>
    </footer>    
    
    
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/rev-slider.js"></script>
    <script src="javascript/plugins.js"></script>
    <script src="javascript/jquery-countTo.js"></script>
    <script src="javascript/jquery-ui.js"></script>
    <script src="javascript/jquery-fancybox.js"></script>
    <script src="javascript/flex-slider.min.js"></script>
    <script src="javascript/scroll-img.js"></script>
    <script src="javascript/owl.carousel.min.js"></script>
    <script src="javascript/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="javascript/parallax.js"></script>
    <script src="javascript/jquery-isotope.js"></script>
    <script src="javascript/equalize.min.js"></script>
    <script src="javascript/main.js"></script>
    <script src="javascript/app.js"></script>

    <!-- slider -->
    <script src="rev-slider/js/jquery.themepunch.tools.min.js"></script>
    <script src="rev-slider/js/jquery.themepunch.revolution.min.js"></script>

    <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.actions.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.carousel.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.kenburn.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.layeranimation.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.migration.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.navigation.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.parallax.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.slideanims.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.video.min.js"></script>
</body>
</html>