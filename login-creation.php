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
        if (empty($_POST['email'])) {
            $missingFields[] = 'Email';
        }
        if (empty($_POST['password'])) {
            $missingFields[] = 'Password';
        }
        if (empty($_POST['name'])) {
            $missingFields[] = 'Name';
        }
        if (empty($_POST['lastname'])) {
            $missingFields[] = 'Last Name';
        }
        if (empty($_POST['authorization'])) {
            $missingFields[] = 'Authorization';
        }

        if (!empty($missingFields)) {
            $message = 'Please fill in all required fields: ' . implode(', ', $missingFields);
            $messageClass = 'error';
        } else {
            // Retrieve form data
            $email = $_POST["email"];
            $password = $_POST["password"];
            $name = $_POST["name"];
            $lastname = $_POST["lastname"];
            $authorization = $_POST["authorization"];

            // Insert data into the 'admins' table
            $sql = "INSERT INTO admins (email, password, name, lastname, authorization) VALUES ('$email', '$password', '$name', '$lastname', '$authorization')";

            if ($conn->query($sql) === TRUE) {
                $message = 'New record created successfully';
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
								<h2>Create New Account</h2>
							</header><?php if ($message): ?>
								<p class="<?= $messageClass; ?>"><?php echo $message; ?></p>
							<?php endif; ?>

							<form action="login-creation.php" method="post">
								<label for="email">Email:</label>
								<input type="email" id="email" name="email" required><br>

								<label for="password">Password:</label>
								<input type="password" id="password" name="password" required><br>

								<label for="name">Name:</label>
								<input type="text" id="name" name="name" required><br>

								<label for="lastname">Last Name:</label>
								<input type="text" id="lastname" name="lastname" required><br>

								<label for="authorization">Authorization:</label>
								<select id="authorization" name="authorization" required>
									<option value="" disabled selected>Select Authorization</option>
									<option value="admin">Admin</option>
									<option value="publisher">Publisher</option>
								</select><br>

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