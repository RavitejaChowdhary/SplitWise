<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $servername = "localhost";
    $username = "root";
    $pass = "";
    $conn = mysqli_connect($servername, $username, $pass);
    mysqli_select_db($conn, "splitwise");
    if (mysqli_connect_error()) {
        die("Connection failed" . $conn->connect_error);
    };

    $query = "update users set name='" . $name ."' where " . "regno='" . "20BCE1936';";
    mysqli_query($conn,$query);
    // echo $query;

    $query = "update users set email='" . $email ."' where " . "regno='" . "20BCE1936';";
    mysqli_query($conn,$query);

    $query = "update users set phone='" . $phone ."' where " . "regno='" . "20BCE1936';";
    mysqli_query($conn,$query);

    echo "<script> alert('Saved changes successfully');</script>";
    header("Location: http://localhost/iwp%20da/show_profile.php");