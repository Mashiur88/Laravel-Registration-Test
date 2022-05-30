<?php
include "../db/db.php";
session_start();
$connect1 = new DB();
$name = $password = "";
if (isset($_POST['submit'])) {
    $name = $_POST['uname'];
    $temp = md5($_POST['password']);
    $pass = substr($temp, 0,20);
    $condition = "WHERE user_name ='$name' AND password ='$pass'";
    $table= "userlist";
    $columns = "user_name,password"; 
    $result = $connect1->select($columns,$table,$condition,"","","","");
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