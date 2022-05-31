<?php
    include "../class/user.php";
    
    $user = new User();
    $divisions = $user->getDivision();
    
if (isset($_POST['save'])) {  
    
    if (isset($_POST['fname'])) {
        $fName = $_POST['fname'];
    }

    if (isset($_POST['lname'])) {
        $lName = $_POST['lname'];
    }
    if (isset($_POST['uname'])) {
        $uName = $_POST['uname'];
    }
    if (isset($_POST['password'])) {
        $pass = md5($_POST['password']);
         
    }
    if (isset($_POST['address'])) {
        $address = $_POST['address'];
    }

    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    }

    if (isset($_POST['division'])) {
        $division = $_POST['division'];
    }
    
    if (isset($_POST['district'])) {
        $district = $_POST['district'];
    }
    

    if (isset($_POST['thana'])) {
        $thana = $_POST['thana'];
    }
    
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
    }
    
    
    if(isset($gender)&&isset($status))
    {
    $values = ["'$fName'", "'$lName'", "'$uName'", "'$pass'", "'$address'", $gender, $division , $district , $thana  ,$status];
    $feedback = $user->insertData($values);
    
    
    
    //$sql = "INSERT INTO `userlist` (`first_name`, `last_name`,`user_name`, `password`, `address`, `gender`,`division`,`district`,`thana`,`status`)
    //    VALUES ('$fName', '$lName', '$uName', '$pass', '$address', '$gender', $division , $district , $thana  ,'$status')";
    
    if ($feedback === TRUE) {
        echo "New record created successfully";
    } 
    else 
    {
        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        exit;
    }
    }
}






?>