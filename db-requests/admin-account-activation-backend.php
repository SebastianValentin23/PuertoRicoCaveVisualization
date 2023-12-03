<?php
    // Include the database connection file
    include 'db_info.php';

    // Initialize messages
    $message = '';
    $messageClass = '';

    // Check if the toggle_active button is pressed
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['toggle_active'])) {
        // Ensure that the admin_id is set in the $_POST data
        if (isset($_POST['admin_id'])) {
            $adminId = $_POST['admin_id'];

            // Toggle the active status
            $updateSql = "UPDATE admins SET active = 1 - active WHERE admin_id = $adminId";

            if ($conn->query($updateSql) === TRUE) {
                $message = 'Active status updated successfully!';
                $messageClass = 'success';
            } else {
                $message = 'Error updating active status: ' . $conn->error;
                $messageClass = 'error';
            }
        } else {
            $message = 'Error: Admin ID not set in the POST data.';
            $messageClass = 'error';
        }
    }

    // Check if the delete_account button is pressed
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_account'])) {
        // Ensure that the admin_id is set in the $_POST data
        if (isset($_POST['admin_id'])) {
            $adminId = $_POST['admin_id'];

            // Delete the account
            $deleteSql = "DELETE FROM admins WHERE admin_id = $adminId";

            if ($conn->query($deleteSql) === TRUE) {
                $message = 'Account deleted successfully!';
                $messageClass = 'success';
            } else {
                $message = 'Error deleting account: ' . $conn->error;
                $messageClass = 'error';
            }
        } else {
            $message = 'Error: Admin ID not set in the POST data.';
            $messageClass = 'error';
        }
    }

    // Fetch all admins from the database
    $sql = "SELECT * FROM admins";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display a table with admin information
        echo '<table border="1">';
        echo '<tr><th>Name</th><th>Last Name</th><th>Email</th><th>Authorization</th><th>Active</th><th>Action</th><th>Deletion</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['lastname'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['authorization'] . '</td>';
            echo '<td>' . ($row['active'] ? 'Active' : 'Inactive') . '</td>';

            echo '<td>';
            echo '<form action="admin-account-activation.php" method="post" onsubmit="return confirmDelete(\'toggle_active\');">';
            echo '<input type="hidden" name="admin_id" value="' . $row['admin_id'] . '">';
            echo '<input type="submit" name="toggle_active" value="Toggle Active">';
            echo '</form>';
            echo '</td>';

            echo '<td>';
            echo '<form action="admin-account-activation.php" method="post" onsubmit="return confirmDelete(\'delete_account\');">';
            echo '<input type="hidden" name="admin_id" value="' . $row['admin_id'] . '">';
            echo '<input type="submit" name="delete_account" value="Delete Account">';
            echo '</form>';
            echo '</td>';

            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>No admins found.</p>';
    }

    // Display the message
    if (!empty($message)) {
        echo '<p class="' . $messageClass . '">' . $message . '</p>';
    }

    // Close the database connection
    $conn->close();
?>
