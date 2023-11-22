<?php
$servername = 'localhost';
$dbname = 'cavevisualization';
$username = 'root';
$password = '';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "<p>Failed to Connect</p>";
    die("Connection failed: " . $conn->connect_error);
}

// Select the database
if (!mysqli_select_db($conn, $dbname)) {
    echo "<p>Failed to select the database</p>";
    die("Error: " . mysqli_error($conn));
}

?>
