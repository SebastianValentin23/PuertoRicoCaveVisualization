<?php
// Fetch all stats from the database
include 'db_info.php';
 
$sql = "SELECT visitors.ip_address as ip_address, visitors.download_timestamp as t, visitors.cave_name as name FROM visitors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display a table with admin information
    echo '<table border="1">';
    echo '<tr><th><strong>Ip Address</th><th><strong>Time Stamp</th><th><strong>Cave Name</strong></th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['ip_address'] . '</td>';
        echo '<td>' . $row['t'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo '<p>No logs found.</p>';
}

?>