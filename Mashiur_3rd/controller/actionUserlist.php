<?php
session_start();
if(empty($_SESSION['user']))
{
    header('Location: login.php');
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
echo $msg;

   // $sql = "SELECT * FROM `userlist`";
   // $result = $conn->query($sql);



?>