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
//echo $msg;
$id = $_GET['id'];
$stat = $_GET['stat'];
//$sql = "UPDATE `userlist` SET status='' where id = $id";
//if (mysqli_query($conn, $sql) === true)
//{
//    
//}
?>