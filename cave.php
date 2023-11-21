<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Caves template</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<?php require './db-requests/cave-request.php';?>
		<?php echo "<script>var model = '" . $cave["model_link"] . "'</script>" ?> 
	</head>
	
	<body class="is-preload">
		<div id="page-wrapper">
			<div id="header">
				<nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li class="current"><a href="search-cave.html">Caves</a></li>
						<li><a href="map.php">Map</a></li>
						<li><a href="">About Us</a></li>
						<li id="adminLink"><a href="admin-caves.html">Admin</a></li>
						<li id="creationLink"><a href="cave-creation.html">Cave Creation</a></li>
						<li id="loginLink"><a href="login-admin.html">Login</a></li>
						<li id="logoutLink" style="display: none;"><a href="#">Log Out</a></li>
					</ul>
				</nav>
			</div>	

			<!-- Content -->
			<div id="content">
				<article>
					<header>
						<h2><?php echo $cave["name"] ?></h2>
						<p><?php echo $cave["town"] ?></p>
					</header>
					<div class="model-viewer">
						<script type="module" src="/model.js"></script>
					</div>
					<header>
						<a href="/model-viewer.php?model=<?php echo $cave["model_link"];?>" target=”_blank”>Model</a>
						<h3>Biodiversity:</h3>
						<br>
						<p><!--ADD PHP CODE TO GRAB THE BIODIVERSITY --></p>
					</header>											
					<h3>Download Links:</h3>
						<ul class="links">
							<li><a href="cuevas/<?php echo $cave["download_link"];?>" download>LAZ format</a></li>
							<li><a href="cuevas/<?php echo $cave["model_link"];?>" download>PLY format</a></li>
						</ul>
				</article>
			</div>
			

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

	</body>
</html>