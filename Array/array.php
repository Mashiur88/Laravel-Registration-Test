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


$cars=array('BMW','TOYOTA','VOLVO','VOLKSWAGEN','FERRARI','AUDI','FORD','Land Rover');
$cnt = count($cars);
for($i=0;$i<$cnt;$i++)
{
    $x[$i]=$cars[$i];
}
//print_r($x);

$cont=$conta=array();
$models=array('BMW'=>'7 Series','TOYOTA'=>'Corrolla','VOLVO'=>'S90','VOLKSWAGEN'=>'Atlas','FERRARI'=>'296GTS','AUDI'=>'R8','Ford'=>'Mustang','LandRover'=>'RangeRover');

foreach($models as $brand=>$model)
{
    $cont[]=($brand);
    $conta[]=($model);
}
//print_r($cont);
//print_r($conta);

foreach($models as $keys=>$values)
{
    $models['brand'][]=$keys;
    $models['model'][]=$values;
}
//print_r($models);


function getArray() {
    return array(1, 2, 3);
}

$secondElement = getArray()[1];
//print($secondElement);
// or

list($x,$secondElement,$y) = getArray();
//print $x.','.$secondElement.','.$y;


//print var_dump(implode('hello', ['a','b','c']));
//foreach($cars as $value)
//{
//    print $value.",";
//}
$firstquarter  = array(1 => 'January', 'February', 'March');
//print_r($firstquarter);

// Declare and initialize array
$sides = array("Up", "Down", "Left", "Right");
$directions = array("North", "South", "West", "East");
  
// Use foreach loop to display array elements
foreach( $sides as $index => $side )
{
    echo $side . " => " . $directions[$index] . " \n";
}

$temp1 = $temp2 = $Aarray = [];
$array = array('',''); 
$sql = "SELECT * FROM `district`";
$districts = mysqli_query($conn, $sql);
if (mysqli_num_rows($districts) > 0)
{
    while($row = mysqli_fetch_assoc($districts))
    {
        echo $row['id'];
        echo $row['division_id'];
        print $row['name'];
        print '<br>';
        $Aarray[]=array('id'=>$row['id'], 'division' =>$row['division_id'],'name'=>$row['name']);
//        $Aarray['id'] = $row['id'];
//        $Aarray['division_id']=$row['division_id'];
//        $Aarray['name']=$row['name'];
    }
    print_r($Aarray);
foreach($Aarray as $value)
    {
    
 //       print $i;
       //print_r($value);
//       echo $Aarray['id'];
       echo $value['id'];
       print $value['division'];
       print $value['name'];
       print '<br>';
        
        //$temp4[] = ($value);
    }
    
    
    
    foreach($Aarray as $i=>$value)
    {
        echo $i."<br>";
        foreach($value as $j=>$data)
        {
            echo $j." :".$data;
            echo "<br>";
        }
        
    }
   // print_r($Aarray);
    //print_r($temp4);
    $count = count($temp2); 
//    foreach($temp4 as $t)
//    {
//        print $t;
//    }
}
    



?>