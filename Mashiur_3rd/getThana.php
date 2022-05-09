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
$sql = "SELECT * FROM thana where district_id = $id";
$thana = mysqli_query($conn, $sql);
if (mysqli_num_rows($thana) > 0) 
{
         echo "<option value='0'>Select Thana</option>";
    while ($row = mysqli_fetch_assoc($thana)) 
        {
            echo "<option value=".$row['id'].">". $row['name'] ."</option>";
        }
        
}
else
{
    echo "<option value='0'>No Thana Found</option>";
}
    

?>