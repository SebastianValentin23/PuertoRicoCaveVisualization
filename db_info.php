<?php
$servername = 'localhost';
$dbname = 'cavevisualization';
$username = 'root';
$password = '';

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    echo "<p>Failed to Connect</p>";
    die("Connection failed: " . $conn->connect_error);
}
echo "<p>Connected successfully</p>";

?>