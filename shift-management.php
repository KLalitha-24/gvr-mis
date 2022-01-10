<?php 
  session_start();
  if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Shift Management</title>
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
	<?php include 'header.php' 
        
  ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3">
      <?php include 'side-navbar.php'; ?>
    <!-- </div>
    <div class="col-sm-9"> -->
      <br/> 
      <nav class="navbar box">
        <a class="nav-item nav-link text-white" href="#"><i class="fa fa-wrench"></i>&nbsp;Shift Management</a>
        <div class="ml-auto">
          <a class="btn btn-light" href="#" data-toggle="modal" data-target="#myModal">Add Operator</a>
          <a class="btn btn-light" href="view-operator-details.php">View Operator</a>
        </div> 
      </nav>
      <br/>
      <div class="col-sm-12 bg-white box">

      <div class="row justify-content-center p-4">
          <table class="col-sm-4">
          <form id="sm" method="POST">
            <input type="hidden" name="key" value="147">
            <tr>
              <td>
                <div class="form-group">
                  <label>Upload File</label>
                  <input type="file" name="csv"  class="form-control" required="">
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
      <form id="report_frm">
        <div class="row">
          
            <div class="col-sm-5">
              <br>
              <div class="row">
                <!-- <br/> -->
                <label class="col-sm-4">Date:</label>
                <input type="date" class="form-control col-sm-8" name="date">
              </div>
            </div>
            <div class="col-sm-5">
              <br>
              <div class="row">
                <!-- <br/> -->
                <label class="col-sm-4">Shift:</label>
                <select class="form-control col-sm-8" name="shift">
                  <option value="G">General</option>
                  <option value="F">First</option>
                  <option value="S">Second</option>
                  <option value="T">Third</option>
                </select>
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
      <div class="text-right pr-4"><button class="btn btn-success p-1" id="csv-table" style="font-size: 10px">Export CSV</button></div>
      <div class="table-responsive p-4" id="res_table">

        <table class="table" id="table-t">
          <tr>
            <th>Date</th>
            <th>Roll No</th>
            <th>Name</th>
            <th>Access</th>
            <th>Shift</th>
            <th>Supervisor</th>
          </tr>
          <?php
          include 'db.php';
          $date=date("Y-m-d");

          $sql="SELECT * from shift_management where date='".$date."'";
          if($res=mysqli_query($con,$sql))
          {
            $i=1;
            while($row=mysqli_fetch_array($res))
            {

              ?>
              <tr>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['register_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['access']; ?></td>
                <td><?php 
                if($row['shift']=="G")
                {
                  echo "General";
                }
                else if($row['shift']=="F")
                {
                  echo "First";
                }
                else if($row['shift']=="S")
                {
                  echo "Second";
                }
                else if($row['shift']=="T")
                {
                  echo "Third";
                }

                ?></td>
                <td><?php echo $row['supervisor']; ?></td>
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
        </table>
      </div>
    </div>
    </div>
    </div>
  </div>
  
</div>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Operator</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <table>
        <form id="cp" method="POST">
          <input type="hidden" name="key" value="147">
          <tr>
            <td>
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name"  class="form-control"  placeholder="Name" required="">
              </div>
              
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label>Operator Roll No</label>
                <input type="text" name="register_id"   class="form-control"  placeholder="Operator Register No" required="">
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label>Date of Joining</label>
                <input type="date" name="date" class="form-control"  placeholder="Date" required="">
              </div>
            </td>
          </tr>
          <!-- <tr>
            <td>
              <div class="form-group">
                <label>Shift</label>
                <select class="form-control" name="shift">
                  <option>General</option>
                  <option>First</option>
                  <option>Second</option>
                  <option>Third</option>
                </select>
              </div>
            </td>
          </tr> -->
          <tr>
            <td>
              <div class="form-group">
                <label>Access</label>
                
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck" value="Pigeon Hole" name="access[]">
                  <label class="custom-control-label" for="customCheck">Pigeon Hole</label>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" value="HV Test" id="customCheck1" name="access[]">
                  <label class="custom-control-label" for="customCheck1">HV Test</label>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" value="Final 2" id="customCheck2" name="access[]">
                  <label class="custom-control-label" for="customCheck2">Final 2</label>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" value="Packing" id="customCheck3" name="access[]">
                  <label class="custom-control-label" for="customCheck3">Packing</label>
                </div>
                
                <!-- <select class="form-control" name="access">
                  <option value="PH">Pigeon Hole</option>
                  <option value="HVT">HV Test</option>
                  <option value="F2">Final 2</option>
                  <option value="PK">Packing</option>
                </select> -->
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="form-group" style="text-align: center">
                <input type="submit" value="Add" id="submit" class="btn login-btn" >
                <div class="spinner-border text-muted" id="load" style="display: none;cursor: none"></div>
              </div>
            </td>
          </tr>
        </form>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="sticky-bottom"><?php include 'footer.php'; ?></div>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script type="text/javascript">
      var d=new Date();
      $('#date').val(d);
      $('#cp').on('submit',function(e)
      {
        $('#load').show();
        $('.btn').hide();
        e.preventDefault();
            $.ajax({
              url: "operator-db.php",
              type:"POST",
              data:$('#cp').serialize(),
              success: function(result){
                  $('#cp')[0].reset();
                  alert(result);
                  location.reload();
              }
          });

      });
      $('#sm').on('submit',function(e)
      {
        $('#load').show();
        $('.btn').hide();
        e.preventDefault();
        var formData = new FormData($('#sm')[0]);
            $.ajax({
              url: "shift-management-db.php",
              type:"POST",
              data:formData,
               cache: false,
               contentType: false,
               processData: false,
              success: function(result){
                  $('#sm')[0].reset();
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
              data:{pump_sno:pump_sno,key:'147'},
              success: function(result){

                  var res=result.split("+");
                  $('#fg_no').val(res[0]);
                  $('#seq_no').val(res[1]);
                  $('#po_no').val(res[2]);
                  $('#customer').val(res[3]);
                  $('#pump_type').val(res[4]);
              }
          });
      });
      $('#csv-table').click(function()
        {
            $("#table-t").table2excel({
              filename: "Shift Details.xls"
           });
        });
      $('#report_frm').submit(function(e)
      {
        e.preventDefault();
        
          $.ajax({
              url: "get-shift-management-dynamic-report.php",
              type:"POST",
              data:$('#report_frm').serialize(),
              success: function(result){
                $('#res_table').html(result);
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