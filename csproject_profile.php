<?php
include('db.php');
include ('csproject_required.php'); // session start is inside this require.php

$userid = $_SESSION['id']; // from the logged.php, we use the session id, same as id itself.

	// Add id to the user's profile URL address.
	if(!isset($_GET['id'])) header("Location: ?id=" .$userid);

$fetch = mysql_query("SELECT * FROM info WHERE id = '$userid'");
//$fetch2 = mysql_fetch_assoc($fetch);


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

				<li class="toplast">
				<a href="" style="height:20px;line-height:20px;">
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
										<font size = "18px">User Page</font>
										</nav> 
										
										</header>
										
										<p> <font size="5px" face="Calibri"> 
											
											<a href = "csproject_logout.php" class = "button">LOGOUT</a>
											<a href = "csproject_edit.php" class = "button">EDIT YOUR PROFILE</a>
											<br>
											<br>
											<style>
											
											.button {
											float: right;
											display: inline;
											width: 230px;
											margin-right: 30px;
											height: 25px;		
											border: 1px solid black;
											padding: 10px;
											text-align: center;
											border-radius: 5px;
											color: orange;
											font-weight: bold;
											text-decoration: none;
											}
											</style>
											<div style ="margin-left: 2em; font-size: 18px;">
												
											Hello, <?php echo "<b>".$username."</b>" ?>!<br><br>

											<div id = "profilePicture">
												<?php
													if($profileext == "")
														echo '<img src = "userimages/image.png">';
													else
														echo '<img src = "userimages/'.$userid.'.'.$profileext.'" width="250" 
													height = "250">';

												?>
											</div>
											<br>
											
											Name: <?php echo $firstname; ?>&nbsp;<?php echo $lastname; ?>	<br>
											Age: 

											<?php 

												// if time has not been edited, echo 0
												if($birthday == 0) {

													echo '';

												} else {


												$difference = time() - $birthday; // the difference in seconds.
												$age = floor($difference / 31556926);
												echo $age;
												}
											?>	

											<br>
											Location : <?php echo $city; ?>&nbsp;<?php echo $state; ?><br><br>
											
											<div style = "font-weight: bold;">About Me</div><br>
											<?php echo $aboutme; ?>
											<br>
											<br>

											<a href="guestbook.php" class = "button">LEAVE A COMMENT</a>
											</p>
										
											</div>
											
											
										
										</p>
									<p><!--div align = "center"><a href="#"><img src ="images/top.png"/></a></div--></p>		
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