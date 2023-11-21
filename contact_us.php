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
		<link rel="stylesheet" href="assets/css/main.css" />
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
    // Include the database connection file
    include 'db_info.php';

    // Initialize messages
    $message = '';
    $messageClass = '';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $missingFields = array();

        // Check if all form fields are filled
        if (empty($_POST['date'])) {
            $missingFields[] = 'Date';
        }
        if (empty($_POST['name'])) {
            $missingFields[] = 'Name';
        }
        if (empty($_POST['last_name'])) {
            $missingFields[] = 'Last Name';
        }
        if (empty($_POST['email'])) {
            $missingFields[] = 'Email';
        }
        if (empty($_POST['subject'])) {
            $missingFields[] = 'Subject';
        }
        if (empty($_POST['use'])) {
            $missingFields[] = 'Use';
        }
        if (empty($_POST['comment'])) {
            $missingFields[] = 'Comment';
        }

        if (!empty($missingFields)) {
            $message = 'Please fill in all required fields: ' . implode(', ', $missingFields);
            $messageClass = 'error';
        } else {
            // Retrieve form data
            $date = $_POST["date"];
            $name = $_POST["name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["email"];
            $subject = $_POST["subject"];
            $use = $_POST["use"];
            $comment = $_POST["comment"];

            // Insert data into the 'solicitors' table
			$sql = "INSERT INTO solicitors (date, name, last_name, email, subject, `use`, comment) VALUES ('$date', '$name', '$last_name', '$email', '$subject', '$use', '$comment')";

            if ($conn->query($sql) === TRUE) {
                $message = 'Your information has been submitted successfully';
                $messageClass = 'success';
            } else {
                $message = 'Error: ' . $sql . '<br>' . $conn->error;
                $messageClass = 'error';
            }
        }
    }

    // Close the database connection
    $conn->close();
    ?>
    
		<div id="page-wrapper">
			<div id="header">
				<nav id="nav">
					<ul>
						<li><a href="admin-caves-master.html">Admin</a></li>
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

							<form action="contact_us.php" method="post">
								<label for="date">Date:</label>
								<input type="date" id="date" name="date" required><br>

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