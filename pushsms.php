<?php
require_once("hubtel/Demo.php");
try {
				$messageResponse = $messagingApi->sendQuickMessage("Mo-Crane", "0541778545", "Hello, This is a test");

				if ($messageResponse instanceof MessageResponse) {
					
					echo $messageResponse->getStatus();
					
				} elseif ($messageResponse instanceof HttpResponse) {
					
					echo "\nServer Response Status : " . $messageResponse->getStatus();
					
				}
			} catch (Exception $ex) {
		echo $ex->getTraceAsString();
			}
			?>
			
			
			
			<?php
			//for email just use mail(to;subject,message,headers);
			
			
			//eg.
			//PHP MAILER
/******************************************************************************************
    $from = "info@richardoduro.com";
    $to = "chrappah2006@gmail.com";
    $subject = "$username Made a Transfer";
    $message = "$username made a transfer($items) from $from warehouse to $to";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
	//	echo "The email message was sent.";
    } else {
    //	echo "The email message was not sent.";
    }
************************************************************************/
    
				//PHP MAILER
			
			?>