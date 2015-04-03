<!DOCTYPE HTML>

<?php
include('db.php');
include('csproject_required.php');			// Show guestbook only if user has signed into his or her account.
include('functions.php');

if($_POST) {

  // ----------------------------Recaptcha verification -------------------------------------------- 
  require_once('recaptchalib.php');

  $privatekey = "6Lce5gMTAAAAAAp-4icgPzK4_45tOFfDohLZxv-Y";

  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {

  	die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." . "(reCAPTCHA said: " . $resp->error . ")");	

  } else {

		$id = $_SESSION['id'];
		$fetch = mysql_query("SELECT * FROM info WHERE id = '$id'");
		$fetch2 = mysql_fetch_assoc($fetch);
		$username = $fetch2['username'];
		$firstname = $fetch2['first_name'];
		$lastname = $fetch2['last_name'];

		if (isset($_POST['submit'])) {

			// Inserting a comment to the database 
			$comment = $_POST['comment'];	

			$time = time();
					
			$q = "INSERT INTO book (time, first_name, last_name, username, comment) VALUES ('$time', '$firstname', '$lastname', '$username', '$comment')";
			
			if (mysql_query($q)) {
				
			} else {
				die ("Insertion failed. ". mysql_error());
			}
			// Inserting comment ends.
		}    
  }

	// ------------------------------------------------------------------------------------------
}
?>

<html>
	<head>
		<title>Message Board</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script type = "text/javascript" src="jquery-1.11.2.js"></script><!-------------------------------------------------------------------------------->
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
				Sign Up</a></li>

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
			<div id="content-wrapper" style = "background: white">

				<div id="content" style = "background: white">
										
					<div class="container" style = "background: white">
						<div class="row" style = "background: white">

							<div class="12u" style = "background: white">
							
								<!-- Main Content -->
									
										<header>
										<nav class="horizontal">
										<div style = "margin-right: 120px;"> 
										<ul>
										<li style = "float: right; margin: 5px; width: 30%; display: inline;font-weight: bold; width: 160px; text-align: center;">
										<a href="csproject_logout.php">LOG OUT</a></li>
										
										<li style = "float: right; margin: 5px; width: 30%; display: inline;font-weight: bold; width: 160px; text-align: center;">
										<a href="csproject_profile.php">MY ACCOUNT</a></li>
											
										<li style = "float: right; margin: 5px; width: 30%; display: inline;font-weight: bold; width: 160px; text-align: center;">
										<a href="csproject_registration_page.php">JOIN &#124; 
										LOGIN</a></li>
										</ul>
										</div>

								
										<font size = "6em">Welcome to CS Project Guest Book!</font>


								       	<br>
								       	<br>
								       	You can post your comment.<br>
								        <!--Please <a href="csproject_registration_page.php">sign in</a> first to continue.-->
										</nav>
										</header>
							
										<p> 
										<div style = "font-weight: bold; margin-bottom: 15px">SHARE IT</div>
								
										

										<form action = "" method = "POST">

										<textarea name = "comment" style = "width: 400px; height: 120px; border: 1px solid #ccc; padding: 5px; font-size: 12px; font-family: verdana; 
										resize: none; outline: none; background: white; color: black"></textarea>

										<?php
										
										require_once('recaptchalib.php');
  										$publickey = "6Lce5gMTAAAAAPPMEbpWCK5GNhsjdJQqt3Rc5JcY"; 
  										echo recaptcha_get_html($publickey);

										?><input type = "submit" name="submit" value="Comment" style ="display: inline; color:white; background-color: green; cursor: pointer;">
										</form>
										<br>

										<hr>
										
										<?php

										// Display user comment.

										$q2 = "SELECT * FROM book ORDER BY time DESC";
										$res = mysql_query($q2);

									
										while ($row = mysql_fetch_array($res)){
											if($row['first_name'] != '' && $row['last_name'] != ''){
												echo '<div style = "font-weight: bold">'.$row['first_name'].' '.$row['last_name'].':</div>'.$row['comment'].'<br>';
												echo time_stamp($row['time']). '<br><br>';
											} else {
												echo '<div style = "font-weight: bold">'.$row['username']. '</div>:<br>' .$row['comment'].'<br><br>';
												echo time_stamp($row['time']). '<br><br>';
											}		
										}
										?>
									
										
									<br>
									<br>

									<style> 
									.recaptchatable, #recaptcha_area tr, #recaptcha_area td, #recaptcha_area th {
									line-height:0!important;
									.recaptcha_input_area{
									height: 30px!important;
									}
									</style>
									
									<br>
									<br>
									<br>
																
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