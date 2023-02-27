<?php
    session_start();
    $name = trim($_POST['name']);
    $rgd_no = trim($_POST['regno']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $pass = trim($_POST['pass']);
    $conpass = trim($_POST['conpass']);

    $_SESSION['regno'] = $rgd_no;
    $_SESSION['name'] = $name;

    if (empty($name)) {
        echo '<script> alert("Please enter your name") </script>';
        $page = file_get_contents("http://localhost/iwp%20project/SignUp.html");
        echo $page;
    }

    if(empty($rgd_no))
    {
        echo '<script> alert("Please enter your registration number") </script>';   
        $page = file_get_contents("http://localhost/iwp%20project/SignUp.html");
        echo $page;
    }

    $patt = "/[0-9]{2}[a-zA-z]{3}[0-9]{4}/";
    if(!preg_match($patt,$rgd_no))
    {
        echo '<script> alert("Please enter valid registartion number") </script>';   
        $page = file_get_contents("http://localhost/iwp%20project/SignUp.html");
        echo $page;
    }

    if(empty($email))
    {
        echo '<script> alert("Please enter your email id") </script>';   
        $page = file_get_contents("http://localhost/iwp%20project/SignUp.html");
        echo $page;
        die;
    }

    if(empty($phone))
    {
        echo '<script> alert("Please enter your phone number") </script>';   
        $page = file_get_contents("http://localhost/iwp%20project/SignUp.html");
        echo $page;
        die;
    }

    if(empty($pass))
    {
        echo '<script> alert("Please enter your password") </script>';   
        $page = file_get_contents("http://localhost/iwp%20project/SignUp.html");
        echo $page;
        die;
    }

    if(strlen($pass) < 8)
    {
        echo '<script> alert("Password should have minimum 8 characters") </script>';   
        $page = file_get_contents("http://localhost/iwp%20project/SignUp.html");
        echo $page;
        die;
    }

    if(empty($conpass))
    {
        echo '<script> alert("Please enter your confirm password") </script>';   
        $page = file_get_contents("http://localhost/iwp%20project/SignUp.html");
        echo $page;
        die;
    }

    if($pass != $conpass)
    {
        echo '<script> alert("Password and confirm password should match") </script>';   
        $page = file_get_contents("http://localhost/iwp%20project/SignUp.html");
        echo $page;
        die;
    }

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    include('connect.php');
    $query = 'insert into users values("' . $name . '","' . $rgd_no . '","' . $email . '",' .  $phone . ',"' .$pass . '");';
    $retvalue = mysqli_query($conn,$query);
    if($retvalue)
    {
        header('Location: http://localhost/IWP-JCOMP/Script/dashboard.php');
    }
    else
    {
        echo '<script> alert("Sign up failed due to some error in database updation...") </script>';      
        echo '<script> alert("Sorry... please re-enter the details to signup")</script>';
        header('Location: http://localhost/IWP-JCOMP/SignUp.html'); 
    }