<div class="sidebar">
    <p><b>Sidebar</b></p>
    <ul class="list">
        <li<?php if(isset($_GET['menu']) && $_GET['menu']=='webpage'){ echo 'class="active"';}?>><a href="Webpage.php?menu=webpage">Home</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="registration.php">Registration</a></li>
        <li><a href="dropdown.php">Address</a></li>
        <li><a href="userlist.php">User List</a></li>
        <li><a href="login.php">Login</a></li>
        <?php
        if(isset($_SESSION['user']))
        {   ?>
        <li><a href="./controller/logout.php">Logout</a></li>
        <?php } ?> 
    </ul>
</div>


