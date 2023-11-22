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
						<li><a href="cave-creation.html">Cave Creation</a></li>	
						<li><a href="admin-caves.html">Admin Caves</a></li>
						<li><a href="admin-caves-master.html">Master Caves</a></li>
						<li  class="current"><a href="admin-contact-us.php">Admin Contact Us</a></li>
						<li><a href="admin-login-creation.php">Create Account</a></li>
						<li><a href="admin-login.php">Login</a></li>					
						<li><a href="index.html">User</a></li>
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
								// Include the database connection file
								include 'db_info.php';

								// Initialize messages
								$message = '';
								$messageClass = '';

								// Check if the respond button is pressed
								if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['respond'])) {
									// Ensure that the solicitor_id is set in the $_POST data
									if (isset($_POST['solicitor_id'])) {
										$solicitorId = $_POST['solicitor_id'];

										// Update the respond_date with the current date
										$updateSql = "UPDATE solicitors SET respond_date = NOW() WHERE solicitor_id = $solicitorId";

										if ($conn->query($updateSql) === TRUE) {
											$message = 'Respond date updated successfully!';
											$messageClass = 'success';
										} else {
											$message = 'Error updating respond date: ' . $conn->error;
											$messageClass = 'error';
										}
									} else {
										$message = 'Error: Solicitor ID not set in the POST data.';
										$messageClass = 'error';
									}
								}

								// Check if the filter button is pressed
								if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['filter_non_responded'])) {
									// Fetch only non-responded solicitors from the database
									$sql = "SELECT * FROM solicitors WHERE respond_date IS NULL";
								} else {
									// Fetch all solicitors from the database
									$sql = "SELECT * FROM solicitors";
								}

								$result = $conn->query($sql);

								// Display the button only if respond_date is empty
								echo '<form action="admin-contact-us.php" method="post">';
								echo '<input type="submit" name="filter_non_responded" value="Show Non-Responded Solicitors">';
								echo '</form>';

								if ($result->num_rows > 0) {
									// Display a table with solicitor information
									echo '<table border="1">';
									echo '<tr><th>Date</th><th>Name</th><th>Last Name</th><th>Email</th><th>Subject</th><th>Use</th><th>Comment</th><th>Respond Date</th><th>Action</th></tr>';

									while ($row = $result->fetch_assoc()) {
										echo '<tr>';
										echo '<td>' . $row['date'] . '</td>';
										echo '<td>' . $row['name'] . '</td>';
										echo '<td>' . $row['last_name'] . '</td>';
										echo '<td>' . $row['email'] . '</td>';
										echo '<td>' . $row['subject'] . '</td>';
										echo '<td>' . $row['use'] . '</td>';
										echo '<td>' . $row['comment'] . '</td>';
										echo '<td>' . ($row['respond_date'] ? $row['respond_date'] : 'Not Responded') . '</td>';

										if (empty($row['respond_date'])) {
											echo '<td>';
											echo '<form action="contact_us_admin.php" method="post">';
											echo '<input type="hidden" name="solicitor_id" value="' . $row['solicitor_id'] . '">';
											echo '<input type="submit" name="respond" value="Respond">';
											echo '</form>';
											echo '</td>';
										} else {
											echo '<td></td>'; // Empty column if the button is not displayed
										}

										echo '</tr>';
									}

									echo '</table>';
								} else {
									echo '<p>No solicitors found.</p>';
								}

						
								// Display the message
								if (!empty($message)) {
									echo '<p class="' . $messageClass . '">' . $message . '</p>';
								}

								// Close the database connection
								$conn->close();
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