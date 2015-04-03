<?php

require('db.php');

function updateFirstLastName($id, $firstName, $lastName) {

	if(mysql_query("UPDATE info SET first_name = '$firstName', last_name = '$lastName' WHERE id = '$id'"))
		return true;
	else
		return false;	
}

function updateAboutMe($id, $aboutMe) {

	if(mysql_query("UPDATE info SET about_me = '$aboutMe' WHERE id = '$id'"))
		return true;
	else
		return false;	
}

function updateLocation($id, $city, $state) {

	if(mysql_query("UPDATE info SET city = '$city', state = '$state' WHERE id = '$id'"))
		return true;
	else
		return false;	
}

function updateBirthday($id, $birthday){

	if(mysql_query("UPDATE info SET birthday = '$birthday' WHERE id = '$id'"))
		return true;
	else
		return false;	
}

function updateProfilePicture($id, $tmpName, $ext){

	if(move_uploaded_file($tmpName, "userimages/".$id.".".$ext) && mysql_query("UPDATE info SET profile_ext = '$ext' WHERE id = '$id'"))
		return true;
	else
		return false;	
}

function resetProfilePicture($id, $ext){

	if(unlink("userimages/".$id.".".$ext) && mysql_query("UPDATE info SET profile_ext = '' WHERE id = '$id'"))
		return true;
	else
		return false;	
}

function resetPassword($username, $password){
	if(mysql_query("UPDATE info SET password = '$password' WHERE username = '$username'"))
		return true;
	else
		return false;	
}

function time_stamp($time){

	$time_difference = time() - $time;
	$seconds = $time_difference;
	$mins = round($time_difference / 60);
	$hours = round($time_difference / 3600);
	$days = round($time_difference / 86400);
	$weeks = round($time_difference / 604800);
	$months = round($time_difference / 2419200);
	$years = round($time_difference / 29030400);
	
	if($seconds <=2) { echo "2 seconds ago";}
	else if($seconds <=10) { echo "few seconds ago"; }
	else if($seconds <=60) { echo "$seconds seconds ago"; }
	else if($mins <=60) {	
		if($mins ==1) {
			echo "one minute ago";
		} else {
		
			echo "$mins minutes ago";
		}
	}
	else if($hours <=24) {
		
		if($hours ==1) {
			echo "one hour ago";
		} else {
		
			echo "$hours hours ago";
		}
	}	
	else if($days <=7) {
		
		if($days ==1) {
			echo "one day ago";
		} else {
		
			echo "$days days ago";
		}
	}
	
	else if($weeks <=4) {
		
		if($weeks ==1) {
			echo "one week ago";
		} else {
		
			echo "$weeks weeks ago";
		}
	}
	else if($months <=12) {
		
		if($months ==1) {
			echo "one month ago";
		} else {
		
			echo "$months months ago";
		}
	}
	else {
		
		if($years ==1) {
			echo "one year ago";
		} else {
		
			echo "$years years ago";
		}
	}

}


?>