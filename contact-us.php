<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Login Creation</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css"/>
		<style>
        .error {
            color: red;
        }

        .success {
            color: green;
        }
    	</style>
	</head>
	<body class="is-preload">
		
	<?php
	include 'db-requests/contact-us-backend.php';
	?>

    
		<div id="page-wrapper">
			<div id="header">
				<nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="search-cave.php">Caves</a></li>
						<li><a href="map.php">Map</a></li>
						<li class="current"><a href="contact-us.php">Contact Us</a></li>
						<li id="loginLink"><a href="admin-login.php">Admin</a></li>
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
								<h2>Contact Us</h2>
							</header>
							<?php if ($message): ?>
								<p class="<?= $messageClass; ?>"><?php echo $message; ?></p>
							<?php endif; ?>

							<form action="contact-us.php" method="post">
							<input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>">

							<label for="name">Name:</label>
							<input type="text" id="name" name="name" required><br>

							<label for="last_name">Last Name:</label>
							<input type="text" id="last_name" name="last_name" required><br>

							<label for="email">Email:</label>
							<input type="email" id="email" name="email" required><br>

							<label for="subject">Subject:</label>
							<input type="text" id="subject" name="subject" required><br>

							<label for="use">Use:</label>
							<select id="use" name="use" required>
								<option value="" disabled selected>Select Use</option>
								<option value="Academia">Academia</option>
								<option value="Industry">Industry</option>
								<option value="Investigation">Investigation</option>
							</select><br>

							<label for="comment">Comment:</label>
							<textarea id="comment" name="comment" rows="4" required></textarea><br>

							<input type="submit" value="Submit">
						</form>
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