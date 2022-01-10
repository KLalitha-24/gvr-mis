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
        <a class="nav-item nav-link text-white" href="monthly-plan.php"><i class="fa fa-wrench"></i>&nbsp;Monthly - Day Wise Plan</a>
      </nav>
      
    <br/>
    <div class="col-sm-12 box bg-white" >
        
      <br/>
      <div class="row">
        <div class="col-sm-4">
            <h5 class="pl-4">Montly Plan Records</h5>
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Search" id="search_m">
        </div>
        <div class="col-sm-4 text-right">
          <button class="btn btn-light"  id="print-graph-btn-over"><i>Download Report</i></button>
        </div>
      </div>
      <div class="table-responsive p-4" id="res_table">

        <table class="table" id="plan-table-over">
          <tr>
            
            <th>Type</th>
            <th>Customer</th>
            <th>Month</th>
            <th>Year</th>
            <th>Plan</th>
          </tr>
          <tbody class="monthly_plan">
          <?php
                include 'db.php';
                $sql_n="SELECT month,year,customer,type,SUM(plan) AS plan FROM monthly_plan group by month,year,customer,type ORDER BY id DESC";
                if($res=mysqli_query($con,$sql_n))
                {
                  while ($row=mysqli_fetch_array($res)) 
                  {
                    ?>
                    <tr>
                      
                      <td><?php echo $row['type']; ?></td>
                      <td><?php echo $row['customer']; ?></td>
                      
                      <td><?php echo $row['month']; ?></td>
                      <td><?php echo $row['year']; ?></td>
                      <td class="<?php echo $row['id'];?>"><?php echo $row['plan']; ?></td>
                    </tr>
                    <?php
                  }
                }
                ?>
            </tbody>
        </table>
      </div>
    </div>
    

    <br/>

    <div class="col-sm-12 bg-white box">
      <br/>
      <div class="row">
        <div class="col-sm-4">
            <h5 class="pl-4">Daily Plan Records</h5>
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Search" id="search_d">
        </div>

        <div class="col-sm-4 text-right">
          <button class="btn btn-light"  id="print-graph-btn"><i>Download Report</i></button>
        </div>
      </div>
      <div class="table-responsive p-4" id="res_table">

        <table class="table" id="plan-table">
          <tr>
            <th></th>
            <th>Type</th>
            <th>Customer</th>
            <th>Date</th>
            <th>Month</th>
            <th>Year</th>
            <th>Last Updated Time</th>
            <th>Revision No</th>
            <th>Plan</th>
          </tr>
          <tbody class="daily_plan">
          <?php
                include 'db.php';
                $sql_n="SELECT * FROM monthly_plan  ORDER BY id DESC";
                if($res=mysqli_query($con,$sql_n))
                {
                  while ($row=mysqli_fetch_array($res)) 
                  {
                    ?>
                    <tr>
                      <td class="icons-dis">
                        <form class="cp">
                          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                          <input type="hidden" name="key" value="147">
                          <button type="button" title="Edit" class="btn edit" id="edit<?php echo $row['id'];?>" name="<?php echo $row['id'];?>">
                            <i class="fa fa-edit text-warning"></i>

                          </button>
                          <button type="submit" title="Delete" class="btn" id="delete<?php echo $row['id'];?>" name="<?php echo $row['id'];?>">
                            <i class="fa fa-trash text-danger"></i>
                            
                          </button>
                          <button type="button" title="Save" class="btn save" name="<?php echo $row['id'];?>" id="save<?php echo $row['id'];?>">
                            <i class="fa fa-check text-success"></i>
                            
                          </button>
                          <button type="button" title="Cancel" class="btn cancel" name="<?php echo $row['id'];?>" id="cancel<?php echo $row['id'];?>">
                            <i class="fa fa-times text-danger"></i>
                            
                          </button>
                        </form>
                      
                      </td>
                      <td><?php echo $row['type']; ?></td>
                      <td><?php echo $row['customer']; ?></td>
                      <td><?php echo $row['date']; ?></td>
                      <td><?php echo $row['month']; ?></td>
                      <td><?php echo $row['year']; ?></td>
                      <td><?php echo $row['updated_datetime']; ?></td>
                      <td><?php echo "Rev ".$row['count']; ?></td>

                      <td class="<?php echo $row['id'];?>"><?php echo $row['plan']; ?></td>
                    </tr>
                    <?php
                  }
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
    $('.save').hide();
    $('.cancel').hide();
    $(document).on('click','.edit',function()
    {
      
      var id=$(this).attr("name");
      $(this).hide();
      $('#delete'+id).hide();
      $('#save'+id).show();
      $('#cancel'+id).show();
      val=$('.'+id).text();
      $('.'+id).html("<input type='text' class='form-control' value='"+val+"' id='"+id+"'>")
    });
    $(document).on('click','.cancel',function()
    {
      
      var id=$(this).attr("name");
      $(this).hide();
      $('#save'+id).hide();
      $('#delete'+id).show();
      $('#edit'+id).show();
      // var val=$('#'+id).val();
      $('.'+id).html(val)
    });
    $('.cp').on('submit',function(e)
    {
      $('#load').show();
      $('.btn').hide();
      e.preventDefault();
        $.ajax({
            url: "delete-monthly-plan.php",
            type:"POST",
            data:$('.cp').serialize(),
            success: function(result){
                $('.cp')[0].reset();
                alert(result);
                location.reload();
            }
        });

    });
    $(document).on('click','.save',function(e)
    {
      var id=$(this).attr("name");
      var plan=$('#'+id).val();
      e.preventDefault();
        $.ajax({
            url: "update-monthly-plan.php",
            type:"POST",
            data:{id:id,plan:plan,key:'147'},
            success: function(result){
                
                location.reload();
            }
        });

    });
    $(document).on('click','#print-graph-btn',function()
    {
          $('.icons-dis').hide();
          
          $("#plan-table").table2excel({
            filename: "Daily Plan.xls"
          });

          $('.icons-dis').show();
    });
    $(document).on('click','#print-graph-btn-over',function()
    {
          // $('.icons-dis').hide();
          
          $("#plan-table-over").table2excel({
            filename: "Monthly Plan.xls"
          });

          // $('.icons-dis').show();
    });
    $("#search_m").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".monthly_plan tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#search_d").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".daily_plan tr").filter(function() {
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

