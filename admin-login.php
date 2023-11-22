<?php
session_start();
include 'db_info.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row["password"])) {
                $_SESSION["admin_id"] = $row["admin_id"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["lastname"] = $row["lastname"];
                $_SESSION["authorization"] = $row["authorization"];
                header("Location: index.html");
                exit();
            } else {
                $error_message = "Incorrect password";
            }
        } else {
            $error_message = "Incorect email";
        }
    } else {
        $error_message = "Error in database query";
    }

    $stmt->close();
}

mysqli_close($conn);
?>
<!DOCTYPE HTML>
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
	</head>
	<body class="is-preload">
		<div id="page-wrapper">
			<div id="header">
				<nav id="nav">
					<ul>
						<li><a href="cave-creation.html">Cave Creation</a></li>	
						<li><a href="admin-caves.html">Admin Caves</a></li>
						<li><a href="admin-caves-master.html">Master Caves</a></li>
						<li><a href="admin-contact-us.php">Admin Contact Us</a></li>
						<li><a href="admin-login-creation.php">Create Account</a></li>
						<li  class="current"><a href="admin-login.php">Login</a></li>					
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
								<h2>Login</h2>
							</header>
							<form id="loginForm" class="txtarea-short" method="post" action="admin-login.php">
								<h4>E-mail:</h4>
								<input  type="email" id="email" name="email" required>
								<h4>Password:</h4>
								<input type="password" id="password" name="password" required>
								<br>
								<input type="submit" value="Login">
							</form>
                            <?php if(isset($error_message)) { echo "<p style='color: red;'>$error_message</p>"; } ?>
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
			

	</body>
</html>