<?php

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
    $id = $_GET['id'];
    $sql = "DELETE FROM `userlist` WHERE id ='$id'";
    $result = mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql) === TRUE) {
    echo "New record Deleted successfully";
    header("Location: ../userlist.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>