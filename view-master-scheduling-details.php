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
        <a class="nav-item nav-link text-white" href="master-scheduling.php"><i class="fa fa-wrench"></i>&nbsp;Master Scheduling Details</a>
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
            <h5 class="pl-4">Master Scheduling Records</h5>
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Search" id="search">
        </div>
        <div class="col-sm-4 text-right">
          <button class="btn btn-light"  id="print-graph-btn"><i>Download Report</i></button>
        </div>
      </div>
      <div class="table-responsive p-4" id="res_table">
        
        <table class="table" id="master_schedule">
          <!-- <tr>
            <th colspan="12" class="text-center">Master Scheduling Records</th>
          </tr> -->
          <tr>
            <th>Seq No</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Type</th>
            <th>Sale Order</th>
            <th>Production Order(FG)</th>
            <th>Production Order(SFG)</th>
            <th>FG Part No</th>
            <th>Serial No</th>
            <th>Description</th>
            <th>TPI</th>
            <th>Dial Face Sticker</th>
          </tr>
          <tbody id="tbody">
          <?php 
          include 'db.php';
          $sql="SELECT * FROM master_scheduling ORDER BY id DESC";
          if($res=mysqli_query($con,$sql))
          {
            $i=1;
            while($row=mysqli_fetch_array($res))
            {
              ?>
              <tr>
                <td><?php echo $row['seq_no']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['customer']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td><?php echo $row['sale_order']; ?></td>
                <td><?php echo $row['fg']; ?></td>
                <td><?php echo $row['sfg']; ?></td>
                <td><?php echo $row['fg_part_no']; ?></td>
                <td><?php echo $row['serial_no']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['tpi']; ?></td>
                <td><?php echo $row['dial_face_sticker']; ?></td>
            </tr>
              <?php
            }
            $i++;
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
              url: "get-master-scheduling-dynamic-report.php",
              type:"POST",
              data:$('#report_frm').serialize(),
              success: function(result){
                $('#res_table').html(result);
              }
          });
        });
      $(document).on('click','#print-graph-btn',function()
      {
          
          $("#master_schedule").table2excel({
            filename: "Master Scheduling.xls"
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
