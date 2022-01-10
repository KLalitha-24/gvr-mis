<?php 
  session_start();
  if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Siron</title>
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
        <a class="nav-item nav-link text-white" href="#"><i class="fa fa-wrench"></i>&nbsp;Siren</a>
        <div class="ml-auto">
          <?php
            // if(!isset($_SESSION['register_id']))
            if($_SESSION['role']=="Q")
            {
              ?>

          <a class="btn btn-light" href="sidetrack.php">Siren Clearance</a>
          <?php
            }
            ?>
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
                <label>Pump Serial Number</label>
                <input type="text" name="pump_sno" id="pump_sno" class="form-control"  placeholder="Pump Serial Number" required="">
              </div>
            </td>
            <td>
              <div class="form-group">
                <label>Production Order(FG No)</label>
                <input type="text" name="fg_no" id="fg_no" class="form-control"  placeholder="FG No" readonly="">
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label>Sequence Number</label>
                <input type="text" name="seq_no" id="seq_no" class="form-control"  placeholder="Sequence Number" readonly="">
              </div>
            </td>
            <td>
              <div class="form-group">
                <label>Fg Part No</label>
                <input type="text" name="po_no" id="po_no" class="form-control"  placeholder="Production Order Number" readonly="">
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label>Customer</label>
                <input type="text" name="customer" id="customer" class="form-control"  placeholder="Customer" readonly="">
              </div>
            </td>
            <td>
              <div class="form-group">
                <label>Pump Type</label>
                <input type="text" name="pump_type" id="pump_type" class="form-control"  placeholder="Pump Type" readonly="">
              </div>
            </td>
          </tr>
          <tr>
          <tr>
            <td>
              <div class="form-group">
                <label>Operator Name</label>
                <input type="text" name="operator_name" id="operator" class="form-control"  placeholder="Operator Name" required="">
              </div>
            </td>
            <td>
              <div class="form-group">
                <label>TPI</label>
                <input type="text" name="tpi" id="tpi" class="form-control" readonly="">
                <!-- <select class="form-control" name="tpi">
                  <option>Yes</option>
                  <option>No</option>
                </select> -->
              </div> 
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label>From which Station</label>
                <select name="from_station" class="form-control">
                  <option>Pigeon Hole</option>
                  <option>HV Test</option>
                  <option>Final 2</option>
                  <option>TPI</option>
                  <option>Packing</option>
                  <option>Dispatching</option>
                  <option>External/Others</option>
                </select>
              </div>
            </td>
            <td>
              <div class="form-group">
                <label>Reason</label>
                <select name="station" class="form-control">
                  <option>Man</option>
                  <option>Machine</option>
                  <option>Method</option>
                  <option>Material</option>
                </select>
              </div> 
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label>Shift</label>
                <?php
                if(isset($_SESSION['shift']))
                {
                  ?>
                  <input type="text" name="shift"  class="form-control" value="<?php 
                  if($_SESSION['shift']=="G")
                  {
                    echo "General";
                  }
                  else if($_SESSION['shift']=="F")
                  {
                    echo "First";
                  }
                  else if($_SESSION['shift']=="S")
                  {
                    echo "Second";
                  }
                  else if($_SESSION['shift']=="T")
                  {
                    echo "Third";
                  }  ?>"  placeholder="Shift" readonly>
                  <?php
                }
                else
                {
                  ?>
                  <select name="shift" class="form-control">
                    <option>First</option>
                    <option>Second</option>
                    <option>Third</option>
                    <option>General</option>
                  </select>
                  <!-- <input type="text" name="shift"  class="form-control"  placeholder="Shift" required=""> -->
                  <?php
                }
                ?>
                
              </div>
            </td>
            <td>
              <div class="form-group">
                <label>Comments</label>
                <textarea name="comments" class="form-control"></textarea>
              </div> 
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="form-group" style="text-align: center">
                <input type="button" value="Submit" id="submit" class="btn login-btn" >
                <div class="spinner-border text-muted" id="load" style="display: none;cursor: none"></div>
              </div>
            </td>
          </tr>
        </form>
        </table>
      
      </div>
    </div>
    <br/>
    <div class="col-sm-12 box bg-white">
      <div class="row p-2">
        <div class="col-sm-4">
            <h5 class="pl-4">Siren Records</h5>
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Search" id="search">
        </div>
        <div class="col-sm-4 text-right">
          <button class="btn btn-light"  id="print-graph-btn"><i>Download Report</i></button>
        </div>
      </div>
      <br>
      <div class="table-responsive">
        <table class="table" id="siren-table">
          <tr>
            <th>Siren No</th>
            <th>Pump Sno</th>
            <th>Date</th>
            <th>Time</th>
            <th>Shift</th>
            <th>Production Order(FG No)</th>
          
            <th>Fg Part No</th>
            <th>Customer</th>
            <th>Pump Type</th>
            <th>Operator Name</th>
            <th>From which Station</th>
            <th>Reason</th>
            <th>Shift</th>
            <th>Comments</th>
          </tr>
          <tbody id="tbody">
          <?php
          include 'db.php';
          $sql="SELECT siron.id AS id,siron.pump_sno AS pump_sno,siron.date AS date1,siron.time AS time,siron.shift AS shift,master_scheduling.fg AS fg_no,master_scheduling.seq_no AS sequence_no,master_scheduling.fg_part_no AS production_order_no,master_scheduling.customer AS customer,master_scheduling.type AS pump_type,siron.operator_name AS operator_name,siron.from_station as from_station,siron.station as station,siron.shift as shift,siron.comments as comments from siron INNER JOIN master_scheduling ON master_scheduling.serial_no=siron.pump_sno";
          if($res=mysqli_query($con,$sql))
          {
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
                <td><?php echo $row['shift']; ?></td>
                <td><?php echo $row['comments']; ?></td>
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
      var d=new Date();
      $('#date').val(d);
      $('#submit').on('click',function(e)
      {
        if($('#pump_sno').val()=="")
        {
          alert("Enter Pump SNo");
        }
        if($('#operator').val()=="")
        {
          alert("Enter Operator Name");
        }
        
        if($('#operator').val()!="" &&  $('#pump_sno').val()!="")
        {
        $('#load').show();
        $('.btn').hide();
        e.preventDefault();
          $.ajax({
              url: "siron-db.php",
              type:"POST",
              data:$('#cp').serialize(),
              success: function(result){
                  $('#cp')[0].reset();
                  alert(result);
                  location.reload();
              }
          });
        }

      });
      
      $('#pump_sno').change(function()
      {
        var pump_sno=$('#pump_sno').val();
          $.ajax({
              url: "get-details.php",
              type:"POST",
              data:{pump_sno:pump_sno,key:'147',flag:'ALL'},
              success: function(result){

                  var res=result.split("+");
                  $('#fg_no').val(res[0]);
                  $('#seq_no').val(res[1]);
                  $('#po_no').val(res[2]);
                  $('#customer').val(res[3]);
                  $('#pump_type').val(res[4]);
                  $('#tpi').val(res[5]);
              }
          });
      });
      $(document).on('click','#print-graph-btn',function()
      {
          
          $("#siren-table").table2excel({
            filename: "Siren.xls"
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