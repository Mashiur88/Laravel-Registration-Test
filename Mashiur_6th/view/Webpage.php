<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location: login.php');
}
include "header.php";
?>

<div class="container-fluid p-0 m-0 row">

    <?php
    include "sidebar.php";
    ?>

    <?php
    include "content.php";
    ?>
    


</div>
<?php include "footer.php" ?>
