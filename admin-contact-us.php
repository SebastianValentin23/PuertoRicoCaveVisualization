<?php
 session_start();
?>
<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Messages</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />

        
	</head>
	<body class="is-preload">

		<div id="page-wrapper">
			<div id="header">
			<nav id="nav">
					<ul>
						<li ><a href="admin-cave-creation.php">Cave Creation</a></li>
                        <?php
                        /*if (isset($_SESSION["authorization"])) {
								if ($_SESSION["authorization"] == "master" || $_SESSION["authorization"] == "admin") {
									// User is logged in as master or admin, display "Admin Caves"
									echo '<li><a href="admin-caves.php">Admin Caves</a></li>';
								} elseif ($_SESSION["authorization"] == "publisher") {
									// User is logged in as publisher, do not display "Admin Caves"
								}
							}*/
						?>
						<li ><a href="admin-caves.php">Admin Caves</a></li>
                        <?php
                        /*if (isset($_SESSION["authorization"])) {
								if ($_SESSION["authorization"] == "master") {
									// User is logged in as master, display "Master Caves"
									echo '<li><a href="admin-caves-master.html">Master Caves</a></li>';
								} elseif ($_SESSION["authorization"] == "admin" || $_SESSION["authorization"] == "publisher") {
									// User is logged in as admin or publisher, do not display "Master Caves"
								}
							}*/
						?>
						<li><a href="admin-caves-master.php">Master Caves</a></li>
                        <?php
                        /*if (isset($_SESSION["authorization"])) {
								if ($_SESSION["authorization"] == "master") {
									// User is logged in as master, display "Admin Contact Us"
									echo '<li class="current"><a href="admin-contact-us.php">Admin Contact Us</a></li>';
								} elseif ($_SESSION["authorization"] == "publisher" || $_SESSION["authorization"] == "admin") {
									// User is logged in as admin or publisher, do not display "Admin Contact Us"
								}
							}*/
						?>	
						<li class="current"><a href="admin-contact-us.php">Admin Contact Us</a></li>
                        <?php
                        /*if (isset($_SESSION["authorization"])) {
								if ($_SESSION["authorization"] == "master") {
									// User is logged in as master, display "Create Account"
									echo '<li><a href="admin-login-creation.php">Create Account</a></li>';
								} elseif ($_SESSION["authorization"] == "admin" || $_SESSION["authorization"] == "publisher") {
									// User is logged in as admin or publisher, do not display "Create Account"
								}
							}*/
						?>
						<li><a href="admin-login-creation.php">Create Account</a></li>
                        <?php
                        /*if (isset($_SESSION["authorization"])) {
								if ($_SESSION["authorization"] == "master") {
									// User is logged in as master, display "Accounts"
									echo '<li><a href="admin-account-activation.php">Accounts</a></li>';
								} elseif ($_SESSION["authorization"] == "admin" || $_SESSION["authorization"] == "publisher") {
									// User is logged in as admin or publisher, do not display "Accounts"
								}
							}*/
						?>
						<li><a href="admin-account-activation.php">Accounts</a></li>
						<?php
							if (isset($_SESSION["email"])) {
								// User is logged in, display user's name
								echo '<li><a href="#">' . $_SESSION["name"] . '</a></li>';
							} else {
								// User is not logged in, display login link
								echo '<li><a href="admin-login.php">Login</a></li>';
							}
							
						?>					
						<?php
                        if (isset($_SESSION["email"])) {
                            // User is logged in, display User (logout) link
                            echo '<li><a href="admin-logout.php">User</a></li>';
                        } else {
                            // User is not logged in, display nothing                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                        }
                         ?>
					</ul>
				</nav>
			</div>

			<!-- Main -->
			<section class="wrapper style1">
				<div class="container">
					<div id="content">
					<!-- Content -->
						<article>
							<header>
								<h2>Solicitor list</h2>
							</header>

							<?php
								include 'db-requests/admin-contact-us-backend.php'
							?>
						</article>
					</div>
				</div>
			</section>

			<div id="footer">
				<div class="container">
					<div class="row">
						<section class="col-3 col-6-narrower col-12-mobilep">
							<h3>Related Websites</h3>
							<ul class="links">
								<li><a href="#">UPRA</a></li>
								<li><a href="#">Angel Acosta</a></li>
								<li><a href="#">CaveGeoMap</a></li>
							</ul>
						</section>
						<section class="col-6 col-12-narrower">
							<h3>Get In Touch</h3>
							<form>
								<div class="row gtr-50">
									<div class="col-6 col-12-mobilep">
										<input type="text" name="name" id="name" placeholder="Name" />
									</div>
									<div class="col-6 col-12-mobilep">
										<input type="email" name="email" id="email" placeholder="Email" />
									</div>
									<div class="col-12">
										<textarea name="message" id="message" placeholder="Message" rows="5"></textarea>
									</div>
									<div class="col-12">
										<ul class="actions">
											<li><input type="submit" class="button alt" value="Send Message" /></li>
										</ul>
									</div>
								</div>
							</form>
						</section>
					</div>
				</div>
				<!-- Icons -->
				<ul class="icons">
					<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
					<li><a href="#" class="icon brands fa-google-plus-g"><span class="label">Google+</span></a></li>
				</ul>
				<!-- Copyright -->
				<div class="copyright">
					<ul class="menu">
						<li>&copy; Puerto Rico Cave Visualization. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/config.js"></script>

	</body>
</html>