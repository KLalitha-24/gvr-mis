<?php 
  session_start();
  if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  {
?>
<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
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
      <br/> 
      <nav class="navbar box">
        <a class="nav-item nav-link text-white" href="#"><i class="fas fa-key"></i>&nbsp;Change Password</a>
        <div class="ml-auto">
          <!-- <div class="row">
            <a class="btn btn-light" href="dashboard.php">DM Dashboard</a>
            
          </div> -->
        
        </div>
      </nav>
      <br/>

      
      <div class="d-flex justify-content-center ">
        <div class="col-sm-12 box bg-white p-2 text-center">
          <div class="row justify-content-center">
              <div class="col-sm-4">
                <form id="cp">
                <div class="form-group">
                  <?php
                    if(isset($_SESSION['mail']))
                    {
                      ?>
                      <label>Email ID</label>
                      <input type="text" name="mail" class="form-control" value="<?php echo $_SESSION['mail']; ?>" readonly>
                      <?php
                    }
                    else if(isset($_SESSION['register_id']))
                    {
                      ?>
                      <label>Roll No</label>
                      <input type="text" name="mail" class="form-control" value="<?php echo $_SESSION['register_id']; ?>" readonly> 
                      <?php
                    }
                  ?>
                </div>
                <div class="form-group">
                  <label>Old Password</label>
                  <input type="password" name="old" class="form-control">
                </div>
                <div class="form-group">
                  <label>New Password</label>
                  <input type="password" name="new" class="form-control">
                </div>
                <input type="hidden" name="key" value="147">
                <br/>
                <div class="form-group text-center">
                   <input type="submit" value="Submit" id="submit" class="btn login-btn" >
                    <div class="spinner-border text-muted" id="load" style="display: none;cursor: none"></div>
                </div>
              </form>
              </div>
          </div>
        
        </div>
      </div>
      <br>
      
      
     
    </div>
  </div>
</div>
<div class="sticky-bottom"><?php include 'footer.php'; ?></div>
<script type="text/javascript">
  $('#cp').on('submit',function(e)
  {
    $('#load').show();
    $('.btn').hide();
    e.preventDefault();
      $.ajax({
          url: "changepassword.php",
          type:"POST",
          data:$('#cp').serialize(),
          success: function(result){
              $('#cp')[0].reset();
              alert(result);
              location.reload();
          }
      });

  });
  
</script>


</body>
</html>
<?php 
  }
  else
  {
    header("location:index.php");
  }
 ?>