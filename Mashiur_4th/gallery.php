<?php include "header.php"; ?>
    <div class="container-fluid p-0 m-0 row">

        <?php include "sidebar.php"; ?>

        <div class="container-fluid col-lg-10 text-center bg-info">
            <div>
            <h3>Gallery</h3>
            <form action="" method="post" enctype='multipart/form-data'>
                <label>Upload image here:</label><br>
                <input type="file" name="image" id="image"><br>
                <input type="submit" name="save" value="save">
            </form>
            </div>
            <div>
                <img class="img-fluid img-thumbnail" src="https://static.toiimg.com/photo/msid-58515713,width-96,height-65.cms" alt="photos" width="500" height="300">
            </div>
        </div>
    </div>
<?php include "footer.php"; ?>