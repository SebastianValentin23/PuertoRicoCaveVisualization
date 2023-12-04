<?php
$user_ip = $_SERVER['REMOTE_ADDR'];

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

$sql = "INSERT INTO visitors (ip_address, cave_id, cave_name) VALUES ('" . $user_ip . "', '" . $_GET["id"] . "', '" . $_GET["name"] . "')";
$conn->query($sql);

// Redirect the user to the actual file download link
header('Location: cuevas/' . $_GET["link"]);

?>