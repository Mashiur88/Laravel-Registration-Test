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
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
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
        header("Location: ../view/userlist.php");
    } 
    else 
    {
        //echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
}
?>