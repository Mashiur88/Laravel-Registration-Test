<div class="container-fluid col-2 text-center bg-light">
    <p class="h5"><b>Sidebar</b></p>
    <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link" href="Webpage.php?menu=webpage">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="registration.php">Registration</a></li>
        <li class="nav-item"><a class="nav-link" href="dropdown.php">Address</a></li>
        <li class="nav-item"><a class="nav-link" href="userlist.php">User List</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <?php
        if(isset($_SESSION['user']))
        {   ?>
        <li class="nav-item"><a class="nav-link" href="./controller/logout.php">Logout</a></li>
        <?php } ?> 
    </ul>
</div>


