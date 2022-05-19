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


$cars = array('BMW', 'TOYOTA', 'VOLVO', 'VOLKSWAGEN', 'FERRARI', 'AUDI', 'FORD', 'Land Rover');
$cnt = count($cars);
for ($i = 0; $i < $cnt; $i++) {
    $x[$i] = $cars[$i];
}
//print_r($x);

$cont = $conta = array();
$models = array('BMW' => '7 Series', 'TOYOTA' => 'Corrolla', 'VOLVO' => 'S90', 'VOLKSWAGEN' => 'Atlas', 'FERRARI' => '296GTS', 'AUDI' => 'R8', 'Ford' => 'Mustang', 'LandRover' => 'RangeRover');

foreach ($models as $brand => $model) {
    $cont[] = ($brand);
    $conta[] = ($model);
}
//print_r($cont);
//print_r($conta);

foreach ($models as $keys => $values) {
    $models['brand'][] = $keys;
    $models['model'][] = $values;
}

print_r($models);

function getArray() {
    return array(1, 2, 3);
}

$secondElement = getArray()[1];
//print($secondElement);
// or

list($x, $secondElement, $y) = getArray();
//print $x.','.$secondElement.','.$y;
//print var_dump(implode('hello', ['a','b','c']));
//foreach($cars as $value)
//{
//    print $value.",";
//}
$firstquarter = array(1 => 'January', 'February', 'March');
//print_r($firstquarter);
// Declare and initialize array
$sides = array("Up", "Down", "Left", "Right");
$directions = array("North", "South", "West", "East");

// Use foreach loop to display array elements
foreach ($sides as $index => $side) {
    echo $side . " => " . $directions[$index];
}
echo '<br>';

$temp = $temp1 = $temp2 = $Aarray = [];
$array = array('', '');
$sql = "SELECT district.*,division.name as divName FROM `district`
        LEFT JOIN `division` ON district.division_id=division.id";
$districts = mysqli_query($conn, $sql);
if (mysqli_num_rows($districts) > 0) {
    while ($row = mysqli_fetch_assoc($districts)) {
        echo $row['id'];
        echo $row['divName'];
        print $row['name'];
        print '<br>';
        $Aarray[] = array('id' => $row['id'], 'division' => $row['divName'], 'name' => $row['name']);
//        $Aarray['id'] = $row['id'];
//        $Aarray['division_id']=$row['division_id'];
//        $Aarray['name']=$row['name'];
    }
}
$Barray = $Aarray;
echo "<pre>";
print_r($Aarray);
echo '<br>';
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





<table id="showData">
    <tr>
        <th>DivisionName</th>
        <th>DistrictId</th>
        <th>DistrictName</th>

    </tr>
    <?php
    $col = array_column($Barray, "division");
    array_multisort($col, SORT_ASC, $Barray);
    $cnt = array();
    $x = 0;
    $a = "";
    foreach ($Barray as $i => $value) {
        if ($i == 0) {
            $a = $value['division'];
            $Barray[$i]['print'] = 'y';
            $cnt[$x] ++;
        } else if ($value['division'] === $a) {
            $cnt[$x] ++;
            $Barray[$i]['print'] = 'n';
        } else {
            $Barray[$i]['print'] = 'y';
            $x++;
            $cnt[$x] ++;
            $a = $value['division'];
        }
    }
    print_r($cnt);

    $index = 0;
    foreach ($Barray as $i => $value) {

        //       print $i;
        //       print_r($value);
        //       echo $Aarray['id'];
        ?>
        <tr>
            <?php
            if ($value['print'] === 'y') {
                ?>
                <td rowspan="<?php echo $cnt[$index] ?>"><?php echo $value['division']; ?></td>
                <td><?php echo $value['id']; ?></td> 
                <td><?php echo $value['name']; ?></td>
                

                <?php
                $index++;
            } else {
                ?>        
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['name']; ?></td>
            <?php } ?>    

        </tr>


        <?php
        //$temp4[] = ($value);
    }
    ?>

</table>  

<?php
//echo '<br>';


foreach ($Aarray as $i => $value) {
    echo $i . "<br>";
    foreach ($value as $j => $data) {
        echo $j . " :" . $data;
        echo "<br>";
    }
}


$cnt = count($Aarray);
foreach ($Aarray as $i => $value) {
    if ($i < ($cnt / 2)) {
        $temp1[$i]['id'] = $value['id'];
        $temp1[$i]['division'] = $value['division'];
        $temp1[$i]['name'] = $value['name'];
    } else {
        $temp2[$i]['id'] = $value['id'];
        $temp2[$i]['division'] = $value['division'];
        $temp2[$i]['name'] = $value['name'];
    }
}
foreach ($Aarray as $i => $value) {
    if ($i < ($cnt / 2)) {
        $temp[0][] = array('id' => $value['id'], 'division' => $value['division'], 'name' => $value['name']);
        //  $temp[0]=array($i=>array('id'=>$value['id'],'division'=>$value['division'],'name'=>$value['name']));
    } else {
        $temp[1][] = array('id' => $value['id'], 'division' => $value['division'], 'name' => $value['name']);
        //   $temp[1]=array($i=>array('id'=>$value['id'],'division'=>$value['division'],'name'=>$value['name']));
    }
}



print_r($temp1);
echo '<br><br><br>';
print_r($temp2);
echo '<br><br><br>';
print_r($temp);

// print_r($Aarray);
//print_r($temp4);
$count = count($temp2);
//    foreach($temp4 as $t)
//    {
//        print $t;
//    }
?>      

?>