<?php
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
$id=$_GET['id'];
$sql = "SELECT * FROM `userlist` WHERE id =$id";
$user = mysqli_query($conn, $sql);

if(isset($_POST['save']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $status=$_POST['status'];
$sql2 = "UPDATE `userlist` SET first_name='$fname', last_name='$lname', address='$address', gender='$gender', status='$status' WHERE id =$id";

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