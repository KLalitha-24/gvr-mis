<?php 
  session_start();
  if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  {
?>
<!DOCTYPE html>
<html>
<head>
	<title>TPI</title>
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
        <a class="nav-item nav-link text-white" href="#"><i class="fa fa-wrench"></i>&nbsp;TPI</a>
        <div class="ml-auto">
          <a href="view-tpi-details.php" class="btn btn-light">View Records</a>
        </div>
      </nav>
      <br/>
      <div class="col-sm-12 bg-white box">

    <div class="table-responsive justify-content-center p-4" style="max-height: 500px;overflow: scroll;">
      <table>
        <form id="cp" method="POST">
          <input type="hidden" name="key" value="147">
          <?php
          include 'db.php';
          $sql="SELECT * FROM `master_scheduling` WHERE flag='3' AND (tpi='YES\r' OR tpi='YES') AND siron_flag!='1'";
          if($res=mysqli_query($con,$sql))
          {
            if(mysqli_num_rows($res)==0)
            {
              echo "Not Available/Already Done";
            }
            else
            {
              ?>
              <tr>
                <th></th>
                <th>Pump Sno</th>
                <th>Production Order(FG No)</th>
                <th>Sequence No</th>
                <th>Fg Part No</th>
                <th>Customer</th>
                <th>Pump Type</th>
              </tr>
              <?php
              while ($row=mysqli_fetch_array($res))
              {
                ?>
                <tr>
                  <td>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" name="data[]" class="form-check-input data" value="<?php echo $row['serial_no'] ?>">
                      </label>
                    </div>
                  </td>
                  <td>
                    <?php echo $row['serial_no']; ?>

                  </td>
                  <td>
                    <?php echo $row['fg']; ?>
                  </td>
                  <td>
                    <?php echo $row['seq_no']; ?>
                  </td>
                  <td>
                    <?php echo $row['fg_part_no']; ?>
                  </td>
                  <td>
                    <?php echo $row['customer']; ?>
                  </td>
                  <td>
                    <?php echo $row['type']; ?>
                  </td>
                </tr>
                <?php
                // echo $row['fg']."+".$row['seq_no']."+".$row['fg_part_no']."+".$row['customer']."+".$row['type']."+".$row['tpi'];
              }
            }
            
            
          }
          ?>
          
          <!-- <tr>
            <td>
              <div class="form-group">
                <label>Pump Serial Number</label>
                <input type="text" name="pump_sno" id="pump_sno" class="form-control"  placeholder="Pump Serial Number">
              </div>
            </td>
            <td>
              <div class="form-group">
                <label>FG No</label>
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
                <label>Production Order Number</label>
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
                <input type="text" name="operator_name" value="<?php //echo $_SESSION['name']; ?>" class="form-control"  placeholder="Operator Name" readonly>
              </div>
            </td>
            <td>
              <div class="form-group">
                <label>TPI</label>
                <input type="text" name="tpi" id="tpi" class="form-control" readonly="">
                
              </div> 
            </td>
          </tr> -->
          <tr>
            <td>
            </td> 
            <td colspan="3">
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
            <td colspan="3">
              <div class="form-group">
                <label>Operator Name</label>
                <input type="text" name="operator_name" value="<?php echo $_SESSION['name']; ?>" class="form-control"  placeholder="Operator Name" readonly>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="7" class="text-center">
              <div class="form-group text-center" style="text-align: center">
                <input type="button" value="Submit" id="check" data-toggle="modal" data-target="#c_modal" class="btn login-btn" >
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
            <th>Fg Part No</th>
            <th>Customer</th>
            <th>Pump Type</th>
            <th>TPI</th>
            <th>Operator Name</th>
          </tr>
          <?php
          include 'db.php';
          $sql="SELECT tpi.pump_sno AS pump_sno,tpi.date AS date,tpi.time AS time,tpi.shift AS shift,master_scheduling.fg AS fg_no,master_scheduling.seq_no AS sequence_no,master_scheduling.fg_part_no AS production_order_no,master_scheduling.customer AS customer,master_scheduling.type AS pump_type,master_scheduling.tpi AS tpi,tpi.operator_name AS operator_name from tpi INNER JOIN master_scheduling ON master_scheduling.serial_no=tpi.pump_sno ORDER BY tpi.id DESC LIMIT 5";
          if($res=mysqli_query($con,$sql))
          {
            while($_SESSION=mysqli_fetch_array($res))
            {
              ?>
              <tr>
                <td><?php echo $_SESSION['pump_sno']; ?></td>
                <td><?php echo $_SESSION['date']; ?></td>
                <td><?php echo $_SESSION['time']; ?></td>
                <td><?php echo $_SESSION['shift']; ?></td>
                <td><?php echo $_SESSION['fg_no']; ?></td>
                <td><?php echo $_SESSION['sequence_no']; ?></td>
                <td><?php echo $_SESSION['production_order_no']; ?></td>
                <td><?php echo $_SESSION['customer']; ?></td>
                <td><?php echo $_SESSION['pump_type']; ?></td>
                <td><?php echo $_SESSION['tpi']; ?></td>
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
<div class="modal" id="c_modal">
  <div class="modal-dialog modal-lg">
   <div class=""> <div class="modal-content">
      <!-- New User Modal Header -->
      <div class="modal-header text-white  box p-2">
        <h4 class="modal-title">Pump Details</h4>
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      </div>
      <div class="modal-body" style="max-height: 300px;overflow: scroll;" >
        <!-- New User Form -->
        <table class="table" id="pump_res" >
          
        </table>
        <div class="text-center">
          <input type="button" class="btn btn-success" id="submit" value="Yes" />&nbsp;&nbsp;
          <input type="button" class="btn cancel btn-danger" value="No" data-dismiss="modal" />
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
<div class="sticky-bottom"><br/>
<div style="padding-top: 0%;background-color: black "><nav class="navbar sticky-bottom navbar-light justify-content-center" >Developed By <a href="#" style="text-decoration: none;font-weight: bold" >&nbsp;Dept of IT,KEC</a></nav></div>
</div>
<script type="text/javascript">
      var d=new Date();
      $('#date').val(d);
      $('#submit').on('click',function(e)
      {
        
        e.preventDefault();
        if(!$('input[type=checkbox]:checked').length) {
        alert("Please select pump");

            //stop the form from submitting
            return false;
        }
        else
        {
          $('#load').show();
          $('.btn').hide();
          $.ajax({
              url: "tpi-db.php",
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
      $("#check").click(function()
      {
        // alert("hi");
          var html="<tr><th>Pump Sno</th></tr>";
          $('input.data:checked').each(function() 
          {
             html+="<tr><td>"+$(this).val()+"</td></tr>";
          });
          console.log(html);
          $('#pump_res').html(html);
      });
      
      // $('#pump_sno').change(function()
      // {
      //   var pump_sno=$('#pump_sno').val();
      //     $.ajax({
      //         url: "get-details.php",
      //         type:"POST",
      //         data:{pump_sno:pump_sno,key:'147',flag:'2'},
      //         success: function(result){

      //             var res=result.split("+");
      //             $('#fg_no').val(res[0]);
      //             $('#seq_no').val(res[1]);
      //             $('#po_no').val(res[2]);
      //             $('#customer').val(res[3]);
      //             $('#pump_type').val(res[4]);
      //             $('#tpi').val(res[5]);
      //         }
      //     });
      // });
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