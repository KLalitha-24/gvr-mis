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
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
   <style type="text/css">
    td,th
    {
      font-weight: bold;
      white-space: nowrap;
    }
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
        <a class="nav-item nav-link text-white" href="#"><i class="fa fa-home"></i>&nbsp;Dashboard</a>
        <div class="ml-auto">
          <a class="btn btn-light" href="monthly-plan.php">Monthly Plan</a>
          <a class="btn btn-light" href="home.php">Home</a>
        </div>
      </nav>
      <br/>
      <div class="col-sm-12 box bg-white" >
        <div class="row p-2">
          <form action="dashboard.php" class="col-sm-6" method="get">
            <div class="row p-2">
              <div class="form-group">
                <input type="date" name="date" class="form-control" value="<?php echo $_GET['date']; ?>">
              </div>&nbsp;&nbsp;
              <div class="form-group">
                <input type="submit" value="Get" class="btn btn-dark">
              </div>
            </div>
          </form>
        
          <div class="col-sm-6">
            <div class="row ml-auto">
              <button class="btn btn-light ml-auto"  id="print-graph-btn"><i>Download Report</i></button>
            </div>
          </div>
          </div>
          <div class="table-responsive p-1">
            <table class="table table-bordered text-center" id="dashboard-table">
              <tr>
                <th class="bg-primary text-white">Type</th>
                <th class="bg-primary text-white" >Customer</th>
                <th class="bg-primary text-white" >DAILY<br>(Plan)</th>
                <th class="bg-primary text-white" >DAILY<br>(Actual)</th>
                <th class="bg-primary text-white">MTD<br>(Plan)</th>
                <th class="bg-primary text-white">MTD<br>(Actual)</th>

                <th class="bg-primary text-white" >GAP</th>
                <th class="bg-primary text-white" >MONTHLY PLAN</th>
                <th class="bg-primary text-white" >SFG<br>(Today)</th>
                <th class="bg-primary text-white" >SFG<br>(MTD)</th>
                <th class="bg-primary text-white" >FG<br>(Today)</th>
                <th class="bg-primary text-white" >FG<br>(MTD)</th>

                <th class="bg-primary text-white" >DISPATCH<br>(Today)</th>
                <th class="bg-primary text-white" >DISPATCH<br>(MTD)</th>
                <th class="bg-primary text-white"  id="current-rate">Current Run Rate</th>
                <th class="bg-primary text-white"  id="asking-rate">Reqd Run Rate</th>
                <th class="bg-primary text-white" >Remarks</th>
              </tr>
              <!-- <tr>
                <th class="bg-primary text-white">PLAN</th>
                <th class="bg-primary text-white">ACTUAL</th>
                <th class="bg-primary text-white">PLAN</th>
                <th class="bg-primary text-white">ACTUAL</th>
              </tr> -->
          <?php
          $sql="SELECT customer,type FROM master_scheduling group by customer";
          $date=$_GET['date'];

          $year=date("Y");
          if(date('H')>=0 && date('H')<6)
          {
            $date=date($date,strtotime("-1 day"));
            $year=date("Y",strtotime("-1 day"));
          }
          else
          {
            $date=date($date);
            $year=date("Y");
          }
          $total_d_plan=0;
          $total_a_plan=0;
          $total_d_mtd_plan=0;
          $total_a_mtd_plan=0;
          $total_sfg_plan=0;
          $total_fg_plan=0;
          $total_dispatch_plan=0;
          $total_sfg_c_plan=0;
          $total_fg_c_plan=0;
          $total_dispatch_c_plan=0;
          $total_t_sidetrack_plan=0;
          $total_a_sidetrack_plan=0;
          $total_r_sidetrack_plan=0;
          $total_month_plan=0;
          $total_cr_plan=0;
          $total_ar_plan=0;

          if($res=mysqli_query($con,$sql))
          {
            while($row=mysqli_fetch_array($res))
            {
              ?>
              <tr>
                <th><?php echo $row['type']; ?></th>

                <th><?php echo $row['customer']; ?></th>
                <td>
                  <?php
                  $sql_dm_month="SELECT month FROM master_scheduling WHERE date='".$date."'";
                  $row_dm_month=mysqli_fetch_array(mysqli_query($con,$sql_dm_month));
                  $dm_month=$row_dm_month['month'];
                  $ms_date=explode("-", $date);
                  $year=$ms_date[0];
                  $dm_month=$ms_date[1];
                  $day=$ms_date[2];
                  if($day>0 && $day<29 && $dm_month=="01")
                  {
                    $dm_month="JAN";
                  }
                  else if((($day>0 && $day<26) || ($day>28 && $day<32)) && ($dm_month=="02" || $dm_month=="01"))
                  {
                    $dm_month="FEB";
                  }
                  else if((($day>0 && $day<26)) && ($dm_month=="02" || $dm_month=="03"))
                  {
                    $dm_month="MAR";
                  }
                  else if((($day>1 && $day<30)) && ($dm_month=="04"))
                  {
                    $dm_month="APR";
                  }
                  else if((($day>0 && $day<28) || $day==30) && ($dm_month=="04" || $dm_month=="05"))
                  {
                    $dm_month="MAY";
                  }
                  else if((($day>0 && $day<32)) && ($dm_month=="05" || $dm_month=="06"))
                  {
                    $dm_month="JUN";
                  }
                  else if((($day>0 && $day<29)) && ($dm_month=="07"))
                  {
                    $dm_month="JUL";
                  }
                  else if((($day>0 && $day<27) || $day!=28 || $day!=31) && ($dm_month=="07" || $dm_month=="08"))
                  {
                    $dm_month="AUG";
                  }
                  else if((($day>0 && $day<31)) && ($dm_month=="08" || $dm_month=="09"))
                  {
                    $dm_month="SEP";
                  }
                  else if((($day>0 && $day<29)) && ($dm_month=="10"))
                  {
                    $dm_month="OCT";
                  }
                  else if((($day>0 && $day<26) || $day!=28) && ($dm_month=="10" || $dm_month=="11"))
                  {
                    $dm_month="NOV";
                  }
                  else if((($day>0 && $day<32)) && ($dm_month=="12" || $dm_month=="11"))
                  {
                    $dm_month="DEC";
                  }
                  // echo $dm_month;
                  $sql_d_plan="SELECT COUNT(customer) as customer FROM master_scheduling WHERE customer='".$row['customer']."' AND month='".$dm_month."' AND year='".$year."' AND date<='$date'";
                  $row_d_plan=mysqli_fetch_array(mysqli_query($con,$sql_d_plan));
                  echo $row_d_plan['customer'];
                  $total_d_plan+=$row_d_plan['customer'];
                  ?>
                </td>
                <td>
                  <?php
                  $sql_a_plan="SELECT COUNT(master_scheduling.customer) as final_2_count from master_scheduling INNER JOIN final_2 ON master_scheduling.serial_no=final_2.pump_sno WHERE master_scheduling.customer='".$row['customer']."' AND final_2.month='".$dm_month."' AND final_2.year='".$year."' AND final_2.date<='$date'";
                  $row_a_plan=mysqli_fetch_array(mysqli_query($con,$sql_a_plan));
                  echo $row_a_plan['final_2_count'];
                  $total_a_plan+=$row_a_plan['final_2_count'];
                  ?>
                </td>
                <td>
                  <?php
                  
                  
                  $sql_d_mtd_plan="SELECT COUNT(customer) as customer FROM master_scheduling WHERE customer='".$row['customer']."' AND month='".$dm_month."' AND year='".$year."' AND date<='$date'";
                  $row_d_mtd_plan=mysqli_fetch_array(mysqli_query($con,$sql_d_plan));
                  echo $row_d_mtd_plan['customer'];
                  $total_d_mtd_plan+=$row_d_mtd_plan['customer'];
                  ?>
                </td>
                <td>
                  <?php
                  $sql_dm_month="SELECT month FROM master_scheduling WHERE date='".$date."'";
                  $row_dm_month=mysqli_fetch_array(mysqli_query($con,$sql_dm_month));
                  $dm_month=$row_dm_month['month'];
                  $ms_date=explode("-", $date);
                  $year=$ms_date[0];
                  $dm_month=$ms_date[1];
                  $day=$ms_date[2];
                  if($day>0 && $day<29 && $dm_month=="01")
                  {
                    $dm_month="JAN";
                  }
                  else if((($day>0 && $day<26) || ($day>28 && $day<32)) && ($dm_month=="02" || $dm_month=="01"))
                  {
                    $dm_month="FEB";
                  }
                  else if((($day>0 && $day<26)) && ($dm_month=="02" || $dm_month=="03"))
                  {
                    $dm_month="MAR";
                  }
                  else if((($day>1 && $day<30)) && ($dm_month=="04"))
                  {
                    $dm_month="APR";
                  }
                  else if((($day>0 && $day<28) || $day==30) && ($dm_month=="04" || $dm_month=="05"))
                  {
                    $dm_month="MAY";
                  }
                  else if((($day>0 && $day<32)) && ($dm_month=="05" || $dm_month=="06"))
                  {
                    $dm_month="JUN";
                  }
                  else if((($day>0 && $day<29)) && ($dm_month=="07"))
                  {
                    $dm_month="JUL";
                  }
                  else if((($day>0 && $day<27) || $day!=28 || $day!=31) && ($dm_month=="07" || $dm_month=="08"))
                  {
                    $dm_month="AUG";
                  }
                  else if((($day>0 && $day<31)) && ($dm_month=="08" || $dm_month=="09"))
                  {
                    $dm_month="SEP";
                  }
                  else if((($day>0 && $day<29)) && ($dm_month=="10"))
                  {
                    $dm_month="OCT";
                  }
                  else if((($day>0 && $day<26) || $day!=28) && ($dm_month=="10" || $dm_month=="11"))
                  {
                    $dm_month="NOV";
                  }
                  else if((($day>0 && $day<32)) && ($dm_month=="12" || $dm_month=="11"))
                  {
                    $dm_month="DEC";
                  }
                  $sql_a_mtd_plan="SELECT COUNT(master_scheduling.customer) as final_2_count from master_scheduling INNER JOIN final_2 ON master_scheduling.serial_no=final_2.pump_sno WHERE master_scheduling.customer='".$row['customer']."' AND final_2.month='".$dm_month."' AND final_2.year='".$year."' AND final_2.date<='$date'";
                  $row_a_mtd_plan=mysqli_fetch_array(mysqli_query($con,$sql_a_mtd_plan));
                  echo $row_a_mtd_plan['final_2_count'];
                  $total_a_mtd_plan+=$row_a_mtd_plan['final_2_count'];
                  ?>
                </td>
                <td>
                  <?php echo $row_d_mtd_plan['customer']-$row_a_mtd_plan['final_2_count']; ?>
                </td>
                <td>
                  <?php 
            
                  $sql_month_plan="SELECT SUM(plan) AS plan FROM monthly_plan WHERE month='".$dm_month."' AND customer='".$row['customer']."' AND date<='$date' AND year='$year'";
                  $row_month_plan=mysqli_fetch_array(mysqli_query($con,$sql_month_plan));
                  echo $row_month_plan['plan'];
                  $total_month_plan+=$row_month_plan['plan'];
                  ?>
                </td> 
                <td>
                 
                      <?php
                      $sql_sfg_plan="SELECT COUNT(final_2.pump_sno) as final_2_count from final_2 INNER JOIN master_scheduling ON master_scheduling.serial_no=final_2.pump_sno WHERE final_2.date='".$date."' and master_scheduling.customer='".$row['customer']."'";
                      $row_sfg_plan=mysqli_fetch_array(mysqli_query($con,$sql_sfg_plan));
                      echo $row_sfg_plan['final_2_count'];
                      $total_sfg_plan+=$row_sfg_plan['final_2_count'];
                      ?>
                </td>
                <td>
                    <?php
                        $sql_sfg_c_plan="SELECT COUNT(final_2.pump_sno) as final_2_count from final_2 INNER JOIN master_scheduling ON master_scheduling.serial_no=final_2.pump_sno WHERE final_2.month='".$dm_month."' AND final_2.year='".$year."' AND final_2.date<='".$date."' and master_scheduling.customer='".$row['customer']."'";
                        $row_sfg_c_plan=mysqli_fetch_array(mysqli_query($con,$sql_sfg_c_plan));
                        echo $row_sfg_c_plan['final_2_count'];
                        $total_sfg_c_plan+=$row_sfg_c_plan['final_2_count'];
                        ?>

                      
                  </td>
                  <td>
                        <?php
                        $sql_fg_plan="SELECT COUNT(packing.pump_sno) as packing_count from packing INNER JOIN master_scheduling ON master_scheduling.serial_no=packing.pump_sno WHERE packing.date='".$date."' and master_scheduling.customer='".$row['customer']."'";
                        $row_fg_plan=mysqli_fetch_array(mysqli_query($con,$sql_fg_plan));
                        echo $row_fg_plan['packing_count'];
                        $total_fg_plan+=$row_fg_plan['packing_count'];
                        ?>
                  </td>
                  <td>
                        <?php
                        $sql_fg_c_plan="SELECT COUNT(packing.pump_sno) as packing_count from packing INNER JOIN master_scheduling ON master_scheduling.serial_no=packing.pump_sno WHERE packing.month='".$dm_month."' AND packing.year='".$year."'  AND packing.date<='".$date."' and master_scheduling.customer='".$row['customer']."'";
                        $row_fg_c_plan=mysqli_fetch_array(mysqli_query($con,$sql_fg_c_plan));
                        echo $row_fg_c_plan['packing_count'];
                        $total_fg_c_plan+=$row_fg_c_plan['packing_count'];


                        ?>
                      
                </td>
                <td>
                  <?php
                  $sql_dispatch_plan="SELECT COUNT(dispatching.pump_sno) as dispatch_count from dispatching INNER JOIN master_scheduling ON master_scheduling.serial_no=dispatching.pump_sno WHERE dispatching.date='".$date."' and master_scheduling.customer='".$row['customer']."' ";
                  $row_dispatch_plan=mysqli_fetch_array(mysqli_query($con,$sql_dispatch_plan));
                  echo $row_dispatch_plan['dispatch_count'];
                  $total_dispatch_plan+=$row_dispatch_plan['dispatch_count'];
                  ?>
                </td>
                <td>
                  <?php
                  $sql_dispatch_c_plan="SELECT COUNT(dispatching.pump_sno) as dispatch_count from dispatching INNER JOIN master_scheduling ON master_scheduling.serial_no=dispatching .pump_sno WHERE dispatching.month='".$dm_month."' and master_scheduling.customer='".$row['customer']."' AND dispatching.year='".$year."'  AND dispatching.date<='".$date."'";
                  $row_dispatch_c_plan=mysqli_fetch_array(mysqli_query($con,$sql_dispatch_c_plan));
                  
                  $total_dispatch_c_plan+=$row_dispatch_c_plan['dispatch_count'];
                  
                  echo $row_dispatch_c_plan['dispatch_count'];
                  ?>
                  
                </td>
                <td>
                  <?php
                  $days_to_d=0;
                  $days_to_dr=0;
                  if($dm_month=="JAN")
                  {
                    $start = strtotime($year.'-01-01');
                    $end = strtotime($date);
                    $days_to_d = ceil(abs($end - $start) / 86400);
                  }
                  else if($dm_month=="FEB")
                  {
                    $start = strtotime($year.'-01-29');
                    $end = strtotime($date);
                    $days_to_d = ceil(abs($end - $start) / 86400);
                  }
                  else if($dm_month=="MAR")
                  {
                    $start = strtotime($year.'-02-26');
                    $end = strtotime($date);
                    $days_to_d = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="APR")
                  {
                    $start = strtotime($year.'-04-02');
                    $end = strtotime($date);
                    $days_to_d = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="MAY")
                  {
                    $start = strtotime($year.'-04-30');
                    $end = strtotime($date);
                    $days_to_d = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="JUN")
                  {
                    $start = strtotime($year.'-05-28');
                    $end = strtotime($date);
                    $days_to_d = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="JUL")
                  {
                    $start = strtotime($year.'-07-01');
                    $end = strtotime($date);
                    $days_to_d = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="AUG")
                  {
                    $start = strtotime($year.'-07-29');
                    $end = strtotime($date);
                    $days_to_d = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="SEP")
                  {
                    $start = strtotime($year.'-08-27');
                    $end = strtotime($date);
                    $days_to_d = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="OCT")
                  {
                    $start = strtotime($year.'-10-01');
                    $end = strtotime($date);
                    $days_to_d = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="NOV")
                  {
                    $start = strtotime($year.'-10-29');
                    $end = strtotime($date);
                    $days_to_d = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="DEC")
                  {
                    $start = strtotime($year.'-11-26');
                    $end = strtotime($date);
                    $days_to_d = ceil(abs($end - $start) / 86400);
                    
                  }
                  if($days_to_d==0)
                  {
                    echo 0;
                  }
                  else
                  {
                      $ratio_cr=$row_sfg_c_plan['final_2_count']/$days_to_d;
                      // echo ceil($ratio_cr);
                      $total_cr_plan+=$ratio_cr;
                  }
                  
                  ?>
                </td>
                <td>
                  <?php
                  $rem_plan=$row_month_plan['plan']-$row_sfg_plan['final_2_count'];
                  if($dm_month=="JAN")
                  {
                    $start = strtotime($year.'-01-28');
                    $end = strtotime($date);
                    $days_to_dr = ceil(abs($end - $start) / 86400);
                  }
                  else if($dm_month=="FEB")
                  {
                    $start = strtotime($year.'-02-25');
                    $end = strtotime($date);
                    $days_to_dr = ceil(abs($end - $start) / 86400);
                  }
                  else if($dm_month=="MAR")
                  {
                    $start = strtotime($year.'-04-01');
                    $end = strtotime($date);
                    $days_to_dr = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="APR")
                  {
                    $start = strtotime($year.'-04-29');
                    $end = strtotime($date);
                    $days_to_dr = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="MAY")
                  {
                    $start = strtotime($year.'-05-27');
                    $end = strtotime($date);
                    $days_to_dr = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="JUN")
                  {
                    $start = strtotime($year.'-06-31');
                    $end = strtotime($date);
                    $days_to_dr = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="JUL")
                  {
                    $start = strtotime($year.'-07-28');
                    $end = strtotime($date);
                    $days_to_dr = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="AUG")
                  {
                    $start = strtotime($year.'-08-26');
                    $end = strtotime($date);
                    $days_to_dr = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="SEP")
                  {
                    $start = strtotime($year.'-09-30');
                    $end = strtotime($date);
                    $days_to_dr = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="OCT")
                  {
                    $start = strtotime($year.'-10-28');
                    $end = strtotime($date);
                    $days_to_dr = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="NOV")
                  {
                    $start = strtotime($year.'-11-25');
                    $end = strtotime($date);
                    $days_to_dr = ceil(abs($end - $start) / 86400);
                    
                  }
                  else if($dm_month=="DEC")
                  {
                    $start = strtotime($year.'-12-31');
                    $end = strtotime($date);
                    $days_to_dr = ceil(abs($end - $start) / 86400);
                    
                  }
                  // echo $rem_plan;
                  // echo $days_to_dr;
                  if($days_to_dr==0)
                  {
                    echo "0";
                  }
                  else
                  {
                    $ratio_ar=$rem_plan/$days_to_dr;
                  // echo ceil($ratio_ar);
                  $total_ar_plan+=$ratio_ar;
                  }
                  
                  ?>
                </td>
                <td>
                  <?php
                  $sql_t_sidetrack_plan="SELECT COUNT(siron.pump_sno) as count from siron INNER JOIN master_scheduling ON siron.pump_sno=master_scheduling.serial_no WHERE  siron.date<='".$date."'  AND master_scheduling.month='".$dm_month."'  AND master_scheduling.year='".$year."' and master_scheduling.customer='".$row['customer']."'";
                  $row_t_sidetrack_plan=mysqli_fetch_array(mysqli_query($con,$sql_t_sidetrack_plan));
                  // echo "Total:".$row_t_sidetrack_plan['count']."<br/>";
                  $sql_a_sidetrack_plan="SELECT COUNT(siron.pump_sno) as count from siron INNER JOIN master_scheduling ON siron.pump_sno=master_scheduling.serial_no WHERE siron.approved_date<='".$date."' AND master_scheduling.month='".$dm_month."'  AND master_scheduling.year='".$year."' and master_scheduling.customer='".$row['customer']."'";
                  $row_a_sidetrack_plan=mysqli_fetch_array(mysqli_query($con,$sql_a_sidetrack_plan));
                  // echo "Cleared:".$row_a_sidetrack_plan['count']."<br/>";
                  $sql_r_sidetrack_plan="SELECT COUNT(siron.pump_sno) as count from siron INNER JOIN master_scheduling ON siron.pump_sno=master_scheduling.serial_no WHERE siron.reject_date<='".$date."' AND master_scheduling.month='".$dm_month."'  AND master_scheduling.year='".$year."' and master_scheduling.customer='".$row['customer']."'";
                  $row_r_sidetrack_plan=mysqli_fetch_array(mysqli_query($con,$sql_r_sidetrack_plan));
                  // echo "Pending:".$row_r_sidetrack_plan['count']."<br/>";
                  $total_t_sidetrack_plan+=$row_t_sidetrack_plan['count'];
                  $total_a_sidetrack_plan+=$row_a_sidetrack_plan['count'];
                  $total_r_sidetrack_plan+=$row_r_sidetrack_plan['count'];
                  ?>
                  <?php echo "Total: ".$row_t_sidetrack_plan['count']; ?>
                  <?php echo " Cleared: ".$row_a_sidetrack_plan['count']; ?>
                  <?php echo " Pending: ".$row_r_sidetrack_plan['count']; ?>
                  <!-- <table>
                    <tr>
                      <td>Total</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Cleared</td>
                      <td> </td>
                    </tr>
                    <tr>
                      <td>Pending</td>
                      <td></td>
                    </tr>
                  </table> -->
                </td>
              <?php
            }
          }
          ?>
          <tr>
            <th>Total</th>
            <th>-</th>
            <td><?php echo $total_d_plan; ?></td>
            <td><?php echo $total_a_plan; ?></td>
            <td><?php echo $total_d_mtd_plan; ?></td>
            <td><?php echo $total_a_mtd_plan; ?></td>
            <td><?php echo $total_d_mtd_plan-$total_a_mtd_plan; ?></td>
            <td><?php echo $total_month_plan; ?></td>
            <td><?php echo $total_sfg_plan; ?></td> 
            <td><?php echo $total_sfg_c_plan; ?></td>  
            <td><?php echo $total_fg_plan; ?></td>
            <td><?php echo $total_fg_c_plan; ?></td>
            <td><?php echo $total_dispatch_plan; ?></td>
            <td><?php echo $total_dispatch_c_plan; ?></td>
                
            <td>
              <?php 
                echo abs(ceil($total_cr_plan));
                
              ?>
              
            </td>
            <td>
              <?php 
                echo abs(ceil($total_ar_plan));
                
              ?>
            </td>
            <td>
              <?php echo "Total: ". $total_t_sidetrack_plan; ?>
              <?php echo "Cleared: ".$total_a_sidetrack_plan; ?> 
              <?php echo "Pending: ".$total_r_sidetrack_plan; ?>
              <!-- <table>
                <tr>
                  <td>Total</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Cleared</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Pending</td>
                  <td></td>
                </tr>
              </table> -->
              
            </td>
          </tr>
          </table>
        </div>
      </div>
      

    </div>
  </div>
</div>
<div class="sticky-bottom"><?php include 'footer.php'; ?></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      $('#current-rate').append(" (<?php echo $days_to_d; ?>)");
      $('#asking-rate').append(" (<?php echo $days_to_dr; ?>)");
      $(document).on('click','#print-graph-btn',function()
    {
          
          
          $("#dashboard-table").table2excel({
            filename: "DM Dashboard.xls"
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