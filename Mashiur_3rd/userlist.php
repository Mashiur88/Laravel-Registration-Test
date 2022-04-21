<?php
include "./controller/actionUserlist.php";
include "header.php";
?>
<div class="main-container">
    <?php include "sidebar.php"; ?> 
    
    <div class="content">
        <?php
        $result=[];
        $pageno= 1;
        $limit= 2;
        if(isset($_GET['pageno'])&&isset($_GET['limit']))
        { 
            $pageno = $_GET['pageno'];
            $limit= $_GET['limit'];
        }
        if(isset($_POST['send']))
        {
            $limit = $_POST['limit'];
            $offset=0;
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
        //header('Location: ../userlist.php');
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
             else if ($row["status"] == 1) {
                $temp1 = "Active";
            }
            echo "<tr>
                <td>" . $row["first_name"] . "</td>
                <td>" . $row["last_name"] . "</td>
                <td>" . $row["user_name"] . "</td>
                <td>" . $temp . "</td>
                <td>" . $row["address"] . "</td>
                <td>" . $temp1 . "</td>
                <td><a href = 'updateUser.php?id=".$row["id"]."'><button>Edit</button></a></td>
                <td><a href = './controller/actionDelete.php?id=".$row["id"]."'><button>Delete</button></a></td>
                
            </tr>";
               
            }
            }
            else {
                 echo "<td colspan = '6'> No Data Found </td>";
            }
         
            ?>
        </table>
        <div>
            <form method='POST'>
            <select id='limit' name='limit'>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <input type="submit" name="send" id="send" value="setlimit">
            </form>
            <?php
            $x=1; $y=$pageCount;      
            $y2=ceil( $pageCount / 3) * 3;
            echo $x>1 ?  '<a href="userlist.php?pageno='. $x-1 .'&limit= '. $limit .'">Prev</a>' : null;
            for($i=$x;$i<=$y;$i++)
            {  
               
               echo '<a href="userlist.php?pageno='. $i .'&limit= '. $limit .'"><button>'. $i .'</button></a>';
               $x =(empty($pageno) || ($pageno>0 && $pageno<=3)) ? 1 :(floor($pageno/3)*3)+1;
               $y = (empty($pageno) || ($pageno>0 && $pageno<=3)) ? ($pageCount < 3 ? $pageCount : 3) : ($pageCount < $y2 ? $pageCount : $y2); 
               
            } 
            echo $y<$pageCount ? '<a href="userlist.php?pageno='. ($y+1) .'&limit= '. $limit .'">Next</a>' : NULL;
            
            ?>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>