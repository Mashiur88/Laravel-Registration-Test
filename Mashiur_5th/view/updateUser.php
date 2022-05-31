<?php
include "../controller/actionUpdate.php";
include "header.php";
?>
<div class="container-fluid p-0 m-0 row">
    <?php include "sidebar.php"; ?>
    <div class="container-fluid col-lg-10 bg-info">
        <h3>Update Form</h3>
        <form action="" method='POST' enctype=''>
            <?php foreach ($person as $value) { ?>
                <label class="form-label">First Name:</label>
                <input class="form-control" type="text" name="fname" id="fname" value="<?php echo $value['first_name'] ?>"><br>
                <label class="form-label">Last Name:</label>
                <input class="form-control" type="text" name="lname" id="lname" value="<?php echo $value['last_name'] ?>"><br>
                <label class="form-label">Address:</label>
                <textarea class="form-control" name="address" id="address" ><?php echo $value['address'] ?></textarea><br>
                <div id="state">
                    <label class="form-label">Division</label>
                    <select class="form-select" id="division" name="division" onchange="showDistrict(this.value)">
                        <?php
//                        if (isset($value['division'])) {
//                            echo "<option value=" . $value['divId'] . ">" . $value['division'] . "</option>";
//                        } else {
//                            echo "<option value='0'>Select Division</option>";
//                        }
                        foreach ($divisions as $div) {
                            ?>

                            <option value="<?php echo $div['id'] ?>" <?php echo ($div['id'] === $value['divId']) ? "selected" : "" ?> > <?php echo $div['name'] ?></option>;
                            <?php
                        }
                        ?>
                    </select><br> 
                </div>
                <div id="zilla">
                    <label class="form-label">District</label>
                    <select class="form-select" name="district" id="district" onchange="showThana(this.value)"> 
                        <?php
                        if (isset($value['district'])) 
                        {
                            echo "<option value=" . $value['dId'] . ">" . $value['district'] . "</option>";
                        } 
                        else 
                        {
                            echo "<option value='0'>Select District</option>";
                        }
                        ?>
                    </select><br>
                </div>
                <div id="upazilla">
                    <label class="form-label">Thana</label>
                    <select class="form-select" name="thana" id="thana"> 
                        <?php
                        if (isset($value['thana'])) 
                        {
                            echo "<option value=" . $value['tId'] . ">" . $value['thana'] . "</option>";
                        } 
                        else 
                        {
                            echo "<option value='0'>Select Thana</option>";
                        }
                        ?>
                    </select><br>
                </div>    
                <!--         <label>Hobby:</label>
                         <input type="checkbox" name="hobby" id="hobby" value="Gardening">Gardening<br>
                         <input type="checkbox" name="hobby1" id="hobby1" value="Gaming">Gaming<br>
                         <input type="checkbox" name="hobby2" id="hobby2" value="Drawing">Drawing<br>  -->
                <label class="form-label">Gender:</label>
                <?php
                if ($value['gender'] == 1) {
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="1" checked><label class="form-check-label">Male</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="2" ><label class="form-check-label">Female</label><br>
                    </div>
                <?php } else { ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="1" ><label class="form-check-label">Male</label> 
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="2" checked><label class="form-check-label">Female</label><br>
                    </div>
                <?php } ?>
                <label class="form-label">Status:</label>
                <?php
                if ($value['status'] == 1) {
                    ?>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="status" id="status" value="1" checked><label class="form-check-label">Active</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="status" id="status" value="0"><label class="form-check-label">Inactive</label><br>
                    </div>
                <?php } else { ?>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="status" id="status" value="1"><label class="form-check-label">Active</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="status" id="status" value="0" checked><label class="form-check-label">Inactive</label><br>
                    </div>
                <?php } ?>

                <input class="align-middle btn btn-warning" type="submit" name="save" value="Update">
            <?php } ?>
        </form>
    </div>
</div>
<script src="./js/Address.js"></script>
<?php include "footer.php"; ?>