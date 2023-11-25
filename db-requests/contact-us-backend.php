<?php
    // Include the database connection file
    include 'db_info.php';

    // Initialize messages
    $message = '';
    $messageClass = '';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $missingFields = array();

        // Check if all form fields are filled
        if (empty($_POST['name'])) {
            $missingFields[] = 'Name';
        }
        if (empty($_POST['last_name'])) {
            $missingFields[] = 'Last Name';
        }
        if (empty($_POST['email'])) {
            $missingFields[] = 'Email';
        }
        if (empty($_POST['subject'])) {
            $missingFields[] = 'Subject';
        }
        if (empty($_POST['use'])) {
            $missingFields[] = 'Use';
        }
        if (empty($_POST['comment'])) {
            $missingFields[] = 'Comment';
        }

        if (!empty($missingFields)) {
            $message = 'Please fill in all required fields: ' . implode(', ', $missingFields);
            $messageClass = 'error';
        } else {
            // Retrieve form data
            $name = $_POST["name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["email"];
            $subject = $_POST["subject"];
            $use = $_POST["use"];
            $comment = $_POST["comment"];

            // Get the current date
            $date = date("Y-m-d");

            // Insert data into the 'solicitors' table
            $sql = "INSERT INTO solicitors (date, name, last_name, email, subject, `use`, comment) VALUES ('$date', '$name', '$last_name', '$email', '$subject', '$use', '$comment')";

            if ($conn->query($sql) === TRUE) {
                $message = 'Your information has been submitted successfully';
                $messageClass = 'success';
            } else {
                $message = 'Error: ' . $sql . '<br>' . $conn->error;
                $messageClass = 'error';
            }
        }
    }

    // Close the database connection
    $conn->close();
    ?>