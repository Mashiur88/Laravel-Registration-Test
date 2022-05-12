<?php
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
print($secondElement);
// or

list($x,$secondElement,$y) = getArray();
print $x.','.$secondElement.','.$y;


print var_dump(implode('hello', ['a','b','c']));
//foreach($cars as $value)
//{
//    print $value.",";
//}
$firstquarter  = array(1 => 'January', 'February', 'March');
print_r($firstquarter);

// Declare and initialize array
$sides = array("Up", "Down", "Left", "Right");
$directions = array("North", "South", "West", "East");
  
// Use foreach loop to display array elements
foreach( $sides as $index => $side )
{
    echo $side . " => " . $directions[$index] . " \n";
}



?>