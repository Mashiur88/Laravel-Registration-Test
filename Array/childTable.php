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

//$temp = $temp1 = $temp2 = $Aarray = [];
//$array = array('', '');
$sql = "SELECT userlist.*,division.name as divName,district.name as disName,thana.name as tName FROM `userlist`
        LEFT JOIN `division` ON division.id=userlist.division
        LEFT JOIN `district` ON district.id=userlist.district
        LEFT JOIN `thana` ON thana.id=userlist.thana
        ORDER BY divName,disName,tName";
$list = mysqli_query($conn, $sql);

if (mysqli_num_rows($list) > 0) {
    while ($row = mysqli_fetch_assoc($list)) {
        $Aarray[] = array('id' => $row['id'], 'fullname' => $row['first_name'] . $row['last_name'], 'division' => $row['divName'], 'district' => $row['disName'], 'thana' => $row['tName']);
    }
}

echo "<pre>";
//print_r($Aarray);
echo "</pre>";
?>
<style>
    table,tr
    {
        border: 2px solid red;
        border-collapse: collapse;
        width: 100%
            text-align: center;
    }
    td,th
    {
        border: 2px solid red;
        padding: 10px;
    }
</style>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <table id="showData">
            <tr>
                <th>DivisionName</th>
                <th>DistrictName</th>
                <th>Thana</th>
                <th>Id</th>
                <th>FullName</th>
            </tr>
            <?php
            $divrowSpan = $disrowSpan = $throwSpan = array();
            $x = $y = $z = 0;
            $a = $b = $c = "";

            foreach ($Aarray as $i => $value) {
                if ($i == 0) {
                    $a = $value['division'];
                    $Aarray[$i]['Dprint'] = 'y';
                    $divrowSpan[$x]++;
                } else if ($value['division'] === $a) {
                    $divrowSpan[$x]++;
                    $Aarray[$i]['Dprint'] = 'n';
                } else {
                    $Aarray[$i]['Dprint'] = 'y';
                    $x++;
                    $divrowSpan[$x]++;
                    $a = $value['division'];
                }
            }
            foreach ($Aarray as $i => $value) {
                if ($i == 0) {
                    $b = $value['district'];
                    $Aarray[$i]['Sprint'] = 'y';
                    $disrowSpan[$y]++;
                } else if ($value['district'] === $b) {
                    $disrowSpan[$y]++;
                    $Aarray[$i]['Sprint'] = 'n';
                } else {
                    $Aarray[$i]['Sprint'] = 'y';
                    $y++;
                    $disrowSpan[$y]++;
                    $b = $value['district'];
                }
            }
            foreach ($Aarray as $i => $value) {
                if ($i == 0) {
                    $c = $value['thana'];
                    $Aarray[$i]['Tprint'] = 'y';
                    $throwSpan[$z]++;
                } else if ($value['thana'] === $c) {
                    $throwSpan[$z]++;
                    $Aarray[$i]['Tprint'] = 'n';
                } else {
                    $Aarray[$i]['Tprint'] = 'y';
                    $z++;
                    $throwSpan[$z]++;
                    $c = $value['thana'];
                }
            }
            echo "<pre>";
            print_r($throwSpan);
            echo "</pre>";

            $index = $index1 = $index2 = 0;
            foreach ($Aarray as $i => $value) {
                ?>
                <tr>
                    <?php
                    if ($value['Dprint'] === 'y') {
                        ?>
                        <td rowspan="<?php echo $divrowSpan[$index] ?>"><?php echo $value['division']; ?></td>
                        <?php
                        if ($value['Sprint'] === 'y') {
                            ?>
                            <td rowspan="<?php echo $disrowSpan[$index1] ?>"><?php echo $value['district']; ?></td>
                            <?php
                            if ($value['Tprint'] === 'y') {
                                ?>
                                <td rowspan="<?php echo $throwSpan[$index2] ?>"><?php echo $value['thana']; ?></td>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['fullname']; ?></td>
                                <?php
                                $index2++;
                            } else {
                                ?>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['fullname']; ?></td>
                                <?php
                            }
                            ?> 
                            <?php
                            $index1++;
                        } else {

                            if ($value['Tprint'] === 'y') {
                                ?>
                                <td rowspan="<?php echo $throwSpan[$index2] ?>"><?php echo $value['thana']; ?></td>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['fullname']; ?></td>
                                <?php
                                $index2++;
                            } else {
                                ?>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['fullname']; ?></td>?>
                                <?php
                            }
                            ?> 
                        <?php } ?>  


                        <?php
                        $index++;
                    } else {
                        ?>        
                        <?php
                        if ($value['Sprint'] === 'y') {
                            ?>
                            <td rowspan="<?php echo $disrowSpan[$index1] ?>"><?php echo $value['district']; ?></td>
                            <?php
                            if ($value['Tprint'] === 'y') {
                                ?>
                                <td rowspan="<?php echo $throwSpan[$index2] ?>"><?php echo $value['thana']; ?></td>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['fullname']; ?></td>
                                <?php
                                $index2++;
                            } else {
                                ?>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['fullname']; ?></td>?>
                                <?php
                            }
                            ?>
                            <?php
                            $index1++;
                        } else {
                            ?> 
                            <?php
                            if ($value['Tprint'] === 'y') {
                                ?>
                                <td rowspan="<?php echo $throwSpan[$index2] ?>"><?php echo $value['thana']; ?></td>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['fullname']; ?></td>
                                <?php
                                $index2++;
                            } else {
                                ?>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['fullname']; ?></td>?>
                                <?php
                            }
                            ?>
                        <?php } ?>
                    <?php } ?>    

                </tr>


                <?php
            }
            ?>




    </body>
</html>
