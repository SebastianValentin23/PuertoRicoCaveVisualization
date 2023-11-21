<?php
$servername = 'localhost';
$dbname = 'cavevisualization';
$username = 'root';
$password = '';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM cave WHERE cave_id =" . $_GET["id"];
$result = $conn->query($sql);
$cave = $result->fetch_assoc();

$conn->close();


?>