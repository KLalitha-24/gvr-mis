<?php 
  session_start();
  if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Final 2</title>
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
        <a class="nav-item nav-link text-white" href="#"><i class="fa fa-wrench"></i>&nbsp;Final 2</a>
        <div class="ml-auto">
          <a href="view-final2-details.php" class="btn btn-light">View Records</a>
        </div>
      </nav>
      <br/>
      <div class="col-sm-12 bg-white box">

    <div class="table-responsive justify-content-center p-4">
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
                <label>FG Part No</label>
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
                <input type="text" name="operator_name" value="<?php echo $_SESSION['name']; ?>" class="form-control"  placeholder="Operator Name" readonly>
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
                  } 
                  ?>"  placeholder="Shift" readonly>
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
      <br>
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th>Pump Sno</th>
            <th>Date</th>
            <th>Time</th>
            <th>Shift</th>
            <th>Production Order(FG No)</th>
            <th>Sequence No</th>
            <th>FG Part No</th>
            <th>Customer</th>
            <th>Pump Type</th>
            <th>Operator Name</th>
          </tr>
          <?php
          include 'db.php';
          $sql="SELECT final_2.pump_sno AS pump_sno,final_2.date AS date1,final_2.time AS time,final_2.shift AS shift,master_scheduling.fg AS fg_no,master_scheduling.seq_no AS sequence_no,master_scheduling.fg_part_no AS production_order_no,master_scheduling.customer AS customer,master_scheduling.type AS pump_type,final_2.operator_name AS operator_name from final_2 INNER JOIN master_scheduling ON master_scheduling.serial_no=final_2.pump_sno ORDER BY final_2.id DESC LIMIT 10";
          if($res=mysqli_query($con,$sql))
          {
            while($_SESSION=mysqli_fetch_array($res))
            {
              ?>
              <tr>
                <td><?php echo $_SESSION['pump_sno']; ?></td>
                <td><?php echo $_SESSION['date1']; ?></td>
                <td><?php echo $_SESSION['time']; ?></td>
                <td><?php echo $_SESSION['shift']; ?></td>
                <td><?php echo $_SESSION['fg_no']; ?></td>
                <td><?php echo $_SESSION['sequence_no']; ?></td>
                <td><?php echo $_SESSION['production_order_no']; ?></td>
                <td><?php echo $_SESSION['customer']; ?></td>
                <td><?php echo $_SESSION['pump_type']; ?></td>
                <td><?php echo $_SESSION['operator_name']; ?></td>
              </tr>
              <?php
            }
          }
          else
          {
            echo mysqli_error($con);
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
      $('#submit').on('click',function(e)
      {
        $('#load').show();
        $('.btn').hide();
        e.preventDefault();
          $.ajax({
              url: "final-2-db.php",
              type:"POST",
              data:$('#cp').serialize(),
              success: function(result){
                  $('#cp')[0].reset();
                  alert(result);
                  location.reload();
              }
          });

      });
      
      $('#pump_sno').change(function()
      {
        var pump_sno=$('#pump_sno').val();
          $.ajax({
              url: "get-details.php",
              type:"POST",
              data:{pump_sno:pump_sno,key:'147',flag:'2'},
              success: function(result){

                  if(result=="Not Available/Already Done")
                  {
                    alert("Not Available/Already Done");
                  }
                  else
                  {
                    var res=result.split("+");
                    $('#fg_no').val(res[0]);
                    $('#seq_no').val(res[1]);
                    $('#po_no').val(res[2]);
                    $('#customer').val(res[3]);
                    $('#pump_type').val(res[4]);
                    $('#tpi').val(res[5]);
                  }
                  
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