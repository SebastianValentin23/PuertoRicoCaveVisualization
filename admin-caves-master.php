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
								if ($_SESSION["authorization"] == "master" || $_SESSION["authorization"] == "admin") {
									// User is logged in as master or admin, display "Stats"
									echo '<li><a href="admin-stats.php">Stats</a></li>';
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
						<div class="row gtr-200">
							<div class="col-4 col-12-narrower">
								<div id="sidebar"> 
								<!-- Sidebar -->
									<section>
									<form id="caveForm" method="post" action="">
											<h4>Search by Name:</h4>
											<input type="text" id="caveNames" name="caveName">
											<br>
											<h4>Town</h4>
											<select id="town" name="town">
											<option value=''>Select Town</option>
												<?php $filePath = 'Towns.txt';
												if (file_exists($filePath)) {
											// Read the file into an array, where each element is a line
    											$lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

											// Loop through each line and display in a separate paragraph
												foreach ($lines as $line) {
												$alphabeticOnly = preg_replace("/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]/u", "", $line);

												echo "<option value='" .htmlspecialchars($alphabeticOnly) . "'>" .htmlspecialchars($alphabeticOnly) . "</option>";
												}
											} else {
												echo '<p>Error: File not found</p>';
											} ?>
										</select>
										<h4>Biodiversity</h4>
											<br>
											<br>
										<fieldset>
											<div><input type="checkbox" name="biodiversity[]" value="Guano" id="Guano"><label for="Guano">Guano</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Bacteria" id="Bacteria"><label for="Bacteria">Bacteria</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Algae" id="Algae"><label for="Algae">Algae</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Fungi" id="Fungi"><label for="Fungi">Fungi</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Lichens" id="Lichens"><label for="Lichens">Lichens</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Plants" id="Plants"><label for="Plants">Plants</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Protozoans" id="Protozoans"><label for="Protozoans">Protozoans</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Porifera" id="Porifera"><label for="Porifera">Porifera</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Cnidarians" id="Cnidarians"><label for="Cnidarians">Cnidarians</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Platyhelminthes" id="Platyhelminthes"><label for="Platyhelminthes">Platyhelminthes</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Nemertina" id="Nemertina"><label for="Nemertina">Nemertina</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Gastrotricha" id="Gastrotricha"><label for="Gastrotricha">Gastrotricha</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Kinorhyncha" id="Kinorhyncha"><label for="Kinorhyncha">Kinorhyncha</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Nematoda" id="Nematoda"><label for="Nematoda">Nematoda</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Annelida" id="Annelida"><label for="Annelida">Annelida</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Mollusca" id="Mollusca"><label for="Mollusca">Mollusca</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Brachiopoda" id="Brachiopoda"><label for="Brachiopoda">Brachiopoda</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Bryozoa" id="Bryozoa"><label for="Bryozoa">Bryozoa</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Curstacea" id="Curstacea"><label for="Curstacea">Curstacea</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Chelicerata" id="Chelicerata"><label for="Chelicerata">Chelicerata</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Onychophora" id="Onychophora"><label for="Onychophora">Onychophora</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Tardigrada" id="Tardigrada"><label for="Tardigrada">Tardigrada</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Myriapoda" id="Myriapoda"><label for="Myriapoda">Myriapoda</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Insecta" id="Insecta"><label for="Insecta">Insecta</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Pisces" id="Pisces"><label for="Pisces">Pisces</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Amphibians" id="Amphibians"><label for="Amphibians">Amphibians</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Reptilia" id="Reptilia"><label for="Reptilia">Reptilia</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Aves" id="Aves"><label for="Aves">Aves</label></div>
											<div><input type="checkbox" name="biodiversity[]" value="Mammalia" id="Mammalia"><label for="Mammalia">Mammalia</label></div>	
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
											<?php if ($_SESSION["authorization"] == "master" || $_SESSION["authorization"] == "admin") { 
												echo "<p>Click on a cave to edit its information</p>";
											} ?>
										</header>
										<table id="caveTable">
											<thead>
												<tr>
												<th>Cave Name</th>
												<th>Town</th>
												<th>Biodiversity</th>
												<th>Active</th>
											</tr>
											</thead>
											
											<?php $canEdit = FALSE;

												if ($_SESSION["authorization"] == "master" || $_SESSION["authorization"] == "admin") { 
													$canEdit = TRUE;
												} 	
												
												
												include 'db_info.php';
												$caveIdentify = isset($_POST['cave_id']) ? $_POST['cave_id'] : null;
												// Handle form submission
												if ($_SERVER['REQUEST_METHOD'] === 'POST') {
													$caveName = $_POST['caveName'];
													$town = $_POST['town'];
													$biodiversity = isset($_POST['biodiversity']) ? $_POST['biodiversity'] : [];

													// Build the SQL query based on the selected filters
													$sql = "SELECT cave.cave_id, cave.name, cave.town, biodiversity.type, cave.active FROM cave
															LEFT JOIN biodiversity ON cave.cave_id = biodiversity.cave_id
															WHERE 1 = 1";
													if (!empty($caveIdentify)) {
														$sql .= " AND cave.cave_id LIKE '%$caveIdentify%'";
													}
													if (!empty($caveName)) {
														$sql .= " AND cave.name LIKE '%$caveName%'";
													}

													if (!empty($town)) {
														$sql .= " AND cave.town = '$town'";
													}

													if (!empty($biodiversity)) {
														$biodiversityString = "'" . implode("','", $biodiversity) . "'";
														$sql .= " AND biodiversity.type IN ($biodiversityString)";
													}
													

													$result = $conn->query($sql);

													// Display the filtered results
													if ($result->num_rows > 0) {
														echo '<tbody id="caveTableBody">';
												
														// Create an array to store biodiversity values for each cave
														$biodiversityValuesArray = [];
												
														while ($row = $result->fetch_assoc()) {
															$caveId = $row["cave_id"];
															$caveName = $row["name"];
															$town = $row["town"];
															$active = $row["active"];
															$biodiversityValues = $row["type"];
												
															// Check if the cave name already exists in the array
															if (array_key_exists($caveName, $biodiversityValuesArray)) {
																// If it exists, append the biodiversity values to the existing data
																$biodiversityValuesArray[$caveName]["biodiversity"][] = $biodiversityValues;
															} else {
																// If it doesn't exist, add a new entry to the array
																$biodiversityValuesArray[$caveName] = [
																	"id" => $caveId,
																	"town" => $town,
																	"biodiversity" => [$biodiversityValues],
																	"active" => $active,
																];
															}
														}
												
														foreach ($biodiversityValuesArray as $caveName => $caveData) {
															$biodiversityValues = implode(', ', array_unique($caveData["biodiversity"]));
												
															echo "<tr><td>";
															if ($canEdit) {
																echo "<a href='admin-edit-cave.php?id=" . $caveData["id"] . "'>";
															}	
															echo $caveName;
															if ($canEdit) {
																echo "</a>";
															}
															echo "</td>
																<td>" . $caveData["town"] . "</td>
																<td>" . $biodiversityValues . "</td>
																<td>" . $caveData["active"] . "</td>
																</tr>";
														}
												
														echo '</tbody>';
													} else {
														echo "<tbody id='caveTableBody'><tr><td colspan='4'>No results found</td></tr></tbody>";
													}
												} else {
													// Display all caves when the page loads initially
													$sql = "SELECT cave.cave_id, cave.name, cave.town, biodiversity.type, cave.active FROM cave
													LEFT JOIN biodiversity ON cave.cave_id = biodiversity.cave_id";
												$result = $conn->query($sql);

												// Display the results
												if ($result->num_rows > 0) {
													echo '<tbody id="caveTableBody">';
											
													// Create an array to store biodiversity values for each cave
													$biodiversityValuesArray = [];
											
													while ($row = $result->fetch_assoc()) {
														$caveId = $row["cave_id"];
														$caveName = $row["name"];
														$town = $row["town"];
														$active = $row["active"];
														$biodiversityValues = $row["type"];
											
														// Check if the cave name already exists in the array
															if (array_key_exists($caveName, $biodiversityValuesArray)) {
																// If it exists, append the biodiversity values to the existing data
																$biodiversityValuesArray[$caveName]["biodiversity"][] = $biodiversityValues;
															} else {
																// If it doesn't exist, add a new entry to the array
																$biodiversityValuesArray[$caveName] = [
																	"id" => $caveId,
																	"town" => $town,
																	"biodiversity" => [$biodiversityValues],
																	"model_link" => $active,
																];
															}
														}
												
														foreach ($biodiversityValuesArray as $caveName => $caveData) {
															$biodiversityValues = implode(', ', array_unique($caveData["biodiversity"]));
												
															echo "<tr><td>";
															if ($canEdit) {
																echo "<a href='admin-edit-cave.php?id=" . $caveData["id"] . "'>";
															}	
															echo $caveName; 
															if ($canEdit) {
																echo "</a>";
															}
															echo "</td><td>" . $caveData["town"] . "</td><td>" . $biodiversityValues . "</td><td>" . $active . "</td></tr>";
														}
												
														echo '</tbody>';
													} else {
														echo "<tbody id='caveTableBody'><tr><td colspan='4'>No results found</td></tr></tbody>";
													}
												}
												function getBiodiversityValues($caveId) {
													global $conn;
												
													$biodiversityValues = [];
												
													$biodiversitySql = "SELECT type FROM biodiversity WHERE cave_id = $caveId";
													$biodiversityResult = $conn->query($biodiversitySql);
												
													if ($biodiversityResult->num_rows > 0) {
														while ($biodiversityRow = $biodiversityResult->fetch_assoc()) {
															$biodiversityValues[] = $biodiversityRow["type"];
														}
													}
												
													return implode(", ", $biodiversityValues);
												}
												$conn->close();
												?>
											</tbody>
											
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