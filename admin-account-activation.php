<?php
    session_start();
?> 
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Account Activation</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <script>
        function confirmDelete(action) {
            var confirmationMessage = '';

            if (action === 'toggle_active') {
                confirmationMessage = 'Are you sure you want to toggle the active status?';
            } else if (action === 'delete_account') {
                confirmationMessage = 'Are you sure you want to delete this account?';
            }

            return confirm(confirmationMessage);
        }
    </script>
</head>
<body class="is-preload">

    <div id="page-wrapper">
        <div id="header">
        <nav id="nav">
					<ul>
						<li ><a href="admin-cave-creation.php">Cave Creation</a></li>
                        <?php
                        /*if (isset($_SESSION["authorization"])) {
								if ($_SESSION["authorization"] == "master" || $_SESSION["authorization"] == "admin") {
									// User is logged in as master or admin, display "Admin Caves"
									echo '<li><a href="admin-caves.php">Admin Caves</a></li>';
								} elseif ($_SESSION["authorization"] == "publisher") {
									// User is logged in as publisher, do not display "Admin Caves"
								}
							}*/
						?>
						<li ><a href="admin-caves.php">Admin Caves</a></li>
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
									echo '<li class="current"><a href="admin-account-activation.php">Accounts</a></li>';
								} elseif ($_SESSION["authorization"] == "admin" || $_SESSION["authorization"] == "publisher") {
									// User is logged in as admin or publisher, do not display "Accounts"
								}
							}*/
						?>
						<li class="current"><a href="admin-account-activation.php">Accounts</a></li>
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
                <div id="content">
                    <!-- Content -->
                    <article>
                        <header>
                            <h2>Admin Account Activation</h2>
                        </header>

                        <?php
                            // Include the database connection file
                            include 'db_info.php';

                            // Initialize messages
                            $message = '';
                            $messageClass = '';

                            // Check if the toggle_active button is pressed
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['toggle_active'])) {
                                // Ensure that the admin_id is set in the $_POST data
                                if (isset($_POST['admin_id'])) {
                                    $adminId = $_POST['admin_id'];

                                    // Toggle the active status
                                    $updateSql = "UPDATE admins SET active = 1 - active WHERE admin_id = $adminId";

                                    if ($conn->query($updateSql) === TRUE) {
                                        $message = 'Active status updated successfully!';
                                        $messageClass = 'success';
                                    } else {
                                        $message = 'Error updating active status: ' . $conn->error;
                                        $messageClass = 'error';
                                    }
                                } else {
                                    $message = 'Error: Admin ID not set in the POST data.';
                                    $messageClass = 'error';
                                }
                            }

                            // Check if the delete_account button is pressed
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_account'])) {
                                // Ensure that the admin_id is set in the $_POST data
                                if (isset($_POST['admin_id'])) {
                                    $adminId = $_POST['admin_id'];

                                    // Delete the account
                                    $deleteSql = "DELETE FROM admins WHERE admin_id = $adminId";

                                    if ($conn->query($deleteSql) === TRUE) {
                                        $message = 'Account deleted successfully!';
                                        $messageClass = 'success';
                                    } else {
                                        $message = 'Error deleting account: ' . $conn->error;
                                        $messageClass = 'error';
                                    }
                                } else {
                                    $message = 'Error: Admin ID not set in the POST data.';
                                    $messageClass = 'error';
                                }
                            }

                            // Fetch all admins from the database
                            $sql = "SELECT * FROM admins";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Display a table with admin information
                                echo '<table border="1">';
                                echo '<tr><th>Name</th><th>Last Name</th><th>Email</th><th>Authorization</th><th>Active</th><th>Toggle</th><th>Deelete account</th></tr>';

                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row['name'] . '</td>';
                                    echo '<td>' . $row['lastname'] . '</td>';
                                    echo '<td>' . $row['email'] . '</td>';
                                    echo '<td>' . $row['authorization'] . '</td>';
                                    echo '<td>' . ($row['active'] ? 'Active' : 'Inactive') . '</td>';

                                    echo '<td>';
                                    echo '<form action="admin-account-activation.php" method="post" onsubmit="return confirmDelete(\'toggle_active\');">';
                                    echo '<input type="hidden" name="admin_id" value="' . $row['admin_id'] . '">';
                                    echo '<input type="submit" name="toggle_active" value="Toggle Active">';
                                    echo '</form>';
                                    echo '</td>';

                                    echo '<td>';
                                    echo '<form action="admin-account-activation.php" method="post" onsubmit="return confirmDelete(\'delete_account\');">';
                                    echo '<input type="hidden" name="admin_id" value="' . $row['admin_id'] . '">';
                                    echo '<input type="submit" name="delete_account" value="Delete Account">';
                                    echo '</form>';
                                    echo '</td>';

                                    echo '</tr>';
                                }

                                echo '</table>';
                            } else {
                                echo '<p>No admins found.</p>';
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
