<?php
// Fetch all admins from the database
include 'db_info.php';
 
$sql = "SELECT logs.cave_name as cave, logs.admin_name as name, logs.date as date, logs.action as action FROM logs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display a table with admin information
    echo '<table border="1">';
    echo '<tr><th><strong>Cave</th><th><strong>Admin</th><th><strong>Date</th><th><strong>Action</strong></th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['cave'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['date'] . '</td>';
        echo '<td>' . $row['action'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo '<p>No logs found.</p>';
}

?>