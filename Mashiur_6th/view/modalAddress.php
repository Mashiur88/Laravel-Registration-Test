<?php
include "../class/user.php";

$id = $_GET['id'];
$user = new User();

$person = $user->getAddress($id);
//echo "<pre>";
//print_r($person); exit;
foreach($person as $row)
    {
        echo $row["address"] . "," . $row["thana"] . "," . $row["district"] . "," . $row["division"];
    }        
?>