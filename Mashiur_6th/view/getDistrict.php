<?php
include "../class/user.php";
$id = $_GET['id'];
$user = new User();
$districts = $user->getDistrict($id); 

if (!empty($districts)) 
{
         echo "<option value='0'>Select District</option>";
    foreach($districts as $row) 
        {
            echo "<option value=".$row['id'].">". $row['name'] ."</option>";
        }        
}
else
{
    echo "<option value='0'>No District Found</option>";
}
?>