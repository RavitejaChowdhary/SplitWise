<?php 
    $servername = "localhost";
    $username = "root";
    $password = "sritwik2";
    $dbname = "splitWise";
     
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
     
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $ids = $_POST['actid'];
    $ids = explode(" ", $ids);

    foreach ($ids as $id) {
        $sql = "UPDATE activities SET settled = 1 WHERE id = '$id'";
        $result = $conn->query($sql);
    }

    header("Location: http://localhost/IWP-JComp/Script/dashboard.php");
    $conn->close();
?>