<?php
include('db/db.php');
session_start();
$connect4 = new DB();
$table = "division";
$columns = "*";
$divisions = $connect4->select($columns, $table, "", "", "", "", "");

$id = $_GET['id'];
//$sql = "SELECT * FROM `userlist` WHERE id= $id";

$columns = "*,division.id as divId,division.name as division,district.id as dId,district.name as district,thana.id as tId,thana.name as thana";
$table = "userlist";
$join = "LEFT JOIN `division` ON userlist.division = division.id LEFT JOIN `district` ON userlist.district = district.id LEFT JOIN `thana` ON userlist.thana = thana.id";
$conditions = "WHERE userlist.id = $id";
$user = $connect4->select($columns,$table,$join,$conditions,"","","");

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
    
    $condition = "WHERE id =$id";
    $set = "first_name='$fname', last_name='$lname', address='$address', gender='$gender', status='$status', division=$division, district=$district, thana=$thana";
    $table = "userlist";

    $result = $connect4->update($table,$set,$condition);

    if ($result === TRUE) {
        echo "New record Updated successfully";
        header("Location: userlist.php");
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
}
?>