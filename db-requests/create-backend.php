<?php

$message = '';
$messageClass = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $town = $_POST["town"];
    $biodiversity = $_POST["biodiversity"];

    $targetDirectory = "cuevas/"; // Specify the directory where you want to store the uploaded files
    if (isset($_FILES["model"])) {
        // Check the first file (assuming it's a .ply file)
        $allowedModelExtension = array("ply");
        $modelExtension = strtolower(pathinfo($_FILES["model"]["name"], PATHINFO_EXTENSION));

        if (!in_array($modelExtension, $allowedModelExtension)) {
           $message = "Error: Only .ply files are allowed for the first file.";
           $messageClass = "error";
        } else {
            $uploadedModel = $_FILES["model"]["tmp_name"];
            $destinationModel = $targetDirectory . basename($_FILES["model"]["name"]);
            // Move the uploaded file to the destination directory
            if (move_uploaded_file($uploadedModel, $destinationModel)) {
                //nothing for now
            } else {
                $message = "Error: File failed to upload.";
                $messageClass = "error";        
            }
        }
    }
    
    if(isset($_FILES["download"])) {
        // Check the second file (assuming it's a .laz file)
        $allowedDownloadExtension = array("laz");
        $downloadExtension = strtolower(pathinfo($_FILES["download"]["name"], PATHINFO_EXTENSION));

        if (!in_array($downloadExtension, $allowedDownloadExtension)) {
            $message = "Error: Only .laz files are allowed for download.";
           $messageClass = "error";
        } else {
            $uploadedDownload = $_FILES["download"]["tmp_name"];
            $destinationDowload = $targetDirectory . basename($_FILES["download"]["name"]);
            // Move the uploaded file to the destination directory
            if (move_uploaded_file($uploadedDownload, $destinationDowload)) {
                //nothing
            } else {
                $message = "Error uploading the download.";
                $messageClass = "error";
            }
        }
    }

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

    $sql = "INSERT INTO cave (name, town, download_link, download_name, model_link, active) VALUES ('" . $name . "', '" . $town. "', '" . $_FILES['download']['name'] . "', '" . $name . "', '" . $_FILES['model']['name'] . "', '1')";
    if ($conn->query($sql) === TRUE) {
        //NOthing
    } else {
        $message = 'Error: ' . $sql . '<br>' . $conn->error;
        $messageClass = 'error';
    }

    $sql = "SELECT MAX(cave_id) current_id FROM cave";
    $result = $conn->query($sql);
    $current_id = $result->fetch_assoc();
    foreach ($biodiversity as $bio) {
        $sql = "INSERT INTO biodiversity (cave_id, type) VALUES ('" . $current_id['current_id'] . "', '" . $bio . "')";
        if ($conn->query($sql) === TRUE) {
            //nothing
        } else {
            $message = 'Error: ' . $sql . '<br>' . $conn->error;
            $messageClass = 'error';
        }
    }

    //Creating the log
    $date = date("y/m/d-H:i");
    $admin_id = $_SESSION["admin_id"];
    $sql = "INSERT INTO logs (admin_id, admin_name, cave_id, cave_name, date, action) VALUES ('" . $_SESSION["admin_id"] . "', '" .$_SESSION["name"] . "', '" . $current_id['current_id'] . "', '" . $name . "', '" . $date . "', 'add')";
    if ($conn->query($sql) === TRUE) {
        //nothing
    } else {
        $message = 'Error: ' . $sql . '<br>' . $conn->error;
        $messageClass = 'error';
    }
    
    $message = 'Cave has been successfully created';
    $messageClass = 'success';
    $conn->close();

}
?>