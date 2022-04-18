<?php 
include "./controller/actionLogin.php";
include "header.php";
?>
<div class="main-container">
    <?php include "sidebar.php"; ?>
    <div class="content">
        <h3>Login</h3>
        <form action="" method='POST' enctype=''>
            <label>UserName:</label>
            <input type="text" name="uname" id="uname"><br>
            <label>Password:</label>
            <input type="password" name="password" id="password"><br>
            <input type="submit" name="submit" value="login">
            
        </form>
    </div>
</div>
<?php include "footer.php"; ?>