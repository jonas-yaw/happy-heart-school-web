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

    <div>
      <?php

    //  require 'vendor/autoload.php';
    //  use PHPMailer\PHPMailer\PHPMailer;
      require_once("hubtel/Demo.php");

      include_once 'includes/db.php';

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $parentname = $_POST['parentname'];
          $phoneNumber = $_POST['phoneNumber'];
          $wardName = $_POST['wardName'];
          
          function generateRandomString($length = 3) {
              $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
              $charactersLength = strlen($characters);
              $randomString = '';
              for ($i = 0; $i < $length; $i++) {
                  $randomString .= $characters[rand(0, $charactersLength - 1)];
              }
              return $randomString;
          }
          $fourRandomDigit = rand(100,999);
          $randString = generateRandomString();
          
          $loginID = "{$randString}{$fourRandomDigit}";



          $sql = "SELECT * from parentstable";


          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt,$sql)) {
          echo "SQL statement failed";
          }else {

          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          $row = mysqli_fetch_assoc($result);

          $sql = "INSERT INTO parentstable(parentname, phoneNumber, wardName,loginID)
                      VALUES ('$parentname','$phoneNumber','$wardName','$loginID')";


          if ($conn->query($sql) === TRUE) {
          header("location:login.html?newrecord= success");
        } else {
          echo '<div class="inns">
            <p>An account with these details already exist.</p>
          </div>';
          }
        }

      }


      $conn->close();
/*
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
        $mail->addAddress('richard.oduro45@gmail.com', 'Richard');
        $mail->Subject = 'Parent login details';
        // $mail->msgHTML(file_get_contents('message.html'), __DIR__);
        $mail->Body = "Hi $parentname, Here is your login ID: $loginID";
        if (!$mail->send()) {
            // echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
        //    echo 'The email message was sent.';
        }
*/

        /* sms */
        try {
          $messageResponse = $messagingApi->sendQuickMessage("HHS", $phoneNumber, "Here is your login ID for Happy Heart School parents forum: $loginID");

          if ($messageResponse instanceof MessageResponse) {
            
            echo $messageResponse->getStatus();
            
          } elseif ($messageResponse instanceof HttpResponse) {
            
            echo "\nServer Response Status : " . $messageResponse->getStatus();
            
          }
        } catch (Exception $ex) {
          echo $ex->getTraceAsString();
        }


      ?>

    </div>

    <footer class="login-footer">
        <p>© 2022 SpecUp IT solutions. All Rights Reserved</p>
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