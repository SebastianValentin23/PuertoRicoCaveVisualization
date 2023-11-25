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
		<title>Puerto Rico Cave Visualization</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">
			<!-- Header -->
			<div id="header">
				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li><a href="admin-create-cave.php">Cave Creation</a></li>
                        <?php
                        /*if (isset($_SESSION["authorization"])) {
								if ($_SESSION["authorization"] == "master" || $_SESSION["authorization"] == "admin") {
									// User is logged in as master or admin, display "Admin Caves"
									echo '<li class="current"><a href="admin-caves.php">Admin Caves</a></li>';
								} elseif ($_SESSION["authorization"] == "publisher") {
									// User is logged in as publisher, do not display "Admin Caves"
								}
							}*/
						?>
						<li class="current"><a href="admin-caves.php">Admin Caves</a></li>
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
									echo '<li><a href="admin-contact-us.php">Admin Contact Us</a></li>';
								} elseif ($_SESSION["authorization"] == "publisher" || $_SESSION["authorization"] == "admin") {
									// User is logged in as admin or publisher, do not display "Admin Contact Us"
								}
							}*/
						?>	
						<li><a href="admin-contact-us.php">Admin Contact Us</a></li>
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
					<div class="row gtr-200">
						<div class="col-4 col-12-narrower">
							<div id="sidebar">
							<!-- Sidebar -->
								<section>
									<form id="caveForm">
										<h4>Search by Name:</h4>
										<input type="text" id="caveNames" name="caveName">
										<br>
										<h4>Town:</h4>
										<select id="town" name="town">
											<option value="">Select a Town</option>
											<option value="Arecibo">Arecibo</option>	
											<option value="Camuy">Camuy</option>
											<option value="Fajardo">Fajardo</option>
											<option value="Ponce">Ponce</option>
										</select>
										<br>
										<br>
										<fieldset>
											<h4>Biodiversity:</h4>
											<div><input type="checkbox" id="Guano"><label for="Guano">Guano</label></div>
											<div><input type="checkbox" id="Bacteria"><label for="Bacteria">Bacteria</label></div>
											<div><input type="checkbox" id="Algae"><label for="Algae">Algae</label></div>
											<div><input type="checkbox" id="Fungi"><label for="Fungi">Fungi</label></div>
											<div><input type="checkbox" id="Liches"><label for="Liches">Liches</label></div>
											<div><input type="checkbox" id="Plants"><label for="Plants">Plants</label></div>
											<div><input type="checkbox" id="Protozoans"><label for="Protozoans">Protozoans</label></div>
											<div><input type="checkbox" id="Porifera"><label for="Porifera">Porifera</label></div>
											<div><input type="checkbox" id="Cnidarians"><label for="Cnidarians">Cnidarians</label></div>
											<div><input type="checkbox" id="Platyhelminthes"><label for="Platyhelminthes">Platyhelminthes</label></div>
											<div><input type="checkbox" id="Nemertina"><label for="Nemertina">Nemertina</label></div>
											<div><input type="checkbox" id="Gastrotricha"><label for="Gastrotricha">Gastrotricha</label></div>
											<div><input type="checkbox" id="Kinorhyncha"><label for="Kinorhyncha">Kinorhyncha</label></div>
											<div><input type="checkbox" id="Nematoda"><label for="Nematoda">Nematoda</label></div>
											<div><input type="checkbox" id="Annelida"><label for="Annelida">Annelida</label></div>
											<div><input type="checkbox" id="Mollusca"><label for="Mollusca">Mollusca</label></div>
											<div><input type="checkbox" id="Brachiopoda"><label for="Brachiopoda">Brachiopoda</label></div>
											<div><input type="checkbox" id="Bryozoa"><label for="Bryozoa">Bryozoa</label></div>
											<div><input type="checkbox" id="Curstacea"><label for="Curstacea">Curstacea</label></div>
											<div><input type="checkbox" id="Chelicerata"><label for="Chelicerata">Chelicerata</label></div>
											<div><input type="checkbox" id="Onychophora"><label for="Onychophora">Onychophora</label></div>
											<div><input type="checkbox" id="Tardigrada"><label for="Tardigrada">Tardigrada</label></div>
											<div><input type="checkbox" id="Myriapoda"><label for="Myriapoda">Myriapoda</label></div>
											<div><input type="checkbox" id="Insecta"><label for="Insecta">Insecta</label></div>
											<div><input type="checkbox" id="Pisces"><label for="Pisces">Pisces</label></div>
											<div><input type="checkbox" id="Amphibians"><label for="Amphibians">Amphibians</label></div>
											<div><input type="checkbox" id="Reptilia"><label for="Reptilia">Reptilia</label></div>
											<div><input type="checkbox" id="Aves"><label for="Aves">Aves</label></div>
											<div><input type="checkbox" id="Mammalia"><label for="Mammalia">Mammalia</label></div>	
										</fieldset>
										<br>
										<input type="submit" value="Search">
										<br>
									</form>
								</section>
							</div>
						</div>
						<div class="col-8  col-12-narrower imp-narrower">
							<div id="content">
							<!-- Content -->
								<article>
									<header>
										<h2>Caves</h2>
										<p>Click on a cave to edit its information</p>
									</header>
									<table id="cavesTables">
										<tr>
											<th>Cave Name</th>
											<th>Town</th>
											<th>Biodiversity</th>
											<th>Cave Size (3D Model)</th>
											<th>Date Created</th>
										</tr>
										<tr>
											<td><a href="edit-cave.html">Mystic Cave</a></td>
											<td>Camuy</td>
											<td>Guano, Reptilia, Plants, Liches</td>
											<td>23.6 GB</td>
											<td>2023-10-12</td>
										</tr>
										<tr>
											<td><a href="edit-cave.html">Crystal Cave</a></td>
											<td>Camuy</td>
											<td>Curstecea, Algae </td>	
											<td>13.4 GB</td>
											<td>2023-09-25</td>
										</tr>
										<tr>
											<td><a href="edit-cave.html">Echo Cave</a></td>
											<td>Arecibo</td>
											<td>Guano, Insecta, Fungi</td>
											<td>10.1 GB</td>
											<td>2023-08-17</td>
										</tr>
										<tr>
											<td><a href="edit-cave.html">Glowing Grotto</a></td>
											<td>Fajardo</td>
											<td>Amphibians, Algae</td>
											<td>47.6 GB</td>
											<td>2023-07-05</td>
										</tr>
										<tr>
											<td><a href="edit-cave.html">Emerald Cavern</a></td>
											<td>Ponce</td>
											<td>Guano, Reptilia, Fungi</td>
											<td>23.2 GB</td>
											<td>2023-06-12</td>
										</tr>
									</table>											
								</article>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Footer -->
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