<?php

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