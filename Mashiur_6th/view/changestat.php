<?php
include "../class/user.php";
$user = new User();
//echo $msg;
$id = $_GET['id']; 
$btn = $_GET['btn'];
$stat = (int) !$_GET['stat'];
//echo "$id,$stat";
$set = array('status' => $stat);
//print_r($set);
$result = $user->changeStat($set,$id);

//SET ='$stat'
//if ($result == true) 
//{
    $st1 = ($stat == '1') ? 'Active' : 'Inactive';
    $st2 = ($stat == '1') ? 'Inactive' : 'Active';
    if ($btn == 1) {
        echo '<td><button class="btn btn-primary" onclick="changeStatus(' . $id . ',' . $stat . ')">' . $st2 . '</button></td>';
    } else {
        echo $st1;
    }
//}
?>
