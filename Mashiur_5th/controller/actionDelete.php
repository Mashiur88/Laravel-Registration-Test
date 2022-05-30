<?php
include "../db/db.php";
session_start();
$id = $_GET['id'];
$table = "userlist";

//Start:: function to Delete
$connect = new DB();
//var_dump($connect);exit;
$result = $connect->delete($table, $id);
//Stop:: function to Delete
if ($result === TRUE) {
    echo "New record Deleted successfully";
    header("Location: ../userlist.php");
} else {
    echo "Error: " . $sql . "<br>" . $this->conn->connect_error;
}
?>