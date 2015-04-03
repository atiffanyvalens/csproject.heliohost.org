<?php

include('db.php');

$button = isset($_POST['mybutton']);
	
if($button){
	
	$username = stripslashes(htmlentities($_POST['username']));
	$password = stripslashes(htmlentities(md5($_POST['password'])));

	$checkuser = mysql_query("SELECT * FROM info WHERE username = '$username'");

	$num = mysql_num_rows($checkuser); // check the numbers of row where condition is true.

	if ($num > 0) {
		
		$checkpassword = mysql_fetch_assoc($checkuser);  //"SELECT * FROM info WHERE username = '$username' AND password = '$password'");
		$dbpassword = $checkpassword['password'];
	

		
		if ($password == $dbpassword) {

			// Get the id
			$id = $checkpassword['id'];
			session_start(); // start the session.
			$_SESSION['id'] = $id; // Session id  =  using the database id.
			// $uid = $id;
			header("location: csproject_profile.php");

		} else { 

			// $password and $dbpassword are the same.;
			header("location: csproject_registered_wrong_pass.php");
                }

	} else {
		
                // Check if the username has existed or not. Username is not registered.
                header("location: csproject_registered_wrong_username.php");
	}


} else {
	
	header("location: csproject_registration_page.php");
}

$button3 = isset($_POST['forgotPass']);
if($button3){

	header("location: csproject_forgot_pass.php");
}

?>