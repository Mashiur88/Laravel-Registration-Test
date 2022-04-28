<?php

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
//echo $msg;
$id = $_GET['id'];
$btn = $_GET['btn'];
$stat = (int) !$_GET['stat'];
//echo "$id,$stat";
$sql = "UPDATE `userlist` SET status='$stat' where id = $id";
if (mysqli_query($conn, $sql) === true) {
    $st1 = ($stat == '1') ? 'Active' : 'Inactive';
    $st2 = ($stat == '1') ? 'Inactive' : 'Active';
    if ($btn == 1) {
        echo '<button onclick="changeStatus(' . $id . ',' . $stat . ')">' . $st2 . '</button></td>';
    } else {
        echo $st1;
    }
}
?>