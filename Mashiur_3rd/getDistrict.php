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
echo $msg;
$id = $_GET['id'];
$sql = "SELECT * FROM district where division_id = $id";
$districts = mysqli_query($conn, $sql);
if (mysqli_num_rows($districts) > 0) 
{
         echo "<option value='0'>Select District</option>";
    while ($row = mysqli_fetch_assoc($districts)) 
        {
            echo "<option value=".$row['id'].">". $row['name'] ."</option>";
        }        
}
else
{
    echo "<option value='0'>No District Found</option>";
}
?>