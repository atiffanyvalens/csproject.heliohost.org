<?php

include('db.php');

$button = isset($_POST['mybutton2']);

// if button is pressed.
if($button) {

	$username = stripslashes(htmlentities($_POST['username2']));
	$password = stripslashes(htmlentities(md5($_POST['password2'])));

	// Check if the username is taken or not

	$check = mysql_query("SELECT * FROM info WHERE username = '$username'");
	$number = mysql_num_rows($check); // show the numbers of row of username is already there.

	if($number > 0){
		
		header("location: csproject_registered_username_taken.php");
	}
	// Storing in database

	else {

		$insert = mysql_query("INSERT into info (id, first_name, last_name, username, password, profile_ext, about_me, birthday, city, state) 
			VALUES ('', '', '', '$username', '$password', '', '', '', '', '')");

		if($insert){

                        // can not use echo to display message and then redirect the header, so we will just go to a new page.
			header("location: csproject_registered_login.php");
	
			
		} else {
			echo mysql_error();
		}
	}
} else {
	header("location:csproject_registration_page.php");
}
?>