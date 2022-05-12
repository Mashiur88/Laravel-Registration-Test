<?php
session_start();
$sql=$sql2="";
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

$sql3 = "SELECT * FROM `division`";
$divisions = mysqli_query($conn, $sql3);

$id=$_GET['id'];
//$sql = "SELECT * FROM `userlist` WHERE id= $id";
$sql = "SELECT *,division.id as divId,division.name as division,district.id as dId,district.name as district,thana.id as tId,thana.name as thana FROM `userlist`
        LEFT JOIN `division` ON userlist.division = division.id 
        LEFT JOIN `district` ON userlist.district = district.id
        LEFT JOIN `thana` ON userlist.thana = thana.id
        WHERE userlist.id = $id";  
    
$user = mysqli_query($conn, $sql);
//print_r($user);

//
if(isset($_POST['save']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $status=$_POST['status'];
    $division=$_POST['division'];
    $district=$_POST['district'];
    $thana=$_POST['thana'];
$sql2 = "UPDATE `userlist` SET first_name='$fname', last_name='$lname', address='$address', gender='$gender', status='$status', division=$division, district=$district, thana=$thana WHERE id =$id";

$result = mysqli_query($conn, $sql2);

if (mysqli_query($conn, $sql2) === TRUE) {
        echo "New record Updated successfully";
        header("Location: userlist.php");
} 
else 
{
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}

}


?>