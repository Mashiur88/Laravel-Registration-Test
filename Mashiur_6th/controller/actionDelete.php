<?php
include "../class/user.php";
session_start();
$id = $_GET['id'];
$user = new User();
$result = $user->delete($id);
if ($result == TRUE) 
{
    echo "New record Deleted successfully";
    header("Location: ../view/userlist.php");
} else 
{
    
    //echo "Error: " . $sql . "<br>" . $this->conn->connect_error;
}
?>