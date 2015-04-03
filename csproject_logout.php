<?php

session_start();

if(isset($_SESSION['id'])){
	
	session_destroy();
	header("location: csproject_registration_page.php");
	
} else {
	
	session_destroy();
	header("location: csproject_registration_page.php");
}

?>