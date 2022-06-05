<?php
include "../controller/actionLogin.php";
include "header.php";
?>
<div class="container-fluid p-0 m-0 row">
    <?php include "sidebar.php"; ?>
    <div class="container-fluid col-lg-10 text-center bg-info">
        <h3>Login</h3>
        <form action="" method='POST' enctype=''>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">UserName:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="uname" id="uname"><br>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Password:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" name="password" id="password"><br>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="login">

        </form>
    </div>
</div>
</div>
<?php include "footer.php"; ?>