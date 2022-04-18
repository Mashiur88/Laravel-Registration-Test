<?php

$name = $password = "";
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
if (isset($_POST['submit'])) {
    $name = $_POST['uname'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM `userlist` WHERE user_name ='$name' AND password ='$pass'";
    $user=$conn->query($sql);
    //echo $user;
    if ($user->num_rows>0)
    {
        echo "Login Successfully";
        header("Location: Webpage.php");
    } else 
    {
        echo "Your Id or Password is Incorrect";
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }  
}
?>