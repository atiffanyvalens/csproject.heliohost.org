<?php

include('db.php');
include('functions.php');



$button4 = isset($_POST['retrievePass']);
	
if($button4){
	
	$username = stripslashes(htmlentities($_POST['username']));
	
	$checkuser = mysql_query("SELECT * FROM info WHERE username = '$username'");

	$num = mysql_num_rows($checkuser); // check the numbers of row where condition is true.

	if ($num > 0) {
		
		$res = mysql_fetch_assoc($checkuser);  // associative array.
		$dbpassword = $res['password'];	// stored in the password column in the database.
		
	} else {
		
                // Check if the username has existed or not. 
                // header("location: csproject_registered_wrong_username.php");
	}

}
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Registration
		</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>

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
			<div id="content-wrapper">
				<div id="content">
					<div class="container">
						<div class="row">
							<div class="12u">
							
								<!-- Main Content -->
									<section>
										<header>
										<nav class="horizontal"> 
										<font size = "10px" >Create Your User Profile</font>
										</nav> 
										
										</header>
										
										<p> <font size="5px" face="Calibri">  
											<br>
											<div style ="margin-left: 2em; font-size: 18px;">
											Join Us! Your User Profile would allow you to login to this website and have a cool page of your own.
											<br>
											<br>
											<font style = "color: yellow">Your encrypted password is "<?php echo $dbpassword; ?>" <br></font>
											If you would like to keep your old password, copy and paste your encrypted password to the box below 
											<br> the MD5 sum to reverse function and click "Reverse". <br><br>
											<iframe src="http://md5.gromweb.com/" width="820" height="460" scrolling="no">
											
											</iframe>
											<br>Once you have read your old password, you can now continue to login. <br><br>
											
											Click <a href = "csproject_registered_password_reset.php">Reset</a> if you want to use a different password.
											
											<br>
											
											<li style = "float: right; text-align: left; margin-right: 190px; width: 100%; display: inline; width: 500px; ">
											<br> <br><br>

											<!-- login form -->
											<form action = "csproject_logged.php" method = "POST">
												<b>Returning User</b>
												<br>
												<br>
												Username: <input type = "text" name = "username"><br><br>
												Password: <input type = "password" name = "password"><br><br>
												<input type = "submit" name = "mybutton"  value = "Log in">&nbsp;
												<input type = "submit" name = "forgotPass"  value = "Forgot password">
											</form>
											</li>
											<br>
											<br>
											<br>
											New User
											<br>
											<br>
											
											<form action = "csproject_register.php" method = "POST">
												Username:
												<input type = "text" name = "username2">
												<br><br>
												Password: <input type = "password" name = "password2">
												<br><br>
												<input type = "submit" name = "mybutton2" value = "Register">
											</form>
											</div>
											<br><br>
										
											
											
										</p>
									<p><div align = "center"><div align = "center"><a href="#"><img src ="images/top.png"/></a></div></p>		
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