<?php 
  session_start();
  if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Master Scheduling</title>
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
   </style>

</head>
<body>
	<?php include 'header.php' ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <?php //include 'side-navbar.php'; ?>
    <!-- </div>
    <div class="col-sm-9"> -->
      <br/> 
      <nav class="navbar box">
        <a class="nav-item nav-link text-white" href="#"><i class="fa fa-wrench"></i>&nbsp;Master Scheduling</a>
        <div class="ml-auto">
          <a href="view-master-scheduling-details.php" class="btn btn-light">View Schedule</a>
        </div>
      </nav>
      <br/>
      <div class="col-sm-12 bg-white box">

    <div class="row justify-content-center p-4">
      <table class="col-sm-4">
        <form id="cp" method="POST">
          <input type="hidden" name="key" value="147">
          <tr>
            <td>
              <div class="form-group">
                <label>Upload CSV</label>
                <input type="file" name="csv" class="form-control"  >
              </div>
            </td>
            
          </tr>
          <tr>
            <td colspan="2">
              <div class="form-group" style="text-align: center">
                <input type="submit" value="Submit" id="submit" class="btn login-btn" >
                <div class="spinner-border text-muted" id="load" style="display: none;cursor: none"></div>
              </div>
            </td>
          </tr>
        </form>
        </table>
      
      </div>
    </div>
    <br/>
    <div class="col-sm-12 bg-white box">
      <div class="row justify-content-center p-4">
        <table class="table">
          <tr>
            <th colspan="3" class="text-center">File Upload Records</th>
          </tr>
          <tr>
            <th>S.No</th>
            <th>File Name</th>
            <th>Uploaded Time</th>
          </tr>
          <?php 
          include 'db.php';
          $sql="SELECT * FROM master_scheduling_record ORDER BY date_time DESC";
          if($res=mysqli_query($con,$sql))
          {
            $i=1;
            while($row=mysqli_fetch_array($res))
            {
              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><a href="CSV/<?php echo $row['filename']; ?>" class="nav-link" download><?php echo $row['filename']; ?></a></td>
                <td><?php echo $row['date_time']; ?></td>
              </tr>
              <?php
              $i++; 
            }
            
          }

          ?>
        </table>
      </div>
    </div>
    </div>
  </div>
</div>
<div class="sticky-bottom"><?php include 'footer.php'; ?></div>
<script type="text/javascript">
      var d=new Date();
      $('#date').val(d);
      $('#cp').on('submit',function(e)
      {
        $('#load').show();
        $('.btn').hide();
        e.preventDefault();
        var formData = new FormData($('#cp')[0]);
            $.ajax({
              url: "master-scheduling-db.php",
              type:"POST",
              data:formData,
               cache: false,
               contentType: false,
               processData: false,
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