
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
						