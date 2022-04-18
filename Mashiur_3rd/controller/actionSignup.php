<?php
if (isset($_POST['save'])) {  
    
    if (isset($_POST['fname'])) {
        $fName = $_POST['fname'];
    }

    if (isset($_POST['lname'])) {
        $lName = $_POST['lname'];
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
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $msg = "Connected successfully";
    if(isset($gender)&&isset($status))
    {
    $sql = "INSERT INTO `userlist` (`first_name`, `last_name`, `address`, `gender`, `status`)
        VALUES ('$fName', '$lName', '$address', '$gender', '$status')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
    $conn->close();
}






?>