<?php 
  session_start();
  if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Monthly Plan</title>
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet"> 
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js">
  </script> 
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
    <div class="col-sm-12">
      <?php //include 'side-navbar.php'; ?>
      <br/> 
      <nav class="navbar box">
        <a class="nav-item nav-link text-white" href="#"><i class="fa fa-file"></i>&nbsp;Monthly - Day Wise Plan</a>
        <div class="ml-auto">
          <div class="row">
            <a class="btn btn-light" href="dashboard.php?date=<?php echo date("Y-m-d"); ?>">DM Dashboard</a>&nbsp;
            <a class="btn btn-light" href="view-monthly-plan-details.php">View Records</a>&nbsp;
            
          </div>
        
        </div>
      </nav>
      <br/>

      <div class="col-sm-12 bg-white box">

        <div class="row justify-content-center p-4">
          <table>
            <form id="cp" method="POST">
              <input type="hidden" name="key" value="147">
              <tr>
                <td>
                  <div class="form-group">
                    <label>Type</label>
                    <select id="pump_type" name="type" class="form-control">

                    <?php
                    include 'db.php';
                      $sql="SELECT * FROM `master_scheduling` group by type";
                      if($res=mysqli_query($con,$sql))
                      {
                        while($row=mysqli_fetch_array($res))
                        {
                          ?>
                          <option value="<?php echo $row['type']; ?>"><?php echo str_replace(" ","",$row['type']); ?></option>
                          <?php
                        }
                      }

                    ?>
                  </select>
                  </div>
                </td>
                <td>
                  <div class="form-group">
                    <label>Customer</label>
                    <select id="customer" name="customer" class="form-control">
              
                    <?php
                    include 'db.php';
                      $sql="SELECT * FROM `master_scheduling` group by customer";
                      if($res=mysqli_query($con,$sql))
                      {
                        while($row=mysqli_fetch_array($res))
                        {
                          ?>
                          <option value="<?php echo $row['customer']; ?>"><?php echo str_replace(" ","",$row['customer']); ?></option>
                          <?php
                        }
                      }

                    ?>
                  </select>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group">
                    <label>Month</label>
                    <input type="month" name="month" class="form-control">
                  </div>
                </td>
                <td>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control">
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group">
                    <label>Plan</label>
                    <input type="number" name="plan" class="form-control">
                  </div>
                </td>
                <td>
                  
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
          url: "monthly-plan-db.php",
          type:"POST",
          data:$('#cp').serialize(),
          success: function(result){
              $('#cp')[0].reset();
              alert(result);
              location.reload();
          }
      });

  });
  
  $(document).on('click','#print-graph-btn',function()
      {
          
          $("#plan-table").table2excel({
            filename: "Sidetrack.xls"
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