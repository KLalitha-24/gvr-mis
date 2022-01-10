<?php
include 'db.php';
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
	if(isset($_POST['key']) && $_POST['key']=='147')
	{
		?>
		<table class="table" id="hv_test_table">
          <!-- <tr>
            <th colspan="10" class="text-center">HV Test Records</th>
          </tr> -->
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
            <th>Operator Name</th>
            <th>Cycle Time</th>
          </tr>
          <tbody id="tbody">
          <?php
          include 'db.php';
          $startdate=$_POST['start_date'];
          $enddate=$_POST['end_date'];
          $sql="SELECT hv_test.pump_sno AS pump_sno,hv_test.date AS date,hv_test.time AS time,hv_test.shift AS shift,master_scheduling.fg AS fg_no,master_scheduling.seq_no AS sequence_no,master_scheduling.fg_part_no AS production_order_no,master_scheduling.customer AS customer,master_scheduling.type AS pump_type,hv_test.operator_name AS operator_name from hv_test INNER JOIN master_scheduling ON master_scheduling.serial_no=hv_test.pump_sno WHERE hv_test.date BETWEEN '$startdate' AND '$enddate' ORDER BY hv_test.id ASC";
          if($res=mysqli_query($con,$sql))
          { 
            $i=0;
            while($row=mysqli_fetch_array($res))
            {
              if($i>0)
              {
                  $datetime1 = new DateTime($row['date'].' '.$row['time']);
                  $datetime2 = new DateTime($pre_date.' '.$pre_time);
                  $interval = $datetime1->diff($datetime2);
                  $elapsed = $interval->format('%h hours %i minutes %s seconds');
              }
              else
              {
                $elapsed = '0 hours 0 minutes 0 seconds';
              }
              $pre_date=$row['date'];
              $pre_time=$row['time'];
              ?>
              <tr>
                <td><?php echo $row['pump_sno']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['shift']; ?></td>
                <td><?php echo $row['fg_no']; ?></td>
                <td><?php echo $row['sequence_no']; ?></td>
                <td><?php echo $row['production_order_no']; ?></td>
                <td><?php echo $row['customer']; ?></td>
                <td><?php echo $row['pump_type']; ?></td>
                <td><?php echo $row['operator_name']; ?></td>
                <td><?php echo $elapsed; ?></td>

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
        <?php
	}
	else
	{
		header("location:view-pigeon-hole-details.php");
	}
}
else
{
  header("location:index.php");
}
?>