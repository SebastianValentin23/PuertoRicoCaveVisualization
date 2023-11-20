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
echo "<p>Connected successfully</p>";

$sql = "SELECT * FROM cave WHERE cave_id =" . $_GET["id"];
$result = $conn->query($sql);
$cave = $result->fetch_assoc();

echo "<p>cave_id: " . $cave["cave_id"]. " |Name: " . $cave["name"]. " |Town:" . $cave["town"] . " |download link:" . $cave["download_link"] . "</p>";

$conn->close();


?>