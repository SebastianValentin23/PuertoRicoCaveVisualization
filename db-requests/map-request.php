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

$sql = "SELECT cave_id, name, town FROM cave ORDER BY town";
$result = $conn->query($sql);

echo "<script>var caves = [];</script>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<p>cave_id: " . $row["cave_id"]. " |Name: " . $row["name"]. " |Town:" . $row["town"] . "</p>";
        echo "<script>caves.push(" . json_encode($row) . ");</script>";
    }
} else {
    echo "<p>0 results</p>";
}

$conn->close();


?>