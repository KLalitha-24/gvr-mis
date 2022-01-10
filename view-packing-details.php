<?php 
  session_start();
  if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Packing</title>
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
   </style>

</head>
<body>
	<?php include 'header.php' ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <?php //include 'side-navbar.php'; ?>
   <!--  </div>
    <div class="col-sm-9"> -->
      <br/> 
      <nav class="navbar box">
        <a class="nav-item nav-link text-white" href="packing.php"><i class="fa fa-wrench"></i>&nbsp;View Packing Details</a>
      </nav>
      
    <br/>
    <div class="col-sm-12 box bg-white" >
        <form id="report_frm">
        <div class="row">
          
            <div class="col-sm-5">
              <br>
              <div class="row">
                <!-- <br/> -->
                <label class="col-sm-4">Start Date:</label>
                <input type="date" class="form-control col-sm-8" name="start_date" required="">
              </div>
            </div>
            <div class="col-sm-5">
              <br>
              <div class="row">
                <!-- <br/> -->
                <label class="col-sm-4">End Date:</label>
                <input type="date" class="form-control col-sm-8" name="end_date" required="">
              </div>
              <input type="hidden" name="key" value="147">
            </div>
            <div class="col-sm-1">
              <br>
              <div class="form-group">
                <input type="submit" class="btn btn-light " value="Get Report">
              </div>
            </div>
          
         
        </div>
        </form>
      </div>
      <br/>
    <div class="col-sm-12 bg-white box">
      <br/>
      <div class="row">
        <div class="col-sm-4">
            <h5 class="pl-4">Packing Records</h5>
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Search" id="search">
        </div>
        <div class="col-sm-4 text-right">
          <button class="btn btn-light"  id="print-graph-btn"><i>Download Report</i></button>
        </div>
      </div>
      <div class="table-responsive p-4" id="res_table">

        <table class="table" id="packing-table">
          <!-- <tr>
            <th colspan="10" class="text-center">Final 2 Records</th>
          </tr> -->
          <tr>
            <th>Pump Sno</th>
            <th>Date</th>
            <th>Time</th>
            <th>Shift</th>
            <th>Production Order(FG No)</th>
            <th>Sequence No</th>
            <th>Fg Part No</th>
            <th>Customer</th>
            <th>Pump Type</th>
            <th>TPI</th>
            <th>Operator Name</th>
          </tr>
          <tbody id="tbody">
          <?php
          include 'db.php';
          $sql="SELECT packing.pump_sno AS pump_sno,packing.date AS date,packing.time AS time,packing.shift AS shift,master_scheduling.fg AS fg_no,master_scheduling.seq_no AS sequence_no,master_scheduling.fg_part_no AS production_order_no,master_scheduling.customer AS customer,master_scheduling.type AS pump_type,master_scheduling.tpi AS tpi,packing.operator_name AS operator_name from packing INNER JOIN master_scheduling ON master_scheduling.serial_no=packing.pump_sno";
          if($res=mysqli_query($con,$sql))
          {
            while($row=mysqli_fetch_array($res))
            {
              ?>
              <tr>
                <td><?php echo $row['pump_sno']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['shift']; ?></td>
                <td><?php echo $row['fg_no']; ?></td>
                <td><?php echo $row['sequence_no']; ?></td>
                <td><?php echo $row['production_order_no']; ?></td>
                <td><?php echo $row['customer']; ?></td>
                <td><?php echo $row['pump_type']; ?></td>
                <td><?php echo $row['tpi']; ?></td>
                <td><?php echo $row['operator_name']; ?></td>
              </tr>
              <?php
            }
          }
          else
          {
            echo mysqli_error($con);
          }
          ?>
        </tbody>
        </table>
      </div>
    </div>
    </div>
  </div>
</div>
<div class="sticky-bottom"><?php include 'footer.php'; ?></div>
<script type="text/javascript">
   $('#report_frm').submit(function(e)
      {
        e.preventDefault();
        
          $.ajax({
              url: "get-packing-dynamic-report.php",
              type:"POST",
              data:$('#report_frm').serialize(),
              success: function(result){
                $('#res_table').html(result);
              }
          });
        });
   $(document).on('click','#print-graph-btn',function()
      {
          
          $("#packing-table").table2excel({
            filename: "Packing.xls"
        });
          
      });
   $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
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

