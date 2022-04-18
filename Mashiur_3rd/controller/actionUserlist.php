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
if(isset($_POST['find']))
{
    
    $name=$_POST['search'];
    $sql2="SELECT * FROM `userlist` WHERE first_name LIKE '%$name%' OR last_name LIKE '%$name%'";
    $result = $conn->query($sql2);
}
else
{    
    $sql = "SELECT * FROM `userlist`";
    $result = $conn->query($sql);
}


?>