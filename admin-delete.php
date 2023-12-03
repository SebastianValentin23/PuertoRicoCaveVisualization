<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleting</title>
    <?php 
        session_start();
        
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
        
        $date = date("y/m/d-H:i");
        $sql = "INSERT INTO logs (admin_id, admin_name, cave_id, cave_name, date, action) VALUES ('" . $_SESSION["admin_id"] . "', '" .$_SESSION["name"] . "', '" . $_GET['id'] . "', '" . $_GET["name"] . "', '" . $date . "', 'delete')";
        $conn->query($sql);

        $sql = "DELETE FROM biodiversity WHERE cave_id = " . $_GET['id'];
        $conn->query($sql);
        
        $sql = "DELETE FROM cave WHERE cave_id = " . $_GET['id'];
        $conn->query($sql);

        //deleting the files from the server
    ?>
</head>
<body>

    <div>
        <p>Deleting cave <?php echo $_GET["name"]; ?>. Please wait...</p>
    </div>
    
    <script> // Redirect to another page after a delay
        setTimeout(function() {
            window.location.href = 'admin-caves-master.php';
        }, 2500); // 5000 milliseconds = 5 seconds
    </script>

</body>
</html>