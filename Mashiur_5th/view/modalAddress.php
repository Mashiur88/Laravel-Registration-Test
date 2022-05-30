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

$id = $_GET['id'];
$sql = "SELECT userlist.address as address,division.name as division,district.name as district,thana.name as thana from `userlist` 
        LEFT JOIN `division` ON userlist.division = division.id 
        LEFT JOIN `district` ON userlist.district = district.id 
        LEFT JOIN `thana` ON userlist.thana = thana.id
        where userlist.id = $id";
$address = mysqli_query($conn, $sql);
//print_r($address);
if (mysqli_num_rows($address) > 0)
{
    while ($row = mysqli_fetch_assoc($address)) 
        {
            echo $row["address"] . "," . $row["division"] . "," . $row["district"] . "," . $row["thana"];
        }        
}
?>