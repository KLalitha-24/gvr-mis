<?php 
  session_start();
  if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet"> 
   <style type="text/css">
    td
    {
      font-weight: bold;
    }
   </style>

</head>
<body>
	<?php include 'header.php' ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3">
      <?php include 'side-navbar.php'; ?>
    <!-- </div>
    <div class="col-sm-9"> -->
      <br/> 
      <nav class="navbar box">
        <a class="nav-item nav-link text-white" href="#"><i class="fa fa-home"></i>&nbsp;Home</a>
        <div class="ml-auto">
          <div class="row">
            <?php
            if(!isset($_SESSION['register_id']))
            {
              if($_SESSION['role']!="Q")
              {
            ?>
            <div class="dropdown">
              <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                <i>Quick Access</i>
              </button>
              &nbsp;
              <div class="dropdown-menu">
                <a class="dropdown-item" href="master-scheduling.php">Master Scheduling</a>
                <a class="dropdown-item" href="pigeon-hole.php">Pigeon Hole</a>
                <a class="dropdown-item" href="hv-test.php">HV Test</a>
                <a class="dropdown-item" href="final-2.php">Final 2</a>
                <a class="dropdown-item" href="packing.php">Packing</a>
                <a class="dropdown-item" href="dispatching.php">Dispatching</a>
                <!-- <a class="dropdown-item" href="shift-management.php">Shift Management</a> -->
                <a class="dropdown-item" href="view-operator-details.php">Operator Management</a>
              </div>
            </div>
            <?php
              }
              if($_SESSION['role']!="Q")
              {
            ?>
            <a class="btn btn-light" href="dashboard.php?date=<?php echo date("Y-m-d"); ?>">DM Dashboard</a>
            &nbsp;
            <?php
              }
              ?>
            <a class="btn btn-light" href="siron.php">Siren</a>
            &nbsp;
            <?php

            }
            ?>
          </div>
        
        </div>
      </nav>
      <br/>

      <?php
      // echo $_SESSION['access']."a";
        if(!isset($_SESSION['register_id']))
        {
      ?>
      <div class="d-flex justify-content-center ">
        <div class="col-sm-12 box bg-white p-2 text-center">
          <div >
              <?php
              include 'db.php';
              $mail=$_SESSION['mail'];
              $sql="SELECT * FROM user WHERE username=?";
              $sql_stmt = mysqli_prepare($con, $sql);
              mysqli_stmt_bind_param($sql_stmt, 's',$mail);
              mysqli_stmt_execute($sql_stmt);   
              $res=mysqli_stmt_get_result($sql_stmt);
              $row=mysqli_fetch_array($res);
              echo '<div><b>Last Logged in On</b>&nbsp;<i class="fa fa-clock"></i><br/><p class="text-dark"> '.$row['last_login'].'</p></div>';
              echo '<div><b>No of Times Logged in</b>&nbsp;<i class="fa fa-clock"></i><br/><p class="text-dark">'.$row['login_count'].'</p></div>';

              ?>
          </div>
        
        </div>
      </div>
      <?php
      }
      ?>
      <br/>
      <?php
        if($_SESSION['role']!="Q")
        {
        ?>
        <div class="card-deck">
            <?php
            if(!isset($_SESSION['register_id']))
            {
              ?>
              <div class="card box">
                <div class="card-body text-center">
                  <p class="card-text"><a href="master-scheduling.php" class="nav-link">Master Scheduling</a></p>
                </div>
              </div>
              <?php
            }
            if(!isset($_SESSION['register_id']) || (isset($_SESSION['PH']) && $_SESSION['PH']==1))
            {
              ?><div class="card box">
                <div class="card-body text-center">
                  <p class="card-text"><a href="pigeon-hole.php" class="nav-link">Pigeon Hole</a></p>
                </div>
              </div>
              <?php
            }
            if(!isset($_SESSION['register_id']) || (isset($_SESSION['HV']) && $_SESSION['HV']==1))
            {
              ?>
            <div class="card box">
              <div class="card-body text-center">
                <p class="card-text"><a href="hv-test.php" class="nav-link">HV Test</a></p>
              </div>
            </div>
          </div>
          <br/>
          <div class="card-deck">
            <?php
            }
            if(!isset($_SESSION['register_id']) ||(isset($_SESSION['F2']) && $_SESSION['F2']==1))
            {
              ?>
            <div class="card box">
              <div class="card-body text-center">
                <p class="card-text"><a href="final-2.php" class="nav-link">Final 2</a></p>
              </div>
            </div>
            <?php
            }
            // if(!isset($_SESSION['register_id']))
            // {
              ?>
            <!-- <div class="card box">
              <div class="card-body text-center">
                <p class="card-text"><a href="tpi.php" class="nav-link">TPI</a></p>
              </div>
            </div> -->
            <?php
            // }
            if(!isset($_SESSION['register_id']) || (isset($_SESSION['PK']) && $_SESSION['PK']==1))
            {
              ?>
            <div class="card box">
              <div class="card-body text-center">
                <p class="card-text"><a href="packing.php" class="nav-link">Packing</a></p>
              </div>
            </div>
            <?php
            }
            
            if(!isset($_SESSION['register_id']) || (isset($_SESSION['DP']) && $_SESSION['DP']==1))
            {
              ?>
            <div class="card box">
              <div class="card-body text-center">
                <p class="card-text"><a href="dispatching.php" class="nav-link">Dispatching</a></p>
              </div>
            </div>
            <?php
            }
            ?>
          </div>
          <?php
          }
          
          if($_SESSION['role']=="Q")
            {
              ?>
            <div class="card box">
              <div class="card-body text-center">
                <p class="card-text"><a href="tpi.php" class="nav-link">TPI</a></p>
              </div>
            </div>
            <?php
            }
            ?>
          <br/>
          <br/>
          <div class="card-deck">
            
            
            <div class="card box">
              <div class="card-body text-center">
                <p class="card-text"><a href="siron.php" class="nav-link">Siren</a></p>
              </div>
            </div>
            
            <?php
            if($_SESSION['role']=="Q")
            {
              ?>
            <div class="card box">
              <div class="card-body text-center">
                <p class="card-text"><a href="sidetrack-rejected-pump.php" class="nav-link">Side Track</a></p>
              </div>
            </div>
            <?php
            }
            ?>
          </div>
          
      
      
     
    </div>
  </div>
</div>
<div class="sticky-bottom"><?php include 'footer.php'; ?></div>



</body>
</html>
<?php 
  }
  else
  {
    header("location:index.php");
  }
 ?>