<?php
include "./controller/actionUserlist.php";
include "header.php";
?>
<div class="main-container">
    <?php include "sidebar.php"; ?> 
    
    <div class="content">
        <?php
        $sql1 = "SELECT COUNT(*) AS 'rows' FROM `userlist`";
        $rowCount = mysqli_query($conn, $sql1);
        foreach($rowCount as $row)
        {
            $rows = $row['rows'];
        }
        $pageno= 1;
        $limit= 2;
        $pageCount = ceil($rows/$limit);
        if(isset($_GET['pageno'])&&isset($_GET['limit']))
        { 
            $pageno = $_GET['pageno'];
            $limit= $_GET['limit'];
        }
        $offset = ($pageno-1) * $limit;

        //pagination($limit,$offset);
        if(isset($offset))
        {
        $sql2 = "SELECT * FROM `userlist` LIMIT '$limit' OFFSET '$offset'";
        print_r($sql2);
        $result = mysqli_query($conn, $sql2);
        //print_r($result);
        //header('Location: ../userlist.php');
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
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
            </select>
            <input type="submit" name="send" id="send" value="setlimit">
            </form>
            <?php
            for($i=1;$i<=$pageCount;$i++)
        {  
           
           echo '<a href="userlist.php?pageno='. $i .'&limit= '. $limit .'"><button>'. $i .'</button></a>';
        
        }  echo $offset; 
            ?>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>