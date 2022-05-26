<?php
include "./controller/actionUserlist.php";
include "header.php";
?>
<div class="container-fluid p-0 m-0 row">
    <?php include "sidebar.php"; ?> 

    <div class="container-fluid col-lg-10 text-center bg-info">
        <?php
        $result = [];

        if (isset($_GET['pageno']) && isset($_GET['limit'])) {
            $pageno = $_GET['pageno'];
            $limit = $_GET['limit'];
        } else {
            $pageno = 1;
            $limit = 2;
        }
        if (isset($_POST['send'])) {
            $limit = $_POST['limit'];
            $pageno = 1;
        }
        $sql1 = "SELECT COUNT(*) AS 'rows' FROM `userlist`";
        $rowCount = mysqli_query($conn, $sql1);
        foreach ($rowCount as $row) {
            $rows = $row['rows'];
        }
        $pageCount = ceil($rows / $limit);

        $offset = ($pageno - 1) * $limit;

        if (isset($_POST['find'])) {
            $name = $_POST['search'];
            $sql3 = "SELECT userlist.*,division.id as divId,division.name as division,district.id as dId,district.name as district,thana.id as tId,thana.name as thana FROM `userlist`
            LEFT JOIN `division` ON userlist.division = division.id 
            LEFT JOIN `district` ON userlist.district = district.id
            LEFT JOIN `thana` ON userlist.thana = thana.id 
            WHERE first_name LIKE '%$name%' OR last_name LIKE '%$name%'
            LIMIT $limit";
            //print_r($sql3);
            $result = mysqli_query($conn, $sql3);
        } elseif (isset($offset)) {
            $sql2 = "SELECT userlist.*,division.id as divId,division.name as division,district.id as dId,district.name as district,thana.id as tId,thana.name as thana FROM `userlist`
        LEFT JOIN `division` ON userlist.division = division.id 
        LEFT JOIN `district` ON userlist.district = district.id
        LEFT JOIN `thana` ON userlist.thana = thana.id
        LIMIT $limit OFFSET $offset";
            //print_r($sql2);
            $result = mysqli_query($conn, $sql2);
            //print_r($result);
            //header('Location: userlist.php');
        } else {
            $sql = "SELECT * FROM `userlist`";
            $result = mysqli_query($conn, $sql);
        }
        ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-sm-3"></div>
                <div class="col-sm-4">
                    <input class="form-control" type="text" name="search" id="search" placeholder="type here">
                </div>
                <div class="col-sm-2">
                    <input class="form-control" type="submit" name="find" id="find" value="Search">
                </div>      
            </div>
        </form>
        <h3>User List</h3>
        <table class="table table-bordered table-hover table-responsive table-striped">
            <thead class="table-dark">
                <tr>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>UserName</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Change status</th>
                    <td colspan="2"><b>Action</b></td>
                </tr>
            </thead>
            <?php
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row["gender"] == 1) {
                        $temp = "male";
                    } else if ($row["gender"] == 2) {
                        $temp = "female";
                    }
                    if ($row["status"] == 0) {
                        $temp1 = "Inactive";
                    } else if ($row["status"] == 1) {
                        $temp1 = "Active";
                    }
                    $id = $row['id'];
                    $stat = $row['status'];
                    ?>
                    <tr>
                        <td><?php echo $row["first_name"] ?></td>
                        
                        
                        <td><?php echo $row["last_name"] ?></td>
                        <td><?php echo $row["user_name"] ?></td>
                        <td><?php echo $temp ?></td>
                        <td>
                        <button type="button" class="btn btn-primary" onclick="getAddress(<?php echo $id; ?>)" data-bs-toggle="modal" data-bs-target="#myModal">
                            View Address
                        </button>
                        </td>
                        <td id='cxngstatus<?php echo $id; ?>'><?php echo $temp1 ?></td>
                        <td id='cxngstatusBtn<?php echo $id; ?>'><button class="btn btn-primary" onclick="changeStatus(<?php echo "$id,$stat"; ?>)"><?php echo($row['status'] == '1') ? 'Inactive' : 'Active'; ?></button></td>
                        <td><a href = 'updateUser.php?id=<?php echo $row["id"] ?>'><i class="fa-solid fa-pen"></i></a></td>
                        <td><a href = './controller/actionDelete.php?id=<?php echo $row["id"] ?>'><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    <!-- Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog modal-fullscreen-sm-down">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Full Address</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body" id="modal-body">
                                        
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php
                }
            } else {
                echo "<td colspan = '6'> No Data Found </td>";
            }
            ?>
        </table>
        <div>
            <form method='POST'>
                <div class="row mb-3">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-4">
                        <select class="form-select" id='limit' name='limit'>
                            <!--isset($limit)&& -->
                            <option value=""<?php echo (isset($limit) && $limit == 2) ? 'selected' : ''; ?>>Default</option>
                            <option value="3"<?php echo (isset($limit) && $limit == 3) ? 'selected' : ''; ?>>3</option>
                            <option value="4" <?php echo (isset($limit) && $limit == 4) ? 'selected' : ''; ?>>4</option>
                            <option value="5" <?php echo (isset($limit) && $limit == 5) ? 'selected' : ''; ?>>5</option>
                            <option value="6" <?php echo (isset($limit) && $limit == 6) ? 'selected' : ''; ?>>6</option>
                            <option value="10" <?php echo (isset($limit) && $limit == 10) ? 'selected' : ''; ?>>10</option>
                            <option value="11" <?php echo (isset($limit) && $limit == 11) ? 'selected' : ''; ?>>11</option>
                            <option value="12" <?php echo (isset($limit) && $limit == 12) ? 'selected' : ''; ?>>12</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-control" type="submit" name="send" id="send" value="setlimit">
                    </div>
                </div>
            </form>
            <?php
            //($pageno%3==0) ? $x :
            $y2 = ceil($pageno / 3) * 3;
            $x = (empty($pageno) || ($pageno > 0 && $pageno <= 3)) ? 1 : (($pageno > 3 && $pageno % 3 == 0) ? ($pageno - 2) : (floor($pageno / 3) * 3) + 1);
            $y = (empty($pageno) || ($pageno > 0 && $pageno <= 3)) ? ($pageCount < 3 ? $pageCount : 3) : ($pageCount < $y2 ? $pageCount : $y2);
            echo '<ul class="pagination">';
            echo $x > 1 ? '<li class="page-item"><a class="page-link" href="userlist.php?pageno=1&limit=' . $limit . '"><<</a></li>' : '';
            echo $x > 1 ? '<li class="page-item"><a class="page-link" href="userlist.php?pageno=' . ($x - 1) . '&limit=' . $limit . '">Prev</a></li>' : '';
            for ($i = $x; $i <= $y; $i++) {
                echo '<li class="page-item"><a class="page-link" href="userlist.php?pageno=' . $i . '&limit=' . $limit . '">' . $i . '</a></li>';
            }
            echo $y < $pageCount ? '<li class="page-item"><a class="page-link" href="userlist.php?pageno=' . ($y + 1) . '&limit= ' . $limit . '">Next</a></li>' : '';
            echo $y < $pageCount ? '<li class="page-item"><a class="page-link" href="userlist.php?pageno=' . ($pageCount) . '&limit= ' . $limit . '">>></a></li>' : '';
            echo '</ul>';
            ?>
        </div>
    </div>
</div>
<script src='js/status.js'></script>
<script src='js/modal.js'></script>
<?php include "footer.php"; ?>