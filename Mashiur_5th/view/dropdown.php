<?php
include "../db/db.php";
$connect5 = new DB();
$columns="";
$table = "division";
$divisions = $connect5->select($columns,$table,"","","","");
?>
<?php
include "header.php";
?>
<div class="container-fluid p-0 m-0 row">
    <?php include "sidebar.php"; ?> 

    <div class="container-fluid col-lg-10 text-center bg-info">
        <h1>Address</h1>
        <div id="state">
            <label class="form-label" >Division</label>
            <select class="form-select" id="division" name="division" onchange="showDistrict(this.value)">
                <option value='0'>Select Division</option>
                <?php
                foreach ($divisions as $div) {
                    echo "<option value=" . $div['id'] . ">" . $div['name'] . "</option>";
                }
                ?>
            </select><br> 
        </div>
        <div id="zilla">
            <label class="form-label">District</label>
            <select class="form-select" name="district" id="district" onchange="showThana(this.value)"> 
                <option value='0'>Select District</option>
            </select><br>
        </div>
        <div id="upazilla">
            <label class="form-label">Thana</label>
            <select class="form-select" name="thana" id="thana"> 
                <option value='0'>Select Thana</option>
            </select><br>
        </div>
   

</div>
</div>
<script src="./js/Address.js"></script>
<?php include "footer.php"; ?>

