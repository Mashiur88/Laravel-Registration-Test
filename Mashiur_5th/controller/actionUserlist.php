<?php
session_start();
if (empty($_SESSION['user'])) 
{
    header('Location: login.php');
}
//$connect2 = new DB();
//$columns = "COUNT(*) AS 'rows'";
//$table = "userlist";
//$rowCount = $connect2->select($columns, $table, "", "", "", "", "");
//
////echo $msg;
//if (isset($_GET['pageno']) && isset($_GET['limit'])) {
//    $pageno = $_GET['pageno'];
//    $limit = $_GET['limit'];
//} else {
//    $pageno = 1;
//    $limit = 2;
//}
//
//if (isset($_POST['send'])) {
//    $limit = $_POST['limit'];
//    $pageno = 1;
//}
//
//if (!empty($rowCount)) {
//    foreach ($rowCount as $row) 
//    {
//        $rows = $row["rows"];
//    }
//}
//$pageCount = ceil($rows / $limit);
//
//$offset = ($pageno - 1) * $limit;
//if (isset($_POST['find'])) 
//{
//    $name = $_POST['search'];
//    $conditions = "WHERE first_name LIKE '%$name%' OR last_name LIKE '%$name%'";
//    $join = "LEFT JOIN `division` ON userlist.division = division.id 
//            LEFT JOIN `district` ON userlist.district = district.id
//            LEFT JOIN `thana` ON userlist.thana = thana.id";
//    $table = "userlist";
//    $columns = "userlist.*,division.id as divId,division.name as division,district.id as dId,district.name as district,thana.id as tId,thana.name as thana";
//    $lim = "LIMIT $limit";
//    $result = $connect2->select($columns, $table, $join, $conditions, $lim, "", "");
//} 
//elseif(isset($offset)) 
//{
//    $columns = "userlist.*,division.id as divId,division.name as division,district.id as dId,district.name as district,thana.id as tId,thana.name as thana";
//    $table = "userlist";
//    $join = "LEFT JOIN `division` ON userlist.division = division.id 
//            LEFT JOIN `district` ON userlist.district = district.id
//            LEFT JOIN `thana` ON userlist.thana = thana.id";
//    $ofset = "OFFSET $offset";
//    $lim = "LIMIT $limit";
//    //print_r($sql2);
//    $result = $connect2->select($columns, $table, $join, "", $lim, $ofset,"");
//    //print_r($result);
//    //header('Location: userlist.php');
//} 
//else {
//    $table = "userlist";
//    $columns = "*";
//    $result = $connect2->select($columns, $table, "", "", "", "", "");
//}
////$result -> free_result();
?>