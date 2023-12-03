<?php
// Fetch all admins from the database
include 'db_info.php';
 
$sql = "SELECT cave.name as cave, admin.name as name, admin.lastname as lastname, logs.date as date, logs.action as action FROM logs JOIN admins admin ON logs.admin_id = admin.admin_id JOIN cave cave ON logs.cave_id = cave.cave_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display a table with admin information
    echo '<table border="1">';
    echo '<tr><th>Cave</th><th>Admin</th><th>Date</th><th>Action</th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['cave'] . '</td>';
        echo '<td>' . $row['name'] . ' '.  $row['lastname'] . '</td>';
        echo '<td>' . $row['date'] . '</td>';
        echo '<td>' . $row['action'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo '<p>No logs found.</p>';
}

?>