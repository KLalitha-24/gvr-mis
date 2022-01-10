<?php 
  session_start();
  if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dispatching</title>
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
      <?php // include 'side-navbar.php'; ?>
    <!-- </div>
    <div class="col-sm-9"> -->
      <br/> 
      <nav class="navbar box">
        <a class="nav-item nav-link text-white" href="#"><i class="fa fa-wrench"></i>&nbsp;Dispatching</a>
        <div class="ml-auto">
          <a href="view-dispatching-details.php" class="btn btn-light">View Records</a>
        </div>
      </nav>
      <br/>
      <div class="col-sm-12 bg-white box">
        <div class="row">
          <div class="form-group col-sm-6">
            <label>Type</label>
            <select id="pump_type" class="form-control">

            <?php
            include 'db.php';
              $sql="SELECT * FROM `master_scheduling` WHERE flag='4' group by type";
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
          <div class="form-group col-sm-6">
            <label>Customer</label>
            <select id="customer" class="form-control">
              
            <?php
            include 'db.php';
              $sql="SELECT * FROM `master_scheduling` WHERE flag='4' group by customer";
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
      </div>
    </div>
    <div class="col-sm-12 bg-white box">
    <div class="row justify-content-center p-4">
      <table>
        <form id="cp" method="POST">
          <input type="hidden" name="key" value="147">
          <tbody id="list_res">

          </tbody>
          
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
          </tr> -->
          
          <tr>
            <td colspan="4">
              <div class="form-group">
                <label>Operator Name</label>
                <input type="text" name="operator_name" value="<?php echo $_SESSION['name']; ?>" class="form-control"  placeholder="Operator Name" readonly>
              </div>
            </td>
            <td colspan="3">
              <div class="form-group">
                <label>Invoice No</label>
                <input type="text" name="invoice_no" id="invoice_no" class="form-control" placeholder="Invoice No" required="">
              </div> 
            </td>
          </tr>
          <tr>
            <td colspan="4">
              <div class="form-group">
                <label>Vehicle No</label>
                <input type="text" name="vehicle_no" id="vehicle_no" class="form-control"  placeholder="Vehicle No" required="">
              </div>
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
            
          </tr>
          <tr>
            <td colspan="2">
              <div class="form-group" style="text-align: center">
                <input type="button" data-toggle="modal" data-target="#modal" value="Submit" id="submit" class="btn login-btn" >
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
            <th>TPI</th>
            <th>Invoice No</th>
            <th>Vehicle No</th>
          </tr>
          <?php
          include 'db.php';
          $sql="SELECT dispatching.pump_sno AS pump_sno,dispatching.date AS date1,dispatching.time AS time,dispatching.shift AS shift,master_scheduling.fg AS fg_no,master_scheduling.seq_no AS sequence_no,master_scheduling.fg_part_no AS production_order_no,master_scheduling.customer AS customer,master_scheduling.tpi AS tpi,master_scheduling.type AS pump_type,dispatching.operator_name AS operator_name,dispatching.invoice_no AS invoice_no,dispatching.vehicle_no AS vehicle_no from dispatching INNER JOIN master_scheduling ON master_scheduling.serial_no=dispatching.pump_sno  ORDER BY dispatching.id DESC LIMIT 10";
          if($res=mysqli_query($con,$sql))
          {
            while($row=mysqli_fetch_array($res))
            {
              ?>
              <tr>
                <td><?php echo $row['pump_sno']; ?></td>
                <td><?php echo $row['date1']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['shift']; ?></td>
                <td><?php echo $row['fg_no']; ?></td>
                <td><?php echo $row['sequence_no']; ?></td>
                <td><?php echo $row['production_order_no']; ?></td>
                <td><?php echo $row['customer']; ?></td>
                <td><?php echo $row['pump_type']; ?></td>
                <td><?php echo $row['operator_name']; ?></td>
                <td><?php echo $row['tpi']; ?></td>
                <td><?php echo $row['invoice_no']; ?></td>
                <td><?php echo $row['vehicle_no']; ?></td>
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
<div class="modal" id="modal">
  <div class="modal-dialog modal-lg">
   <div class=""> 
    <div class="modal-content">
      <!-- New User Modal Header -->
      <div class="modal-header text-white  box p-2">
        <h4 class="modal-title">Information</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        
            
            <div class="text-center">
              <label>Are you sure you want to submit this details?</label>
              <br/>
              <table class="table" id="tab">
                
              </table>
              <div class="row justify-content-center">
                <input type="button" id="store" class="btn btn-success reset" name="<?php echo $i; ?>" value="Yes" />&nbsp;&nbsp;
                <input type="button" class="btn cancel btn-danger" value="No" data-dismiss="modal"/>
              </div>
            </div>
          </form>
      </div>
      </div>
    </div>
  </div>
</div>
<div class="sticky-bottom"><?php include 'footer.php'; ?></div>
<script type="text/javascript">
      var d=new Date();
      $('#date').val(d);
      var pump_list=[];
      $('#submit').on('click',function(e)
      {
        pump_sno='';
        i=0;
        $('input.data:checked').each(function() {
            i+=1; 
            pump_sno+=$(this).val()+", ";
            pump_list.push($(this).val());
        });
        html='<tr><th>Pump Serial No</th><td>'+pump_sno+'</td><tr><tr><th>Quantity</th><td>'+i+'</td><tr><tr><th>Invoice No</th><td>'+$("#invoice_no").val()+'</td><tr><tr><th>Vehicle No</th><td>'+$("#vehicle_no").val()+'</td><tr>'
        $('#tab').html(html);
      });
      $('#store').on('click',function(e)
      {
        console.log($('#cp').serialize());
        if($('#invoice_no').val()=="")
        {
          alert("Enter Invoice No");
        }
        if($('#vehicle_no').val()=="")
        {
          alert("Enter Vehicle No");
        }
        if($('#pump_sno').val()=="")
        {
          alert("Enter Pump SNo");
        }
        if($('#invoice_no').val()!="" && $('#vehicle_no').val()!="" && $('#pump_sno').val()!="")
        {
                    $('#load').show();
                    $('.btn').hide();
                    
                    // alert(pump_list);
                    e.preventDefault();
                      $.ajax({
                          url: "dispatching-db.php",
                          type:"POST",
                          data:$('#cp').serialize()+"&data="+pump_list,
                          success: function(result){
                              $('#cp')[0].reset();
                              alert(result);
                              location.reload();
                          }
                      });
        }

      });
      var pump_type=$('#pump_type').val();
      var customer=$('#customer').val();
        $.ajax({
            url: "get-dispatching-pump.php",
            type:"POST",
            data:{type:pump_type,customer:customer},
            success: function(result){
                console.log(result);
                $('#list_res').html(result);
                // $('#tpi').val(res[5]);
            }
        });
      $('#pump_type,#customer').change(function()
      {
        var pump_type=$('#pump_type').val();
        var customer=$('#customer').val();
          $.ajax({
              url: "get-dispatching-pump.php",
              type:"POST",
              data:{type:pump_type,customer:customer},
              success: function(result){

                  $('#list_res').html(result);
                  // $('#tpi').val(res[5]);
              }
          });
      });

      $('.cus').hide();
      var id=$('#customer').val();
      $("."+id).show();
      console.log(id);
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