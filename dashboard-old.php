<?php 
  session_start();
  if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  {
    include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
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
    <div class="col-sm-3">
      <?php include 'side-navbar.php'; ?>
    <!-- </div>
    <div class="col-sm-9"> -->
      <br/> 
      <nav class="navbar box">
        <a class="nav-item nav-link text-white" href="#"><i class="fa fa-home"></i>&nbsp;Dashboard</a>
        <div class="ml-auto">
          <a class="btn btn-light" href="home.php">Home</a>
        </div>
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
      <div class="col-sm-12 box bg-white" >
        <div class="row justify-content-center">
          <div class="col-sm-4 border-right" id="current_day_bar_chart" style="height: 40vh">
          </div>
          <div class="col-sm-4  border-right border-left" id="current_day_pie_chart" style="height: 40vh">
          </div>
          <div class="col-sm-4  border-left"  style="height: 40vh">
            <?php
              $date=date("Y-m-d");
              $sql="SELECT * FROM pigeon_hole WHERE date='$date'";
              $res=mysqli_query($con,$sql);
              $n=mysqli_num_rows($res);
              $sql1="SELECT * FROM hv_test WHERE date='$date'";
              $res1=mysqli_query($con,$sql1);
              $n1=mysqli_num_rows($res1);
              $sql2="SELECT * FROM final_2 WHERE date='$date'";
              $res2=mysqli_query($con,$sql2);
              $n2=mysqli_num_rows($res2);
              $sql3="SELECT * FROM packing WHERE date='$date'";
              $res3=mysqli_query($con,$sql3);
              $n3=mysqli_num_rows($res3);
            ?>
            <br/> 
            <table class="table text-center">
              <tr>
                <th>Stage</th>
                <th>Count</th>
              </tr>
              <tr>
                <th>Pigeon Hole</th>
                <td id="table_pigeon_hole" style="color: blue"><?php echo $n; ?></td>
              </tr>
              <tr>
                <th>HV Test</th>
                <td id="table_hv_test" style="color: red"><?php echo $n1; ?></td>
              </tr>
              <tr>
                <th>Final 2</th>
                <td id="table_final_2" style="color: orange"><?php echo $n2; ?></td>
              </tr>
              <tr>
                <th>Packing</th>
                <td id="table_packing" style="color: green"><?php echo $n3; ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <br/>
      <div class="col-sm-12 box bg-white" >
        <div class="row">
          <div class="col-sm-12  border-left"  style="height: 40vh">
            <?php
              $date=date("Y-m-d");
              $d_sql="SELECT * FROM pigeon_hole WHERE date='$date'";
              $d_res=mysqli_query($con,$d_sql);
              $d_n=mysqli_num_rows($d_res);
              $d_sql1="SELECT * FROM hv_test WHERE date='$date'";
              $d_res1=mysqli_query($con,$d_sql1);
              $d_n1=mysqli_num_rows($d_res1);
              $d_sql2="SELECT * FROM final_2 WHERE date='$date'";
              $d_res2=mysqli_query($con,$d_sql2);
              $d_n2=mysqli_num_rows($d_res2);
              $d_sql3="SELECT * FROM packing WHERE date='$date'";
              $d_res3=mysqli_query($con,$d_sql3);
              $d_n3=mysqli_num_rows($d_res3);
              $sq="SELECT * FROM master_scheduling WHERE date='$date'";
              $r=mysqli_query($con,$sq);
              $nt=mysqli_num_rows($r);
            ?>
            <br/> 
            <table class="table text-center">
              <tr>
                <th>Stage</th>
                <th>Total</th>
                <th>Completed</th>
              </tr>
              <tr>
                <th>Pigeon Hole</th>
                <td class="table_t" style="color: blue"><?php echo $nt; ?></td>
                <td id="table_pigeon_hole_c" style="color: blue"><?php echo $d_n; ?></td>
              </tr>
              <tr>
                <th>HV Test</th>
                <td class="table_t" style="color: blue"><?php echo $nt; ?></td>
                <td id="table_hv_test_c" style="color: red"><?php echo $d_n1; ?></td>
              </tr>
              <tr>
                <th>Final 2</th>
                <td class="table_t" style="color: blue"><?php echo $nt; ?></td>
                <td id="table_final_2_c" style="color: orange"><?php echo $d_n2; ?></td>
              </tr>
              <tr>
                <th>Packing</th>
                <td class="table_t" style="color: blue"><?php echo $nt; ?></td>
                <td id="table_packing_c" style="color: green"><?php echo $d_n3; ?></td>
              </tr>
            </table>
          </div>
          <div class="col-sm-6 border" id="current_day_ph_chart" style="height: 40vh">
          </div>
          <div class="col-sm-6  border " id="current_day_hvt_chart" style="height: 40vh">
          </div>
          <div class="col-sm-6  border" id="current_day_f2_chart" style="height: 40vh">
          </div>
          <div class="col-sm-6  border" id="current_day_pk_chart" style="height: 40vh">
          </div>


          
        </div>
      </div>
      

    </div>
  </div>
</div>
<div class="sticky-bottom"><?php include 'footer.php'; ?></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(draw_current_day_bar_chart);

      function draw_current_day_bar_chart() {

        var data = google.visualization.arrayToDataTable([
          ['Stage', 'Counts', { role: 'style' }, { role: 'annotation' }],
          ['Pigeon Hole',parseInt(<?php echo $n; ?>),"blue","<?php echo $n; ?>"],
          ['HV Test',parseInt(<?php echo $n1; ?>),"red","<?php echo $n1; ?>"],
          ['Final 2',parseInt(<?php echo $n2; ?>),"orange","<?php echo $n2; ?>"],
          ['Packing',parseInt(<?php echo $n3; ?>),"green","<?php echo $n3; ?>"]
          
        ]);

        var options = {
          title: 'Today Status',
          legend:'none',
          vAxis:{format:'0',minValue:1,
          viewWindow:{min:0}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('current_day_bar_chart'));

        chart.draw(data, options);
      }
      google.charts.setOnLoadCallback(draw_current_day_pie_chart);

      function draw_current_day_pie_chart() {

        var data = google.visualization.arrayToDataTable([
          ['Stage', 'Counts', { role: 'style' }, { role: 'annotation' }],
          ['Pigeon Hole',parseInt(<?php echo $n; ?>),"blue","<?php echo $n; ?>"],
          ['HV Test',parseInt(<?php echo $n1; ?>),"red","<?php echo $n1; ?>"],
          ['Final 2',parseInt(<?php echo $n2; ?>),"orange","<?php echo $n2; ?>"],
          ['Packing',parseInt(<?php echo $n3; ?>),"green","<?php echo $n3; ?>"]
          
        ]);

        var options = {
          title: 'Today Status',
          legend:{position:'bottom'},
          pieSliceText: 'value-and-percentage'
        };

        var chart = new google.visualization.PieChart(document.getElementById('current_day_pie_chart'));

        chart.draw(data, options);
      }
      google.charts.setOnLoadCallback(draw_current_day_ph_chart);

      function draw_current_day_ph_chart() {

        var data = google.visualization.arrayToDataTable([
          ['Stage', 'Counts', { role: 'style' }, { role: 'annotation' }],
          ['Total',parseInt(<?php echo $nt; ?>),"blue","<?php echo $n; ?>"],
          ['Completed',parseInt(<?php echo $d_n; ?>),"green","<?php echo $n1; ?>"]
          
        ]);

        var options = {
          title: 'Pigeon Hole Status',
          legend:{position:'bottom'},
          pieSliceText: 'value-and-percentage'
        };

        var chart = new google.visualization.PieChart(document.getElementById('current_day_ph_chart'));

        chart.draw(data, options);
      }
      google.charts.setOnLoadCallback(draw_current_day_pk_chart);

      function draw_current_day_pk_chart() {

        var data = google.visualization.arrayToDataTable([
          ['Stage', 'Counts', { role: 'style' }, { role: 'annotation' }],
          ['Total',parseInt(<?php echo $nt; ?>),"blue","<?php echo $n; ?>"],
          ['Completed',parseInt(<?php echo $d_n3; ?>),"green","<?php echo $n1; ?>"]
          
        ]);

        var options = {
          title: 'Packing Status',
          legend:{position:'bottom'},
          pieSliceText: 'value-and-percentage'
        };

        var chart = new google.visualization.PieChart(document.getElementById('current_day_pk_chart'));

        chart.draw(data, options);
      }
      google.charts.setOnLoadCallback(draw_current_day_hvt_chart);

      function draw_current_day_hvt_chart() {

        var data = google.visualization.arrayToDataTable([
          ['Stage', 'Counts', { role: 'style' }, { role: 'annotation' }],
          ['Total',parseInt(<?php echo $nt; ?>),"blue","<?php echo $n; ?>"],
          ['Completed',parseInt(<?php echo $d_n1; ?>),"green","<?php echo $n1; ?>"]
          
        ]);

        var options = {
          title: 'HV Test Status',
          legend:{position:'bottom'},
          pieSliceText: 'value-and-percentage'
        };

        var chart = new google.visualization.PieChart(document.getElementById('current_day_hvt_chart'));

        chart.draw(data, options);
      }
      google.charts.setOnLoadCallback(draw_current_day_f2_chart);

      function draw_current_day_f2_chart() {

        var data = google.visualization.arrayToDataTable([
          ['Stage', 'Counts', { role: 'style' }, { role: 'annotation' }],
          ['Total',parseInt(<?php echo $nt; ?>),"blue","<?php echo $n; ?>"],
          ['Completed',parseInt(<?php echo $d_n2; ?>),"green","<?php echo $n1; ?>"]
          
        ]);

        var options = {
          title: 'Final 2 Status',
          legend:{position:'bottom'},
          pieSliceText: 'value-and-percentage'
        };

        var chart = new google.visualization.PieChart(document.getElementById('current_day_f2_chart'));

        chart.draw(data, options);
      }
      $('#report_frm').submit(function(e)
      {
        e.preventDefault();
        
          $.ajax({
              url: "get-dynamic-report.php",
              type:"POST",
              data:$('#report_frm').serialize(),
              success: function(result){

                  var res=result.split("+");
                  $('#table_pigeon_hole,#table_pigeon_hole_c').html(res[0]);
                  $('#table_hv_test,#table_hv_test_c').html(res[1]);
                  $('#table_final_2,#table_final_2_c').html(res[2]);
                  $('#packing,#packing_c').html(res[3]);
                  $('.table_t').html(res[4]);
                  
                  google.charts.setOnLoadCallback(draw_current_day_pie_chart_d);

                  function draw_current_day_pie_chart_d() {

                    var data = google.visualization.arrayToDataTable([
                      ['Stage', 'Counts', { role: 'style' }, { role: 'annotation' }],
                      ['Pigeon Hole',parseInt(res[0]),"blue",res[0]],
                      ['HV Test',parseInt(res[1]),"red",res[1]],
                      ['Final 2',parseInt(res[2]),"orange",res[2]],
                      ['Packing',parseInt(res[3]),"green",res[3]]
                      
                    ]);

                    var options = {
                      title: 'Past Status',
                      legend:'none',
                      vAxis:{format:'0',minValue:1,
                      viewWindow:{min:0}}
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('current_day_pie_chart'));

                    chart.draw(data, options);
                  }
                   google.charts.setOnLoadCallback(draw_current_day_bar_chart_d);

                  function draw_current_day_bar_chart_d() {

                    var data = google.visualization.arrayToDataTable([
                      ['Stage', 'Counts', { role: 'style' }, { role: 'annotation' }],
                      ['Pigeon Hole',parseInt(res[0]),"blue",res[0]],
                      ['HV Test',parseInt(res[1]),"red",res[1]],
                      ['Final 2',parseInt(res[2]),"orange",res[2]],
                      ['Packing',parseInt(res[3]),"green",res[3]]
                      
                    ]);

                    var options = {
                      title: 'Past Status',
                      legend:'none',
                      vAxis:{format:'0',minValue:1,
                      viewWindow:{min:0}}
                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById('current_day_bar_chart'));

                    chart.draw(data, options);
                  }
                  google.charts.setOnLoadCallback(draw_current_day_ph_chart_d);

      function draw_current_day_ph_chart_d() {

        var data = google.visualization.arrayToDataTable([
          ['Stage', 'Counts', { role: 'style' }, { role: 'annotation' }],
          ['Total',parseInt(res[4]),"blue",res[4]],
          ['Completed',parseInt(res[0]),"green",res[0]]
          
        ]);

        var options = {
          title: 'Pigeon Hole Status',
          legend:{position:'bottom'},
          pieSliceText: 'value-and-percentage'
        };

        var chart = new google.visualization.PieChart(document.getElementById('current_day_ph_chart'));

        chart.draw(data, options);
      }
      google.charts.setOnLoadCallback(draw_current_day_pk_chart_d);

      function draw_current_day_pk_chart_d() {

        var data = google.visualization.arrayToDataTable([
          ['Stage', 'Counts', { role: 'style' }, { role: 'annotation' }],
          ['Total',parseInt(res[4]),"blue",res[4]],
          ['Completed',parseInt(res[3]),"green",res[3]]
          
        ]);

        var options = {
          title: 'Packing Status',
          legend:{position:'bottom'},
          pieSliceText: 'value-and-percentage'
        };

        var chart = new google.visualization.PieChart(document.getElementById('current_day_pk_chart'));

        chart.draw(data, options);
      }
      google.charts.setOnLoadCallback(draw_current_day_hvt_chart_d);

      function draw_current_day_hvt_chart_d() {

        var data = google.visualization.arrayToDataTable([
          ['Stage', 'Counts', { role: 'style' }, { role: 'annotation' }],
          ['Total',parseInt(res[4]),"blue",res[4]],
          ['Completed',parseInt(res[1]),"green",res[1]]
          
        ]);

        var options = {
          title: 'HV Test Status',
          legend:{position:'bottom'},
          pieSliceText: 'value-and-percentage'
        };

        var chart = new google.visualization.PieChart(document.getElementById('current_day_hvt_chart'));

        chart.draw(data, options);
      }
      google.charts.setOnLoadCallback(draw_current_day_f2_chart_d);

      function draw_current_day_f2_chart_d() {

        var data = google.visualization.arrayToDataTable([
          ['Stage', 'Counts', { role: 'style' }, { role: 'annotation' }],
          ['Total',parseInt(res[4]),"blue",res[4]],
          ['Completed',parseInt(res[2]),"green",res[2]]
          
        ]);

        var options = {
          title: 'Final 2 Status',
          legend:{position:'bottom'},
          pieSliceText: 'value-and-percentage'
        };

        var chart = new google.visualization.PieChart(document.getElementById('current_day_f2_chart'));

        chart.draw(data, options);
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