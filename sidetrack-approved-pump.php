<?php 
  session_start();
  if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Approved Pumps</title>
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
    <!-- </div>
    <div class="col-sm-9"> -->
      <br/> 
      <nav class="navbar box">
        <a class="nav-item nav-link text-white" href="#"><i class="fa fa-wrench"></i>&nbsp;Approved Pumps</a>
      </nav>
      <br/>
    <div class="col-sm-12 box bg-white">
      <br>
      <div class="row">
       <div class="col-sm-4">
            <h5 class="pl-4">Sidetrack Approved Records</h5>
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Search" id="search">
        </div>
        <div class="col-sm-4 text-right">
          <button class="btn btn-light"  id="print-graph-btn"><i>Download Report</i></button>
        </div>
      </div>
      <br/>
      <div class="table-responsive">
        <table class="table" id="approved-table">
          <tr>
            <th>Siren No</th>
            <th>Pump Sno</th>
            <th>Date</th>
            <th>Time</th>
            <th>Shift</th>
            <th>Production Order(FG No)</th>
            <!-- <th>Sequence No</th> -->
            <th>Fg Part No</th>
            <th>Customer</th>
            <th>Pump Type</th>
            <th>Operator Name</th>
            <th>From which Station</th>
            <th>Reason</th>
            <th>Comments</th>
          </tr>
          <tbody id="tbody">
          <?php
          include 'db.php';
          $sql="SELECT siron.id AS id,pigeon_hole.pump_sno AS pump_sno,siron.approved_date AS date1,siron.approved_time AS time,pigeon_hole.fg_no AS fg_no,pigeon_hole.sequence_no AS sequence_no,pigeon_hole.production_order_no AS production_order_no,pigeon_hole.customer AS customer,pigeon_hole.pump_type AS pump_type,siron.operator_name AS operator_name,siron.from_station as from_station,siron.station as station,siron.shift as shift,siron.approved_comments as comments from siron INNER JOIN pigeon_hole ON pigeon_hole.pump_sno=siron.pump_sno WHERE siron.flag='1'";
          if($res=mysqli_query($con,$sql))
          {
            $i=0;
            while($row=mysqli_fetch_array($res))
            {
              ?>
              <tr>
                <td><?php printf("Q%04d", $row['id']); ?></td>
                <td><?php echo $row['pump_sno']; ?></td>
                <td><?php echo $row['date1']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['shift']; ?></td>
                <td><?php echo $row['fg_no']; ?></td>
                
                <td><?php echo $row['production_order_no']; ?></td>
                <td><?php echo $row['customer']; ?></td>
                <td><?php echo $row['pump_type']; ?></td>
                <td><?php echo $row['operator_name']; ?></td>
                <td><?php echo $row['from_station']; ?></td>
                <td><?php echo $row['station']; ?></td>
                <td><?php echo $row['comments']; ?></td>
              </tr>
              <?php
              $i++;
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
      
      $(document).on('click','#print-graph-btn',function()
      {
          
          $("#approved-table").table2excel({
            filename: "Approved.xls"
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