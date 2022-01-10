
<nav class="navbar navbar-expand-xl navbar-dark sticky-top box" style="background-color: black">
    <div class="navbar-nav">
            <a class="nav-item nav-link active box" id="hl" ><img src="images/logo.png"  class="rounded" width="200px"  /></a>
        </div>
    <!-- <button class="navbar-toggler text-white" align="right" style="border:none;outline:none" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup"> -->
       
        
    <div class="navbar-nav ml-auto" style="flex-direction: row">
            <a class="nav-item nav-link active" id="hl" href="home.php"><i class="fa fa-home"></i>&nbsp;Home</a>&nbsp;&nbsp;
            <a class="nav-item nav-link active" id="hl" href="changepassword-form.php"><i class="fas fa-key"></i>&nbsp;Change Password</a>&nbsp;&nbsp;
            <?php
            if(isset($_SESSION['mail']) && $_SESSION['role']!="Q")
            {
                ?>
                <a class="nav-item nav-link active" id="hl" href="user-management.php"><i class="fa fa-user"></i>&nbsp;User Management</a>&nbsp;&nbsp;
                <?php
            }
            ?>
            
            <a class="nav-item nav-link active" id="hl" href="#"><i class="fa fa-user"></i>&nbsp;Welcome,<?php echo $_SESSION['name']; ?></a>&nbsp;&nbsp;
            <a class="nav-item nav-link active" href="logout.php"><i class="fa fa-power-off"></i>&nbsp;Logout</a>
    <!-- </div> -->
        
    </div>
</nav>