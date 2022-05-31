<?php
include "../class/user.php";
session_start();
$name = $password = "";
if (isset($_POST['submit'])) {
    $name = $_POST['uname'];
    $temp = md5($_POST['password']);
    $pass = substr($temp, 0,20);
    $user = new User();
    $result=$user->login($name,$pass);
   
    if ($result->num_rows > 0)
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