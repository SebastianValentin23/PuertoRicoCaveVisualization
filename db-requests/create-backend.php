<?php

echo "Testing:";

$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $town = $_POST["town"];
    $biodiversity = $_POST["biodiversity"];


    echo "Name: " . $name . "<br>town: " . $town;


    $targetDirectory = "cuevas/"; // Specify the directory where you want to store the uploaded files
    if (isset($_FILES["model"])) {

        echo "<br>Model----<br>Filename: " . $_FILES['model']['name']."<br>";
        echo "Size : " . $_FILES['model']['size'] ."<br>";
        echo "Temp name: " . $_FILES['model']['tmp_name'] ."<br>";
        echo "Error : " . $_FILES['model']['error'] . "<br>----<br>";

        // Check the first file (assuming it's a .ply file)
        $allowedModelExtension = array("ply");
        $modelExtension = strtolower(pathinfo($_FILES["model"]["name"], PATHINFO_EXTENSION));

        if (!in_array($modelExtension, $allowedModelExtension)) {
           echo "Error: Only .ply files are allowed for the first file.";
        } else {
            $uploadedModel = $_FILES["model"]["tmp_name"];
            $destinationModel = $targetDirectory . basename($_FILES["model"]["name"]);
            // Move the uploaded file to the destination directory
            if (move_uploaded_file($uploadedModel, $destinationModel)) {
                echo "Model successfully uploaded.<br>";
            } else {
                echo "Error uploading the model.";
            }
        }
    }
    
    if(isset($_FILES["download"])) {
        echo "<br>Model----<br>Filename: " . $_FILES['download']['name']."<br>";
        echo "Size : " . $_FILES['download']['size'] ."<br>";
        echo "Temp name: " . $_FILES['download']['tmp_name'] ."<br>";
        echo "Error : " . $_FILES['download']['error'] . "<br>----<br>";

        // Check the first file (assuming it's a .ply file)
        $allowedDownloadExtension = array("laz");
        $downloadExtension = strtolower(pathinfo($_FILES["download"]["name"], PATHINFO_EXTENSION));

        if (!in_array($downloadExtension, $allowedDownloadExtension)) {
           echo "Error: Only .laz files are allowed for download.";
        } else {
            $uploadedDownload = $_FILES["download"]["tmp_name"];
            $destinationDowload = $targetDirectory . basename($_FILES["download"]["name"]);
            // Move the uploaded file to the destination directory
            if (move_uploaded_file($uploadedDownload, $destinationDowload)) {
                echo "Download successfully uploaded.<br>";
            } else {
                echo "Error uploading the download.";
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
        $message = 'Cave has successfully been created';
        $messageClass = 'success';
    } else {
        $message = 'Error: ' . $sql . '<br>' . $conn->error;
        $messageClass = 'error';
    }

    $sql = "SELECT MAX(cave_id) current_id FROM cave";
    $result = $conn->query($sql);
    $current_id = $result->fetch_assoc();
    echo "ID: " . $current_id['current_id'];


    echo "<p>";
    foreach ($biodiversity as $bio) {
        echo "|" . $bio ."|";
        $sql = "INSERT INTO biodiversity (cave_id, type) VALUES ('" . $current_id['current_id'] . "', '" . $bio . "')";
        if ($conn->query($sql) === TRUE) {
            $message = 'Bio has successfully created<br>';
            $messageClass = 'success';
        } else {
            $message = 'Error: ' . $sql . '<br>' . $conn->error;
            $messageClass = 'error';
        }
    }
    echo "</p>";


}

?>