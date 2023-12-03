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

$sql = "SELECT * FROM biodiversity WHERE cave_id =" .$_GET["id"];
$bio = $conn->query($sql);
$index = 0;
while ($row = $bio->fetch_assoc()) {
    $GLOBALS[$index] = $row["type"];
    $index++;
}
$GLOBALS["total"] = $index;

$message = '';
$messageClass = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $town = $_POST["town"];
    $biodiversity = $_POST["biodiversity"];
    $model = $cave["model_link"];
    $download = $cave["download_link"];
    $active = isset($_POST["active"]) ? $_POST["active"] : 0;

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
                $model =  $_FILES['model']['name'];
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
                $download = $_FILES['download']['name'];
            } else {
                $message = "Error uploading the download.";
                $messageClass = "error";
            }
        }
    }

    $sql = "UPDATE cave
        SET name = '" . $name . "',
        town = '" . $town . "',
        download_link = '" . $download . "',
        download_name = '" . $name . "',
        model_link = '" . $model . "',
        active = '" . $active . "'
    WHERE cave_id = " . $cave["cave_id"];    
    
    if ($conn->query($sql) === TRUE) {
        //NOthing
    } else {
        $message = 'Error: ' . $sql . '<br>' . $conn->error;
        $messageClass = 'error';
    }

    // Delete all entries for a specific cave_id and type
    $delete_sql = "DELETE FROM biodiversity WHERE cave_id = " . $cave["cave_id"];
    $conn->query($delete_sql);
    if ($conn->query($sql) === TRUE) {
        //nothing
    } else {
        $message = 'Error: ' . $sql . '<br>' . $conn->error;
        $messageClass = 'error';
    }

    // Insert new entries from your array
    foreach ($biodiversity as $bio) {
        $sql = "INSERT INTO biodiversity (cave_id, type) VALUES ('" . $cave['cave_id'] . "', '" . $bio . "')";
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
    $sql = "INSERT INTO logs (admin_id, cave_id, date, action) VALUES ('" . $_SESSION["admin_id"] . "', '" . $cave['cave_id'] . "', '" . $date . "', 'edit')";
    if ($conn->query($sql) === TRUE) {
        //nothing
    } else {
        $message = 'Error: ' . $sql . '<br>' . $conn->error;
        $messageClass = 'error';
    }
    
    $message = 'Cave has been successfully updated';
    $messageClass = 'success';
    $conn->close();

}

function checkBio($type) {
    for($i = 0; $i < $GLOBALS["total"]; $i++) {
        if ($type == $GLOBALS[$i]) {
            echo "checked";
        }
    }
}



?>