     <?php 
        session_start();
        if(empty($_SESSION['user']))
        {
            header('Location: login.php');
        }
     include "header.php"; 
     ?>
    
    <div class="main-container">
        
        <?php 
            include "sidebar.php"; 
        ?>
        
        <?php
            include "content.php";
        ?>
        
    </div>
    <?php include "footer.php"?>
