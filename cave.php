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
						<li class="current"><a href="search-cave.php">Caves</a></li>
						<li><a href="map.php">Map</a></li>
						<li><a href="contact-us.php">Contact Us</a></li>
						<li id="loginLink"><a href="admin-login.php">Admin</a></li>
					</ul>
				</nav>
			</div>	

			<!-- Content -->
			<section class="wrapper style1">
				<div class="container">
					<div id="content">
						<header>
							<h2><?php echo $cave["name"] ?></h2>
							<p><?php echo "Town: " . $cave["town"] ?></p>
						</header>
						
						<header>
							Click to preview <a href="/model-viewer.php?model=<?php echo $cave["model_link"];?>" target=”_blank”>Model</a> in a seperate window
						</header>	
						<br>
						<h3>Biodiversity:</h3>
						<p><?php if ($bio->num_rows > 0) { ; 
							while ($row = $bio->fetch_assoc()) {
								echo $row["type"] . ", ";
							}
						} ?></p>
						
						<h3>Download Links:</h3>
						<ul class="links">
							<li><a href="cuevas/<?php echo $cave["download_link"];?>" download>LAZ format</a></li>
							<li><a href="cuevas/<?php echo $cave["model_link"];?>" download>PLY format</a></li>
						</ul>
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

	</body>
</html>