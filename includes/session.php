<?php  

//redirect function called later
 function redirect_to2($new_location){
    header("Location:" .$new_location);
    exit;   }

	session_start();
		function logged_in() {
		return isset($_SESSION['username']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to2("login.php");
		}
	}
	
	
 function dosomething()
{
	
	
}
	
	confirm_logged_in() 
?>
