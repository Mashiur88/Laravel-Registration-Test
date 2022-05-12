<?php
session_start();
$name = $password = "";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";
$result="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$msg = "Connected successfully";
if (isset($_POST['submit'])) {
    $name = $_POST['uname'];
    $temp = md5($_POST['password']);
    $pass = substr($temp, 0,20);
    $sql = "SELECT * FROM `userlist` WHERE user_name ='$name' AND password ='$pass'";
    $user = mysqli_query($conn, $sql);
    //echo $user;
    if (mysqli_num_rows($user) > 0)
    {
        $_SESSION['user']=$name;
        echo "Login Successfully";
        header("Location: Webpage.php");
    } else 
    {
        echo "Your Id or Password is Incorrect";
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }  
}
?>