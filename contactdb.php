<?php
 require 'vendor/autoload.php';
  use PHPMailer\PHPMailer\PHPMailer;
   require_once("hubtel/Demo.php");
   
   
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$studentClass = $_POST['studentClass'];

include_once 'includes/db.php';

$sql = "INSERT INTO admissionsTable (aName,Email,Phone,studentClass)
        VALUES (?,?,?,?);";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "SQL statement prep failed";
} else {
    mysqli_stmt_bind_param($stmt, "ssss",$Name,$Email,$Phone,$studentClass);
    mysqli_stmt_execute($stmt);
    
ini_set( 'display_errors', 1 );
   error_reporting(E_ALL);
   $mail = new PHPMailer;
   $mail->isSMTP();
   $mail->SMTPDebug = 2;
   $mail->Host = 'smtp.hostinger.com';
   $mail->Port = 587;
   $mail->SMTPAuth = true;
   $mail->Username = 'info@richardoduro.com';
   $mail->Password = 'Mother@2016';
   $mail->setFrom('info@richardoduro.com', 'Richard Oduro');
   $mail->addReplyTo('info@richardoduro.com', 'Richard Oduro');
   $mail->addAddress($Email, $Name);
   $mail->Subject = 'Happy Heart School Admission Form';
  // $mail->msgHTML(file_get_contents('message.html'), __DIR__);
   $mail->Body = "Hi $Name, Kindly find attached as requested.";
   if($studentClass=="CRECHE")
   {
 $mail->addAttachment('includes/preschool.pdf');
   }
    else if($studentClass=="NURSERY")
    { $mail->addAttachment('includes/Creche.pdf');}
   if (!$mail->send()) {
      // echo 'Mailer Error: ' . $mail->ErrorInfo;
   } else {
   //    echo 'The email message was sent.';
   }

try {
				$messageResponse = $messagingApi->sendQuickMessage("HHS", $Phone, "Happy Heart Admission Form has been sent to your email");

				if ($messageResponse instanceof MessageResponse) {
					
					echo $messageResponse->getStatus();
					
				} elseif ($messageResponse instanceof HttpResponse) {
					
					echo "\nServer Response Status : " . $messageResponse->getStatus();
					
				}
			} catch (Exception $ex) {
		echo $ex->getTraceAsString();
			}


}


?>


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
<body>
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>
    <div class="bg-header">
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
    <div class="course-grid">
        <div class="container-db-return">
            <p>Thank you for applying for admission. We will contact you soon.</p>
        </div>
    </div><!-- course-grid -->

    <footer id="footer" class="footer-type1">
        <div id="footer-widget">
            <div class="container">
                <div class="row  footer-row">
                    <div class="col-lg-3 col-footer">
                       <div class="logo-footer">
                           <div></div>
                       </div>
                    </div>
                    <div class="col-lg-2 col-company">
                        <h3 class="widget widget-title">
                            School
                        </h3>
                        <ul class="widget-nav-menu">
                            <li><a href="#">About School</a></li>
                            <li><a href="#">Classes</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-link">
                        <h3 class="widget widget-title">
                            Help Links
                        </h3>
                        <ul class="widget-nav-menu">
                            <li><a href="#">Apply</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Events</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-media">
                        <h3 class="widget widget-title">
                            Social Media
                        </h3>
                        <ul class="widget-social-media">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="bottom" class="bottom-type1 clearfix has-spacer">
            <div id="bottom-bar-inner" class="container">
                <div class="bottom-bar-inner-wrap">
                    <div class="bottom-bar-content">
                        <div id="copyright">
                            © 
                            <span class="text-year">
                                2022
                            </span>
                            <span class="text-name">
                                SpecUp IT solutions.
                            </span>
                            <span class="license">
                                <a href="#">All Rights Reserved</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a id="scroll-top" class="show"></a>
    </footer><!-- footer -->

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