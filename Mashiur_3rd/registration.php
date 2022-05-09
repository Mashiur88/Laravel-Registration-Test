<?php 
include "./controller/actionSignup.php";
include "header.php";
?>
<div class="main-container">
    <?php include "sidebar.php"; ?>
    <div class="content">
        <h3>Registration From</h3>
        <form action="" method='POST'>
            <label>First Name:</label>
            <input type="text" name="fname" id="fname"><br>
            <label>Last Name:</label>
            <input type="text" name="lname" id="lname"><br>
            <label>User Name:</label>
            <input type="text" name="uname" id="uname"><br>
            <label>Password:</label>
            <input type="password" name="password" id="password"><br>
            <div class="address">
           <div id="state">
            <label>Division</label>
                <select id="division" name="division" onchange="showDistrict(this.value)">
                    <option value='0'>Select Division</option>
                    <?php
                       foreach($divisions as $div)
                        {
                            echo "<option value=".$div['id'].">". $div['name'] ."</option>";
                        } 
                    ?>
                </select><br> 
            </div>
            <div id="zilla">
            <label>District</label>
            <select name="district" id="district" onchange="showThana(this.value)"> 
                <option value='0'>Select District</option>
            </select><br>
            </div>
            <div id="upazilla">
            <label>Thana</label>
            <select name="thana" id="thana"> 
                <option value='0'>Select Thana</option>
            </select><br>
            </div>
            </div><br>
            <label>Address:</label>
            <textarea name="address" id="address" placeholder="Enter Text Here.."></textarea><br>
   <!--         <label>Hobby:</label>
            <input type="checkbox" name="hobby" id="hobby" value="Gardening">Gardening<br>
            <input type="checkbox" name="hobby1" id="hobby1" value="Gaming">Gaming<br>
            <input type="checkbox" name="hobby2" id="hobby2" value="Drawing">Drawing<br>  -->
            <label>Gender:</label>
            <input type="radio" name="gender" id="gender" value="1">Male
            <input type="radio" name="gender" id="gender1" value="2">Female<br>
            <label>Status:</label>
            <input type="radio" name="status" id="status" value="1">Active
            <input type="radio" name="status" id="status1" value="0">Inactive<br>
            <input type="submit" name="save" value="save">
            
        </form>
    </div>
</div>
<script src="./js/Address.js"></script>
<?php include "footer.php"; ?>
        