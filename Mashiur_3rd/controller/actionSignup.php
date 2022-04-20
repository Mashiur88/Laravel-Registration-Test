<?php
if (isset($_POST['save'])) {  
    
    if (isset($_POST['fname'])) {
        $fName = $_POST['fname'];
    }

    if (isset($_POST['lname'])) {
        $lName = $_POST['lname'];
    }
    if (isset($_POST['uname'])) {
        $uName = $_POST['uname'];
    }
    if (isset($_POST['password'])) {
        $pass = md5($_POST['password']);
         
    }
    if (isset($_POST['address'])) {
        $address = $_POST['address'];
    }

    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    }
    

    if (isset($_POST['status'])) {
        $status = $_POST['status'];
    }
    
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if (mysqli_connect_error()) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $msg = "Connected successfully";
    if(isset($gender)&&isset($status))
    {
    $sql = "INSERT INTO `userlist` (`first_name`, `last_name`,`user_name`, `password`, `address`, `gender`, `status`)
        VALUES ('$fName', '$lName', '$uName', '$pass', '$address', '$gender', '$status')";
    
    if (mysqli_query($conn, $sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    }
    $conn->close();
}






?>