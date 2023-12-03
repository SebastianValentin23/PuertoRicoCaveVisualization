<!DOCTYPE HTML>
<?php session_start(); ?>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Cave Creation</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<?php require './db-requests/admin-edit-backend.php';?>
	</head>
	<body class="is-preload">
		<div id="page-wrapper">
			<div id="header">
				<nav id="nav">
					<ul>
						<li><a href="admin-create-cave.php">Create Cave</a></li>
                        <li class="current"><a href="admin-caves-master.php">Cave List</a></li>
						<?php
                        	if (isset($_SESSION["authorization"])) {
								if ($_SESSION["authorization"] == "master") {
									// User is logged in as master or admin, display "Admin Contact Us"
									echo '<li><a href="admin-contact-us.php">Contact Us Logs</a></li>';
								} elseif ($_SESSION["authorization"] == "publisher" || $_SESSION["authorization"] == "admin") {
									// User is logged in as admin or publisher, do not display "Admin Contact Us"
								}
							}
							if (isset($_SESSION["authorization"])) {
								if ($_SESSION["authorization"] == "master") {
									// User is logged in as master, display "Logs"
									echo '<li><a href="admin-logs.php">Admin Activity Logs</a></li>';
								} elseif ($_SESSION["authorization"] == "publisher" || $_SESSION["authorization"] == "admin") {
									// User is logged in as admin or publisher, do not display "Admin Contact Us"
								}
							}
							if (isset($_SESSION["authorization"])) {
								if ($_SESSION["authorization"] == "master") {
									// User is logged in as master, display "Create Account"
									echo '<li><a href="admin-login-creation.php">Create Account</a></li>';
								} elseif ($_SESSION["authorization"] == "admin" || $_SESSION["authorization"] == "publisher") {
									// User is logged in as admin or publisher, do not display "Create Account"
								}
							}
							if (isset($_SESSION["authorization"])) {
								if ($_SESSION["authorization"] == "master") {
									// User is logged in as master, display "Accounts"
									echo '<li><a href="admin-account-activation.php">Accounts</a></li>';
								} elseif ($_SESSION["authorization"] == "admin" || $_SESSION["authorization"] == "publisher") {
									// User is logged in as admin or publisher, do not display "Accounts"
								}
							}
							if (isset($_SESSION["email"])) {
								// User is logged in, display user's name
								echo '<li><a href="#">' . $_SESSION["name"] . '</a></li>';
							} else {
								// User is not logged in, display login link
								echo '<li><a href="admin-login.php">Login</a></li>';
							}
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
								<?php if ($message): ?>
									<p class="<?= $messageClass; ?>"><?php echo $message; ?></p>
								<?php endif; ?>	
								<h2>Edit Cave</h2>
							</header>
							<form action="admin-edit-cave.php?id=<?php echo $cave["cave_id"]?>" method="post" enctype="multipart/form-data">									<h3>Cave Name:</h3>
								
								<input type="text" id="name" name="name" value="<?php echo $cave["name"];?>">
								<br>
										
								<h3>Town</h3>
								<select id="town" name="town">
									<option value=''>Select Town</option>
										<?php $filePath = 'Towns.txt';
												if (file_exists($filePath)) {
													// Read the file into an array, where each element is a line
    												$lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

													// Loop through each line and display in a separate paragraph
													foreach ($lines as $line) {
														$alphabeticOnly = preg_replace("/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]/u", "", $line);
														if($alphabeticOnly == $cave["town"]) {
															echo "<option value='" .htmlspecialchars($alphabeticOnly) . "' selected>" .htmlspecialchars($alphabeticOnly) . "</option>";	

														} else {
															echo "<option value='" .htmlspecialchars($alphabeticOnly) . "'>" .htmlspecialchars($alphabeticOnly) . "</option>";	
														}
													}
												} else {
													echo '<p>Error: File not found</p>';
												} ?>
									</select>
								
								<br><br>
										
								<h4>Biodiversity:</h4>
								<fieldset>
									<div><input type="checkbox" name="biodiversity[]" value="Guano" id="Guano" <?php checkBio("Guano") ?>><label for="Guano">Guano</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Bacteria" id="Bacteria" <?php checkBio("Bacteria") ?>><label for="Bacteria">Bacteria</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Algae" id="Algae" <?php checkBio("Algae") ?>><label for="Algae">Algae</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Fungi" id="Fungi" <?php checkBio("Fungi") ?>><label for="Fungi">Fungi</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Lichens" id="Lichens" <?php checkBio("Lichens") ?>><label for="Lichens">Lichens</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Plants" id="Plants" <?php checkBio("Plants") ?>><label for="Plants">Plants</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Protozoans" id="Protozoans" <?php checkBio("Protozoans") ?>><label for="Protozoans">Protozoans</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Porifera" id="Porifera" <?php checkBio("Porifera") ?>><label for="Porifera">Porifera</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Cnidarians" id="Cnidarians" <?php checkBio("Cnidarians") ?>><label for="Cnidarians">Cnidarians</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Platyhelminthes" id="Platyhelminthes" <?php checkBio("Platyhelminthes") ?>><label for="Platyhelminthes">Platyhelminthes</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Nemertina" id="Nemertina" <?php checkBio("Nemertina") ?>><label for="Nemertina">Nemertina</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Gastrotricha" id="Gastrotricha" <?php checkBio("Gastrotricha") ?>><label for="Gastrotricha">Gastrotricha</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Kinorhyncha" id="Kinorhyncha" <?php checkBio("Kinorhyncha") ?>><label for="Kinorhyncha">Kinorhyncha</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Nematoda" id="Nematoda" <?php checkBio("Nematoda") ?>><label for="Nematoda">Nematoda</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Annelida" id="Annelida" <?php checkBio("Annelida") ?>><label for="Annelida">Annelida</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Mollusca" id="Mollusca" <?php checkBio("Mollusca") ?>><label for="Mollusca">Mollusca</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Brachiopoda" id="Brachiopoda" <?php checkBio("Brachiopoda") ?>><label for="Brachiopoda">Brachiopoda</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Bryozoa" id="Bryozoa" <?php checkBio("Bryozoa") ?>><label for="Bryozoa">Bryozoa</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Curstacea" id="Curstacea" <?php checkBio("Curstacea") ?>><label for="Curstacea">Curstacea</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Chelicerata" id="Chelicerata" <?php checkBio("Chelicerata") ?>><label for="Chelicerata">Chelicerata</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Onychophora" id="Onychophora" <?php checkBio("Onychophora") ?>><label for="Onychophora">Onychophora</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Tardigrada" id="Tardigrada" <?php checkBio("Tardigrada") ?>><label for="Tardigrada">Tardigrada</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Myriapoda" id="Myriapoda" <?php checkBio("Myriapoda") ?>><label for="Myriapoda">Myriapoda</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Insecta" id="Insecta" <?php checkBio("Insecta") ?>><label for="Insecta">Insecta</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Pisces" id="Pisces" <?php checkBio("Pisces") ?>><label for="Pisces">Pisces</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Amphibians" id="Amphibians" <?php checkBio("Amphibians") ?>><label for="Amphibians">Amphibians</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Reptilia" id="Reptilia" <?php checkBio("Reptilia") ?>><label for="Reptilia">Reptilia</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Aves" id="Aves" <?php checkBio("Aves") ?>><label for="Aves">Aves</label></div>
									<div><input type="checkbox" name="biodiversity[]" value="Mammalia" id="Mammalia" <?php checkBio("Mammalia") ?>><label for="Mammalia">Mammalia</label></div>	
								</fieldset>
								<br>
										
								<h3>If you wish to replace the current model, please choose a .ply file for the 3D model:</h3>
                                <input type="file" name="model" id="model">
								<p><strong>Old File: </strong><?php echo $cave["model_link"] ?></p>
								
                                <h3>If you wish to replace the current download file, please choose a .laz file for the download:</h3>
                                <input type="file" name="download" id="download">
								<p><strong>Old File: </strong><?php echo $cave["download_link"] ?></p>
                                
								<h3>Active</h3>
								<input type="checkbox" name="active" value="1" id="active" <?php if($cave["active"]==1) {echo "checked";} ?>><label for="active">Unmarking this checkbox will cause the cave to not be displayed in the website</label>
								<br><br>
								<input type="hidden" name="cave_id" value="<?php echo htmlspecialchars($cave_id); ?>">
								<input type="submit" value="Update">
							</form>
							<br>
							<br>

							<?php if ($_SESSION["authorization"] == "master") { ?>
    							<form method="post" action="admin-delete.php?id=<?php echo $_GET["id"]; ?>&name=<?php echo $cave["name"]; ?>">
        							<input type="submit" value="Delete">
    							</form>
							<?php } ?>
							
							</article>
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