<?php

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
    $id = $_GET['id'];
    $sql = "DELETE FROM `userlist` WHERE id ='$id'";
    $result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "New record Deleted successfully";
    header("Location: ../userlist.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>