<?php

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
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

    $sql = "INSERT INTO parentstable(firstname, lastname, eMail,phoneNumber,passcode)
                VALUES ('$parentname','$phoneNumber','$wardName','$loginID')";


    if ($conn->query($sql) === TRUE) {
    header("location:signup.html?newrecord= success");
   } else {
     echo '<div class="inns">
       <p>An account with these details already exist.</p>
     </div>';
    }
  }

}


$conn->close();

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


?>
