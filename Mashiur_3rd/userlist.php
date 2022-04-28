<?php
include "./controller/actionUserlist.php";
include "header.php";

?>
<div class="main-container">
    <?php include "sidebar.php"; ?> 
    
    <div class="content">
        <?php
        $result=[];
        
        if(isset($_GET['pageno'])&&isset($_GET['limit']))
        { 
            $pageno = $_GET['pageno'];
            $limit= $_GET['limit'];
        }
        else
        {
            $pageno= 1;
            $limit= 2;
        }
        if(isset($_POST['send']))
        {
            $limit = $_POST['limit'];
            $pageno=1;
        }
        $sql1 = "SELECT COUNT(*) AS 'rows' FROM `userlist`";
        $rowCount = mysqli_query($conn, $sql1);
        foreach($rowCount as $row)
        {
            $rows = $row['rows'];
        } 
        $pageCount = ceil($rows/$limit);
        
        $offset = ($pageno-1) * $limit;
        
        if(isset($_POST['find']))
        {
            $name=$_POST['search'];
            $sql3="SELECT * FROM `userlist` WHERE first_name LIKE '%$name%' OR last_name LIKE '%$name%' LIMIT $limit";
            print_r($sql3);
            $result = mysqli_query($conn, $sql3);
        }
        elseif(isset($offset))
        {
        $sql2 = "SELECT * FROM `userlist` LIMIT $limit OFFSET $offset";
        print_r($sql2);
        $result = mysqli_query($conn, $sql2);
        //print_r($result);
        //header('Location: userlist.php');
        }
        else
        {    
            $sql = "SELECT * FROM `userlist`";
            $result = mysqli_query($conn, $sql);
        }
        
           
        ?>
        <div class="search">
        <form method="POST" enctype="multipart/form-data">
        <input type="text" name="search" id="search" placeholder="type here">
        <input type="submit" name="find" id="find" value="Search">
        </form>
        </div>
        <h3>User List</h3>
        <table>
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
            <?php
            if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) 
            {
            if ($row["gender"] == 1) {
            $temp = "male";
            }
            else if ($row["gender"] == 2)
            {
            $temp = "female";
            }
            if ($row["status"] == 0)
            {
                $temp1 = "Inactive";
            }
             else if ($row["status"] == 1) 
            {
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
                <td><?php echo $row["address"] ?></td>
                <td id='cxngstatus<?php echo $id; ?>'><?php echo $temp1 ?></td>
                <td id='cxngstatusBtn<?php echo $id; ?>'><button onclick="changeStatus(<?php echo "$id,$stat"; ?>)"><?php echo($row['status'] == '1')? 'Inactive' : 'Active';?></button></td>
                <td><a href = 'updateUser.php?id=<?php echo $row["id"] ?>'><button id="btn"><i class="fa-solid fa-pen"></i></button></a></td>
                <td><a href = './controller/actionDelete.php?id=<?php echo $row["id"] ?>'><button id="btn2"><i class="fa-solid fa-trash"></i></button></a></td>
            </tr>
            <?php
            }
            }
            else
            {
                 echo "<td colspan = '6'> No Data Found </td>";
            }
         
            ?>
        </table>
        <div>
            <form method='POST'>
                <select id='limit' name='limit'>
                    <!--isset($limit)&& -->
                    <option value=""<?php echo (isset($limit)&&$limit==2)? 'selected' : ''; ?>>Default</option>
                    <option value="3"<?php echo (isset($limit)&&$limit==3)? 'selected' : ''; ?>>3</option>
                    <option value="4" <?php echo (isset($limit)&&$limit==4)? 'selected' : ''; ?>>4</option>
                    <option value="5" <?php echo (isset($limit)&&$limit==5)? 'selected' : ''; ?>>5</option>
                    <option value="6" <?php echo (isset($limit)&&$limit==6)? 'selected' : ''; ?>>6</option>
                    <option value="10" <?php echo (isset($limit)&&$limit==10)? 'selected' : ''; ?>>10</option>
                    <option value="11" <?php echo (isset($limit)&&$limit==11)? 'selected' : ''; ?>>11</option>
                    <option value="12" <?php echo (isset($limit)&&$limit==12)? 'selected' : ''; ?>>12</option>
                </select>
                <input type="submit" name="send" id="send" value="setlimit">
            </form>
            <?php  
            //($pageno%3==0) ? $x :
            $y2=ceil( $pageno / 3) * 3;
            $x =(empty($pageno) || ($pageno>0 && $pageno<=3)) ? 1 : (($pageno>3 && $pageno%3==0) ? ($pageno-2) : (floor($pageno/3)*3)+1);
            $y = (empty($pageno) || ($pageno>0 && $pageno<=3)) ? ($pageCount < 3 ? $pageCount : 3) : ($pageCount < $y2 ? $pageCount : $y2);
            echo $x>1 ?  '<a href="userlist.php?pageno=1&limit='. $limit.'"><button><<</button></a>' : '';
            echo $x>1 ?  '<a href="userlist.php?pageno='. ($x-1) .'&limit='. $limit.'"><button>Prev</button></a>' : '';
            for($i=$x;$i<=$y;$i++)
            {   
               echo '<a href="userlist.php?pageno='. $i .'&limit='. $limit .'"><button>'. $i .'</button></a>';
            } 
            echo $y<$pageCount ?'<a href="userlist.php?pageno='. ($y+1) .'&limit= '. $limit.'"><button>Next</button></a>' : '';
            echo $y<$pageCount ?'<a href="userlist.php?pageno='. ($pageCount) .'&limit= '. $limit.'"><button>>></button></a>' : '';
            
            ?>
        </div>
    </div>
</div>
<script src='js/status.js'></script>
<?php include "footer.php"; ?>