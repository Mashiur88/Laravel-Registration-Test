<?php
include "../class/user.php";
session_start();
$user = new User();
$divisions = $user->getDivision();

$id = $_GET['id'];
//$sql = "SELECT * FROM `userlist` WHERE id= $id";
$person = $user->userData($id);

//print_r($user);
//
if (isset($_POST['save'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $division = $_POST['division'];
    $district = $_POST['district'];
    $thana = $_POST['thana'];
    
    $result = $user->updateData($id,$_POST);
    
    if ($result === TRUE) 
    {
        echo "New record Updated successfully";
        header("Location: userlist.php");
    } 
    else 
    {
        //echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
}
?>