<?php include "header.php"; ?>
    <div class="main-container">

        <?php include "sidebar.php"; ?>

        <div class="content">
            <div>
            <h3>Gallery</h3>
            <form action="" method="post" enctype='multipart/form-data'>
                <label>Upload image here:</label><br>
                <input type="file" name="image" id="image"><br>
                <input type="submit" name="save" value="save">
            </form>
            </div>
            <div>
                <img src="https://static.toiimg.com/photo/msid-58515713,width-96,height-65.cms" alt="photos" width="500" height="300">
            </div>
        </div>
    </div>
<?php include "footer.php"; ?>