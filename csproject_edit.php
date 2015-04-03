<?php
include('db.php');
include ('csproject_required.php'); // session start is inside this require.php
include('functions.php');

$userid = $_SESSION['id']; // from the logged.php, we use the session id, same as id itself.

if(!isset($_SESSION['id'])) 							// if it is not logged in
	header("location: csproject_registration_page.php"); // ask user to login.

$fetch = mysql_query("SELECT * FROM info WHERE id = '$userid'");


$fetch2 = mysql_fetch_assoc($fetch);		
		$username = $fetch2['username'];
		$firstname = $fetch2['first_name'];
		$lastname = $fetch2['last_name'];
		$password = $fetch2['password'];
		$profileext = $fetch2['profile_ext'];
		$aboutme = $fetch2['about_me'];
		$birthday = $fetch2['birthday'];
		$city = $fetch2['city'];
		$state =$fetch2['state'];
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Profile</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>

		<!-- for PHP and jQuery-->
		<script src = "register.js"></script>
		<script src = "login.js"></script>
		<script type = "text/javascript" src="jquery-1.11.1.js"></script>
		<!---->


		<script src="js/skel-panels.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		
		<!-- Start css3menu.com  -->

		<link rel="stylesheet" href="INDEX_files/css3menu0/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>

		<!-- End css3menu.com  -->

</head>
	<body class="subpage">
	
		<!-- Header -->
			<div id="header-wrapper">
				
			<!-- Start css3menu -->

			<ul id="css3menu0" class="topmenu">

				<li class="topfirst"><a href="index.html" style="height:20px;line-height:20px;">Home</a></li>

				<li class="topmenu"><a href="#" style="height:20px;line-height:20px;"><span>About</span></a>

					<ul>

						<li><a href="Bio.html">Bio</a></li>

						<li><a href="Resume.html">Resume</a></li>
					</ul>
				</li>

				<li class="topmenu"><a href="#" style="height:20px;line-height:20px;"><span>Time</span></a>

				<ul>

					<li><a href="ClockPage.html">Clock</a></li>

					<li><a href="CalendarPage.html">Calendar</a></li>

					<li><a href="Countdown.html">Countdown</a></li>

				</ul></li>

				<li class="topmenu"><a href="#" style="height:20px;line-height:20px;"><span>Projects</span></a>

				<ul>

					<li><a href="#"><span>Java Codes</span></a>

					<ul>

						<li><a href="Hash Tables.html">Hash Tables</a></li>

						<li><a href="Array List.html">Array List</a></li>

						<li><a href="Linked Lists.html">Linked Lists</a></li>

						<li><a href="Stacks.html">Stacks</a></li>

						<li><a href="Queues.html">Queues</a></li>

						<li><a href="#"><span>Sorting</span></a>

							<ul>

								<li><a href="Bubble Sort.html">Bubble Sort</a></li>

								<li><a href="Selection Sort.html">Selection Sort</a></li>

								<li><a href="Merge Sort.html">Merge Sort</a></li>

								<li><a href="Shell Sort.html">Shell Sort</a></li>

								<li><a href="Heap Sort.html">Heap Sort</a></li>

								<li><a href="Insertion Sort.html">Insertion Sort</a></li>
								
								<li><a href="Quick Sort.html">Quick Sort</a></li>

								<li><a href="Radix Sort.html">Radix Sort</a></li>

							</ul>
						</li>

					</ul></li>

					<li><a href="#"><span>Games</span></a>

					<ul>

						<li><a href="jigsaw puzzle.html">Jigsaw Puzzle</a></li>

						<li><a href="sliding blocks.html">Sliding Blocks</a></li>

						<li><a href="Poker.html">Poker</a></li>

					</ul></li>

			</ul></li>

				<li class="toplast"><a href="csproject_registration_page.php" style="height:20px;line-height:20px;">
				Sign Up</a>
				</li>

			</ul>

			<!-- End css3menu -->

<header id="header" class="container">
					<div class="row">
						<div class="12u">

							<!-- Logo -->
								<h1><a href="#" id="logo">Tiffany</a></h1>
							
							<!-- Nav -->
							

						</div>
					</div>
				</header>
			</div>

		<!-- Content -->
			<div id="content-wrapper">
				<div id="content">
					<div class="container">
						<div class="row">
							<div class="12u">
							
								<!-- Main Content -->
									<section>
										<header>
										<nav class="horizontal"> 
									
										</nav> 
										
										</header>
										
										<p> <font size="5px" face="Calibri"> 
									
											<div style ="margin-left: 2em; font-size: 18px;">
								
											<div style = "font-weight: bold; font-size: 40px">Update Your Profile</div>	
											<br>
											<br>
											<br>
											<div style = "font-weight: bold; font-size: 30px">Picture</div>
											<br>
											Allowed Extensions: *.jpg *.jpeg *.png<br>
											<form action = "csproject_edit.php?update=profilePicture" method = "POST" enctype = "multipart/form-data">
												<input type = "file" name = "profilePicture">
												<input type = "submit" name = "profilePictureSubmit" value = "Change Picture"> 
											</form>

											<!-- Reset Profile Picture -->	
											<?php 
												if($profileext != "") { ?>
												<form action = "csproject_edit.php?update=resetProfilePictureStep1" method = "POST">
													<input type = "submit" name = "profilePictureStep1Submit" value = "Reset"> 
												</form>
											<?php 
												} ?>

											<?php if(isset($_GET['update']) && $_GET['update']== "resetProfilePictureStep1"){ ?>
												<form action = "csproject_edit.php?update=resetProfilePictureStep2" method = "POST">
													<input type = "hidden" name = "resetProfilePictureID" value = "<?php echo $userid; ?>">
													This will permanently delete the image from the server. Please confirm.
													<input type = "submit" name = "profilePictureStep2Submit" value = "Confirm Reset"> 
												</form>
											<?php } ?>

											<?php
												if(isset($_GET['update']) && $_GET['update']== "profilePicture"){
													$type = $_FILES["profilePicture"]["type"];
													$size = $_FILES["profilePicture"]["size"];
													
													$errors = array();
													if($type == "image/jpeg" || $type == "image/jpg" || $type = "image/png") {
														$explode = explode(".", $_FILES["profilePicture"]["name"]);
														$ext = end($explode);
													}
													else	
														$errors[] = "File Format Not Allowed!";
												
													if($size > 5242880)
														$errors[] = "File Size Too Big! 5MB Limit";
													
													if(empty($errors)){
														if(updateProfilePicture($userid, $_FILES["profilePicture"]["tmp_name"], $ext))
															echo '<font style = "color: yellow">'. "Updated!". '</font>';
														else
															echo "An Error Has Occured!";
													} else {
														foreach($errors as $e)
															echo $e. "<br>";
													}
												}
												if(isset($_GET['update']) && $_GET['update']== "resetProfilePictureStep2"){

													$id = mysql_real_escape_string($_POST['resetProfilePictureID']);
													if(resetProfilePicture($userid, $profileext))
														echo '<font style = "color: yellow">'. "Updated!". '</font>';
													else
														echo "An Error Has Occured!";
												}

											?>
											<br>
											<br>
											<div style = "font-weight: bold; font-size: 30px">How do you want your name displayed in your profile?</div>
											<br>
											<form action = "csproject_edit.php?update=name" method = "POST">
												First Name: <input type = "text" name = "fName" maxlength = "30" value="<?php echo $firstname; ?>">
												Last Name: <input type = "text" name = "lName" maxlength = "30" value="<?php echo $lastname; ?>">	
												<input type = "submit" name = "nameSubmit" value = "Update"> 
											</form>
											<br>
											<?php
												if(isset($_GET['update']) && $_GET['update']== "name"){
													$firstName = mysql_real_escape_string($_POST['fName']);
													$lastName = mysql_real_escape_string($_POST['lName']);
													$errors = array();
													if(strlen($firstName) > 30)
														$errors[] = "Your first name is too long";
													if(strlen($lastName) > 30)
														$errors[] = "Your last name is too long";

													if(empty($errors)) {

														if(updateFirstLastName($userid, $firstName, $lastName))
															echo '<font style = "color: yellow">'. "Updated!". '</font>';
														else
															echo 'An Error Has Occured!';

													} else {
														foreach($errors as $e)
															echo $e. "<br>";
													}
												}
											?>

											<form action = "csproject_edit.php?update=aboutMe" method = "POST">
												<div style = "font-weight: bold; font-size: 30px">What would you like to share about your self?</div>
												<br> 
												<textarea name = "aboutMe" rows = "5" cols ="100" maxlength = "300">
													<?php echo $aboutme; ?>
												</textarea>
												<input type = "submit" name = "aboutMeSubmit" value = "Update"> 
											</form>
											<br>
											<?php
												if(isset($_GET['update']) && $_GET['update']== "aboutMe"){
													$aboutMe = mysql_real_escape_string($_POST['aboutMe']);
													
													$errors = array();
													if(strlen($aboutMe) > 1000000)
														$errors[] = "Your about me is too long";
													
													if(empty($errors)) {
														if(updateAboutMe($userid, $aboutMe))
															echo '<font style = "color: yellow">'. "Updated!". '</font>';
														else
															echo 'An Error Has Occured!';

													} else {
														foreach($errors as $e)
															echo $e. "<br>";
													}
												}
											?>
					
											<form action = "csproject_edit.php?update=birthday" method = "POST">
												<div style = "font-weight: bold; font-size: 30px">When is your birthday?</div><br>
												Age: <input type="date" name="birthdate">
											<input type = "submit" name = "birthdaySubmit" value = "Update"> 
											</form>

											<br>

											<?php
												if(isset($_GET['update']) && $_GET['update']== "birthday"){
													//$day = $_POST['day'];
													//$month = $_POST['month'];
													//$year = $_POST['year'];
													//$birthday = mktime(0,0,0,$month, $day,$year);
													$birthday = $_POST['birthdate'];
													$date = date_create($birthday);
													$birthday2 = date_format($date, 'U');
												
													if(updateBirthday($userid, $birthday2)) 
														echo '<font style = "color: yellow">'. "Updated!". '</font>';
													else "An Error Has Occured!";

												}

											?>
											<form action = "csproject_edit.php?update=location" method = "POST">
												<div style = "font-weight: bold; font-size: 30px">Where is your location?</div><br>
												City: 
												<input type = "text" name = "city" maxlength = "40" value="<?php echo $city; ?>">&nbsp;
												State:
												<input type = "text" name = "state" maxlength = "40" value="<?php echo $state; ?>">
											<input type = "submit" name = "cityStateSubmit" value = "Update"> 
											</form>	
											<br>
											<?php
												if(isset($_GET['update']) && $_GET['update']== "location"){
													$city = mysql_real_escape_string($_POST['city']);
													$state = mysql_real_escape_string($_POST['state']);
													$errors = array();
													if(strlen($city) > 30)
														$errors[] = "Your city name is too long";
													if(strlen($state) > 30)
														$errors[] = "Your country name is too long";

													if(empty($errors)) {

														if(updateLocation($userid, $city, $state))
															echo '<font style = "color: yellow">'. "Updated!". '</font>';
														else
															echo "An Error Has Occured!";

													} else {
														foreach($errors as $e)
															echo $e. "<br>";
													}
												}
											?>
											<br>
											<br>

											<a href= "csproject_profile.php" class = "button">Done editing</a>
											<a href= "csproject_logout.php" class = "button">Logout</a>
											
											<br>
											<br>
											<style>
											
											.button {
											display: inline;
											width: 200px;
											height: 25px;		
											border: 1px solid black;
											padding: 10px;
											text-align: center;
											border-radius: 5px;
											color: white;
											font-weight: bold;
											text-decoration: none;
											}
											</style>
											</div>


											<br><br>
										
										</p>
									<p><div align = "center"><a href="#"><img src ="images/top.png"/></a></div></p>		
									</section>
							</div>
						</div>
					</div>
				</div>
			</div>

		
			</div>

			<div id="copyright" style="font-size: 18px; height: 0px;" >
				&copy; Untitled. All rights reserved. | Tiffany </a> | CS 599 - Final Project 2014
			</div>
	</body>
</html>