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
$sql = "SELECT * FROM `division`";
$divisions = mysqli_query($conn, $sql);
?>
<?php
include "header.php";
?>
<div class="main-container">
    <?php include "sidebar.php"; ?> 
    
    <div class="content">
        <h1>Address</h1>
        <div>
        <label>Division</label>
        <select id="division" name="division" onchange="showDistrict(this.value)">
            <option value="">Select Division</option>
            <?php
            foreach($divisions as $div)
            {
                echo "<option value=".$div['id'].">". $div['name'] ."</option>";
            }
            ?>
        </select><br>   
        <label>District</label>
        <select name="district" id="district" onchange="showThana(this.value)"> 
            <option value="">Select District</option>
        </select><br>
        <label>Thana</label>
        <select name="thana" id="thana"> 
            <option value="">Select Thana</option>
        </select>
        </div>
    </div>
</div>
<script src="./js/Address.js"></script>
<?php include "footer.php"; ?>

