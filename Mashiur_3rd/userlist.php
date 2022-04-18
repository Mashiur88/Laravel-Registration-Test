<?php
include "./controller/actionUserlist.php";
include "header.php";
?>
<div class="main-container">
    <?php include "sidebar.php"; ?>
    <div class="content">
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
            if ($result->num_rows > 0) {
                
            while ($row = $result->fetch_assoc()) {
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
                 echo "<td colspan = '5'> No Data Found </td>";
            }
                    
                    
            
                    
            ?>
        </table>
    </div>
</div>
<?php include "footer.php"; ?>