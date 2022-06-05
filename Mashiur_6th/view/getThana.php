<?php
include "../class/user.php";
$id = $_GET['id'];
$user = new User();
$thana = $user->getThana($id); 

if (!empty($thana)) 
{
         echo "<option value='0'>Select Thana</option>";
    foreach($thana as $row)
        {
            echo "<option value=".$row['id'].">". $row['name'] ."</option>";
        }
        
}
else
{
    echo "<option value='0'>No Thana Found</option>";
}
    

?>