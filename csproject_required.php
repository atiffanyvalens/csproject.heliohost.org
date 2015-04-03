<?php

// Purpose: fill the page only if USER has logged into the page.

@session_start();

if(isset($_SESSION['id'])){
	

	
} else {
	// If user has not logged in.
	
	header("location: csproject_registration_page.php");

}

?>