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

$sql = "SELECT cave_id, name, town FROM cave ORDER BY town";
$result = $conn->query($sql);

echo "<script>var caves = [];</script>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<script>caves.push(" . json_encode($row) . ");</script>";
    }
}

$conn->close();


?>