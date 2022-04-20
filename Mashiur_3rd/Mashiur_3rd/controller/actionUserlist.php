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
if(isset($_POST['find']))
{
    $name=$_POST['search'];
    $sql3="SELECT * FROM `userlist` WHERE first_name LIKE '%$name%' OR last_name LIKE '%$name%'";
    $result = mysqli_query($conn, $sql3);
}
else
{    
    $sql = "SELECT * FROM `userlist`";
    $result = mysqli_query($conn, $sql);
}
   // $sql = "SELECT * FROM `userlist`";
   // $result = $conn->query($sql);



?>